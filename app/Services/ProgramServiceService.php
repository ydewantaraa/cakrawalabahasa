<?php

namespace App\Services;

use App\Models\ProgramService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramServiceService
{
    /**
     * Create a new class instance.
     */


    public function all()
    {
        return ProgramService::orderBy('created_at', 'desc')
            ->with('feature_program_services')
            ->get();
    }

    public function store(array $data): ProgramService
    {
        return DB::transaction(function () use ($data) {

            $data['slug'] = Str::slug($data['name']);

            // Upload hero image jika ada
            if (isset($data['hero_image']) && $data['hero_image'] instanceof UploadedFile) {
                $data['hero_image'] = $data['hero_image']->store('hero-service', 'public');
            }

            // Upload image service jika ada
            if (isset($data['image_service']) && $data['image_service'] instanceof UploadedFile) {
                $data['image_service'] = $data['image_service']->store('image-service', 'public');
            }

            $features = $data['features'] ?? [];
            $advantages = $data['advantages'] ?? [];
            unset($data['features'], $data['advantages']);

            $programService = ProgramService::create($data);

            // Fitur
            foreach ($features as $feature) {
                $thumbnailPath = null;
                if (!empty($feature['thumbnail']) && $feature['thumbnail'] instanceof UploadedFile) {
                    $thumbnailPath = $feature['thumbnail']->store('feature-programs', 'public');
                }
                $programService->feature_program_services()->create([
                    'title' => $feature['title'],
                    'description' => $feature['description'],
                    'thumbnail' => $thumbnailPath,
                ]);
            }

            // Advantage
            foreach ($advantages as $advantage) {
                $thumbnailPath = null;
                $iconPath = null;
                if (!empty($advantage['thumbnail']) && $advantage['thumbnail'] instanceof UploadedFile) {
                    $thumbnailPath = $advantage['thumbnail']->store('advantage-programs', 'public');
                }
                if (!empty($advantage['icon']) && $advantage['icon'] instanceof UploadedFile) {
                    $iconPath = $advantage['icon']->store('advantage-programs', 'public');
                }
                $programService->advantage_program_services()->create([
                    'title' => $advantage['title'],
                    'description' => $advantage['description'],
                    'thumbnail' => $thumbnailPath,
                    'icon' => $iconPath,
                ]);
            }

            return $programService
                ->refresh()
                ->load('feature_program_services', 'advantage_program_services');
        });
    }


    public function update(ProgramService $programService, array $data): ProgramService
    {
        return DB::transaction(function () use ($programService, $data) {

            // Update slug jika nama diubah
            if (array_key_exists('name', $data)) {
                $data['slug'] = Str::slug($data['name']);
            }

            // Handle hero image: hapus lama jika ada upload baru
            if (!empty($data['hero_image']) && $data['hero_image'] instanceof UploadedFile) {
                $oldHero = $programService->getRawOriginal('hero_image');
                if ($oldHero && Storage::disk('public')->exists($oldHero)) {
                    Storage::disk('public')->delete($oldHero);
                }
                $data['hero_image'] = $data['hero_image']->store('hero-service', 'public');
            }

            // Handle service image: hapus lama jika ada upload baru
            if (!empty($data['image_service']) && $data['image_service'] instanceof UploadedFile) {
                $oldImageService = $programService->getRawOriginal('image_service');
                if ($oldImageService && Storage::disk('public')->exists($oldImageService)) {
                    Storage::disk('public')->delete($oldImageService);
                }
                $data['image_service'] = $data['image_service']->store('hero-service', 'public');
            }

            // Ambil features & advantages dari data
            $features = $data['features'] ?? [];
            $advantages = $data['advantages'] ?? [];
            unset($data['features'], $data['advantages']);

            // Update data utama ProgramService
            $programService->update($data);

            $oldFeatureThumbnails = $programService->feature_program_services
                ->map(fn($f) => $f->getRawOriginal('thumbnail'))
                ->toArray();

            $oldAdvantageThumbnails = $programService->advantage_program_services
                ->map(fn($a) => $a->getRawOriginal('thumbnail'))
                ->toArray();

            $oldAdvantageIcons = $programService->advantage_program_services
                ->map(fn($a) => $a->getRawOriginal('icon'))
                ->toArray();

            // Hapus record lama
            $programService->feature_program_services()->delete();
            $programService->advantage_program_services()->delete();

            // Tentukan thumbnail yang akan dipakai (features)
            $usedFeatureThumbnails = [];
            foreach ($features as $i => $feature) {
                $thumbnailPath = $oldFeatureThumbnails[$i] ?? null;

                if (!empty($feature['thumbnail']) && $feature['thumbnail'] instanceof UploadedFile) {
                    if ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) {
                        Storage::disk('public')->delete($thumbnailPath);
                    }
                    $thumbnailPath = $feature['thumbnail']->store('feature-programs', 'public');
                }

                $programService->feature_program_services()->create([
                    'title'       => $feature['title'],
                    'description' => $feature['description'],
                    'thumbnail'   => $thumbnailPath,
                ]);

                if ($thumbnailPath) $usedFeatureThumbnails[] = $thumbnailPath;
            }

            // Hapus file feature yang sudah tidak dipakai lagi
            foreach ($oldFeatureThumbnails as $old) {
                if ($old && !in_array($old, $usedFeatureThumbnails) && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            }

            // Tentukan thumbnail yang akan dipakai (advantages)
            $usedAdvantageThumbnails = [];
            $usedAdvantageIcons = [];
            foreach ($advantages as $i => $advantage) {
                $thumbnailPath = $oldAdvantageThumbnails[$i] ?? null;
                $iconPath = $oldAdvantageIcons[$i] ?? null;

                if (!empty($advantage['thumbnail']) && $advantage['thumbnail'] instanceof UploadedFile) {
                    if ($thumbnailPath && Storage::disk('public')->exists($thumbnailPath)) {
                        Storage::disk('public')->delete($thumbnailPath);
                    }
                    $thumbnailPath = $advantage['thumbnail']->store('advantage-programs', 'public');
                }

                if (!empty($advantage['icon']) && $advantage['icon'] instanceof UploadedFile) {
                    if ($iconPath && Storage::disk('public')->exists($iconPath)) {
                        Storage::disk('public')->delete($iconPath);
                    }
                    $iconPath = $advantage['icon']->store('advantage-programs', 'public');
                }

                $programService->advantage_program_services()->create([
                    'title'       => $advantage['title'],
                    'description' => $advantage['description'],
                    'thumbnail'   => $thumbnailPath,
                    'icon'   => $iconPath,
                ]);

                if ($thumbnailPath) $usedAdvantageThumbnails[] = $thumbnailPath;
                if ($iconPath) $usedAdvantageIcons[] = $iconPath;
            }

            // Hapus file advantage yang sudah tidak dipakai lagi
            foreach ($oldAdvantageThumbnails as $old) {
                if ($old && !in_array($old, $usedAdvantageThumbnails) && Storage::disk('public')->exists($old)) {
                    Storage::disk('public')->delete($old);
                }
            }

            // Load relasi feature & advantage
            return $programService
                ->refresh()
                ->load('feature_program_services', 'advantage_program_services');
        });
    }

    public function destroy(ProgramService $programService): void
    {
        DB::transaction(function () use ($programService) {

            // Hapus hero image
            $hero = $programService->getRawOriginal('hero_image');
            if ($hero && Storage::disk('public')->exists($hero)) {
                Storage::disk('public')->delete($hero);
            }

            // Hapus service image
            $imageService = $programService->getRawOriginal('image_service');
            if ($imageService && Storage::disk('public')->exists($imageService)) {
                Storage::disk('public')->delete($imageService);
            }

            // Hapus file thumbnail lama untuk features
            foreach ($programService->feature_program_services as $feature) {
                $rawThumbnail = $feature->getRawOriginal('thumbnail');
                if ($rawThumbnail && Storage::disk('public')->exists($rawThumbnail)) {
                    Storage::disk('public')->delete($rawThumbnail);
                }
            }

            // Hapus file thumbnail lama untuk advantages
            foreach ($programService->advantage_program_services as $advantage) {
                $rawThumbnail = $advantage->getRawOriginal('thumbnail');
                if ($rawThumbnail && Storage::disk('public')->exists($rawThumbnail)) {
                    Storage::disk('public')->delete($rawThumbnail);
                }
            }

            // Hapus file icon lama untuk advantages
            foreach ($programService->advantage_program_services as $advantage) {
                $rawIcon = $advantage->getRawOriginal('icon');
                if ($rawIcon && Storage::disk('public')->exists($rawIcon)) {
                    Storage::disk('public')->delete($rawIcon);
                }
            }

            // Hapus semua features & advantages
            $programService->feature_program_services()->delete();
            $programService->advantage_program_services()->delete();

            // Hapus program service utama
            $programService->delete();
        });
    }
}
