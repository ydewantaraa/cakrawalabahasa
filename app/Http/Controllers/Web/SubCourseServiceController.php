<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SubCourseService;
use App\Http\Requests\SubCourseServiceRequest;
use App\Services\SubCourseServiceService;

class SubCourseServiceController extends Controller
{
    protected SubCourseServiceService $service;

    public function __construct(SubCourseServiceService $service)
    {
        $this->service = $service;
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(SubCourseServiceRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Sub layanan berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(
        SubCourseServiceRequest $request,
        SubCourseService $subCourseService
    ) {
        $this->service->update(
            $subCourseService,
            $request->validated()
        );

        return back()->with('success', 'Sub layanan berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(SubCourseService $subCourseService)
    {
        $this->service->delete($subCourseService);

        return back()->with('success', 'Sub layanan berhasil dihapus.');
    }
}
