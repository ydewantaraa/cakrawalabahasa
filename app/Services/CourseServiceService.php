<?php

namespace App\Services;

use App\Models\CourseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CourseServiceService
{
    /**
     * Get all services by course.
     */
    public function getByCourse(int $courseId)
    {
        return CourseService::where('course_id', $courseId)
            ->latest()
            ->get();
    }

    /**
     * Store new service.
     */
    public function store(array $data): CourseService
    {
        if (isset($data['thumbnail'])) {
            $data['thumbnail'] = $data['thumbnail']->store('course-services', 'public');
        }
        return CourseService::create($data);
    }

    /**
     * Update service.
     */
    public function update(CourseService $service, array $data): CourseService
    {
        if (isset($data['thumbnail'])) {

            // Hapus thumbnail lama kalau ada
            if (
                $service->getRawOriginal('thumbnail') &&
                Storage::disk('public')->exists($service->getRawOriginal('thumbnail'))
            ) {

                Storage::disk('public')->delete($service->getRawOriginal('thumbnail'));
            }

            // Upload thumbnail baru
            $data['thumbnail'] = $data['thumbnail']->store('course-services', 'public');
        }
        $service->update($data);

        return $service;
    }

    /**
     * Delete service.
     */
    public function delete(CourseService $service): void
    {
        DB::transaction(function () use ($service) {
            // Hapus thumbnail kalau ada
            if (
                $service->getRawOriginal('thumbnail') &&
                Storage::disk('public')->exists($service->getRawOriginal('thumbnail'))
            ) {

                Storage::disk('public')->delete($service->getRawOriginal('thumbnail'));
            }

            // Kalau mau aman, hapus child dulu
            $service->sub_course_services()->delete();
            $service->prices()->delete();

            $service->delete();
        });
    }
}
