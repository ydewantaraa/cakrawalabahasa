<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseServiceRequest;
use App\Models\Course;
use App\Models\CourseService;
use App\Services\CourseServiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseServiceController extends Controller
{
    protected CourseServiceService $service;

    public function __construct(CourseServiceService $service)
    {
        $this->service = $service;
    }

    /**
     * GET /api/admin/courses/{course}/course-services
     */
    public function index(Course $course): JsonResponse
    {
        $services = $this->service->getByCourse($course->id);

        return response()->json([
            'success' => true,
            'data' => $services
        ]);
    }

    /**
     * POST /api/admin/courses/{course}/course-services
     */
    public function store(CourseServiceRequest $request, Course $course): JsonResponse
    {
        $data = $request->validated();
        $data['course_id'] = $course->id;

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $service = $this->service->store($data);

        return response()->json([
            'success' => true,
            'message' => 'Service berhasil dibuat',
            'data' => $service
        ], 201);
    }

    /**
     * GET /api/admin/course-services/{service}
     */
    public function show(CourseService $courseService): JsonResponse
    {
        $courseService->load([
            'prices', // hanya price tanpa sub
            'sub_course_services.prices' // price milik sub service
        ]);

        return response()->json([
            'success' => true,
            'data' => $courseService
        ]);
    }

    /**
     * PUT /api/admin/course-services/{service}
     */
    public function update(CourseServiceRequest $request, CourseService $courseService): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $updated = $this->service->update($courseService, $data);

        return response()->json([
            'success' => true,
            'message' => 'Service berhasil diperbarui',
            'data' => $updated
        ]);
    }

    /**
     * DELETE /api/admin/course-services/{courseService}
     */
    public function destroy(CourseService $courseService): JsonResponse
    {
        $this->service->delete($courseService);

        return response()->json([
            'success' => true,
            'message' => 'Service berhasil dihapus'
        ]);
    }
}
