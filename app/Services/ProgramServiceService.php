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
                if (!empty($advantage['thumbnail']) && $advantage['thumbnail'] instanceof UploadedFile) {
                    $thumbnailPath = $advantage['thumbnail']->store('advantage-programs', 'public');
                }
                $programService->advantage_program_services()->create([
                    'title' => $advantage['title'],
                    'description' => $advantage['description'],
                    'thumbnail' => $thumbnailPath,
                ]);
            }

            return $programService->load('feature_program_services', 'advantage_program_services');
        });
    }


    public function update(ProgramService $programService, array $data): ProgramService
    {
        return DB::transaction(function () use ($programService, $data) {

            // Update slug jika nama diubah
            if (array_key_exists('name', $data)) {
                $data['slug'] = Str::slug($data['name']);
            }

            // Ambil features & advantages dari data
            $features = $data['features'] ?? [];
            $advantages = $data['advantages'] ?? [];
            unset($data['features'], $data['advantages']);

            // Update data utama ProgramService
            $programService->update($data);

            // Hapus file thumbnail lama untuk features
            foreach ($programService->feature_program_services as $oldFeature) {
                $rawThumbnail = $oldFeature->getRawOriginal('thumbnail');
                if ($rawThumbnail && Storage::disk('public')->exists($rawThumbnail)) {
                    Storage::disk('public')->delete($rawThumbnail);
                }
            }

            // Hapus file thumbnail lama untuk advantages
            foreach ($programService->advantage_program_services as $oldAdvantage) {
                $rawThumbnail = $oldAdvantage->getRawOriginal('thumbnail');
                if ($rawThumbnail && Storage::disk('public')->exists($rawThumbnail)) {
                    Storage::disk('public')->delete($rawThumbnail);
                }
            }

            // Hapus features & advantages lama
            $programService->feature_program_services()->delete();
            $programService->advantage_program_services()->delete();

            // Create features baru
            foreach ($features as $feature) {
                $thumbnailPath = null;
                if (!empty($feature['thumbnail']) && $feature['thumbnail'] instanceof UploadedFile) {
                    $thumbnailPath = $feature['thumbnail']->store('feature-programs', 'public');
                }

                $programService->feature_program_services()->create([
                    'title'       => $feature['title'],
                    'description' => $feature['description'],
                    'thumbnail'   => $thumbnailPath,
                ]);
            }

            // Create advantages baru
            foreach ($advantages as $advantage) {
                $thumbnailPath = null;
                if (!empty($advantage['thumbnail']) && $advantage['thumbnail'] instanceof UploadedFile) {
                    $thumbnailPath = $advantage['thumbnail']->store('advantage-programs', 'public');
                }

                $programService->advantage_program_services()->create([
                    'title'       => $advantage['title'],
                    'description' => $advantage['description'],
                    'thumbnail'   => $thumbnailPath,
                ]);
            }

            // Load relasi feature & advantage
            return $programService->load('feature_program_services', 'advantage_program_services');
        });
    }

    public function destroy(ProgramService $programService): void
    {
        DB::transaction(function () use ($programService) {

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

            // Hapus semua features & advantages
            $programService->feature_program_services()->delete();
            $programService->advantage_program_services()->delete();

            // Hapus program service utama
            $programService->delete();
        });
    }
}
