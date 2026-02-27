<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CourseService;
use App\Models\SubCourseService;
use Illuminate\Http\JsonResponse;
use App\Services\SubCourseServiceService;
use App\Http\Requests\SubCourseServiceRequest;

class SubCourseServiceController extends Controller
{
    protected SubCourseServiceService $service;

    public function __construct(SubCourseServiceService $service)
    {
        $this->service = $service;
    }

    public function index(CourseService $courseService): JsonResponse
    {
        $subServices = $courseService->sub_course_services()->with('prices')->get();

        return response()->json([
            'success' => true,
            'data' => $subServices,
        ]);
    }

    public function store(SubCourseServiceRequest $request, CourseService $courseService): JsonResponse
    {
        $data = $request->validated();
        $data['course_service_id'] = $courseService->id;

        $subService = $this->service->store($data);

        return response()->json([
            'success' => true,
            'data' => $subService,
        ], 201);
    }

    public function show(SubCourseService $subCourseService): JsonResponse
    {
        $subCourseService->load('prices');

        return response()->json([
            'success' => true,
            'data' => $subCourseService,
        ]);
    }

    public function update(SubCourseServiceRequest $request, SubCourseService $subCourseService): JsonResponse
    {
        $data = $request->validated();
        $subService = $this->service->update($subCourseService, $data);

        return response()->json([
            'success' => true,
            'data' => $subService,
        ]);
    }

    public function destroy(SubCourseService $subCourseService): JsonResponse
    {
        $this->service->delete($subCourseService);

        return response()->json([
            'success' => true,
            'message' => 'Sub-service berhasil dihapus',
        ]);
    }
}
