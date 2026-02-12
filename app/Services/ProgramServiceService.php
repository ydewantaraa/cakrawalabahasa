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
            unset($data['features']);

            $programService = ProgramService::create($data);

            foreach ($features as $feature) {

                if (!empty($feature['thumbnail']) && $feature['thumbnail'] instanceof UploadedFile) {
                    $feature['thumbnail'] = $feature['thumbnail']->store('feature-programs', 'public');
                }

                $programService->feature_program_services()->create([
                    'title' => $feature['title'],
                    'description' => $feature['description'],
                    'thumbnail' => $feature['thumbnail'] ?? null,
                ]);
            }

            return $programService->load('feature_program_services');
        });
    }

    public function update(ProgramService $programService, array $data): ProgramService
    {
        return DB::transaction(function () use ($programService, $data) {

            if (array_key_exists('name', $data)) {
                $data['slug'] = Str::slug($data['name']);
            }

            $features = $data['features'] ?? [];
            unset($data['features']);

            $programService->update($data);

            $oldFeatures = $programService->feature_program_services;

            foreach ($oldFeatures as $oldFeature) {

                $rawThumbnail = $oldFeature->getRawOriginal('thumbnail');

                if ($rawThumbnail && Storage::disk('public')->exists($rawThumbnail)) {
                    Storage::disk('public')->delete($rawThumbnail);
                }
            }

            $programService->feature_program_services()->delete();

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

            return $programService->load('feature_program_services');
        });
    }
}
