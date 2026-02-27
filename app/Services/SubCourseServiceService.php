<?php

namespace App\Services;

use App\Models\SubCourseService;
use Illuminate\Support\Facades\Storage;

class SubCourseServiceService
{
    /*
    |--------------------------------------------------------------------------
    | GET BY COURSE SERVICE
    |--------------------------------------------------------------------------
    */
    public function getByCourseService(int $courseServiceId)
    {
        return SubCourseService::with('prices')
            ->where('course_service_id', $courseServiceId)
            ->get();
    }
    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(array $data): SubCourseService
    {
        return SubCourseService::create($data);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(SubCourseService $subCourseService, array $data): SubCourseService
    {
        $subCourseService->update($data);

        return $subCourseService;
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete(SubCourseService $subCourseService): void
    {

        $subCourseService->delete();
    }
}
