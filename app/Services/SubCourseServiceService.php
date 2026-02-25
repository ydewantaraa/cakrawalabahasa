<?php

namespace App\Services;

use App\Models\SubCourseService;
use Illuminate\Support\Facades\Storage;

class SubCourseServiceService
{
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
