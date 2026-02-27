<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Models\ProgramService;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    protected CourseService $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Get All courses 
     */

    public function index(): JsonResponse
    {
        $courses = Course::with([
            'course_facilities',
            'course_services' => function ($q) {
                $q->with([
                    'prices', // harga langsung untuk service
                    'sub_course_services' => function ($q2) {
                        $q2->with('prices'); // harga untuk sub-service
                    }
                ]);
            },
        ])->get();

        return response()->json([
            'success' => true,
            'data' => $courses,
        ]);
    }


    /**
     * Show course berdasarkan slug
     */
    public function show(string $slug): JsonResponse
    {
        $course = Course::where('slug', $slug)
            ->with([
                'course_facilities',
                'course_services' => function ($q) {
                    $q->with([
                        'prices', // harga untuk service langsung
                        'sub_course_services' => function ($q2) {
                            $q2->with('prices'); // harga untuk sub-service
                        }
                    ]);
                }
            ])
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $course,
        ]);
    }

    /**
     * Buat course baru (dengan file upload)
     */
    public function store(CourseRequest $request): JsonResponse
    {
        $data = $request->validated();

        // Ambil file thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $course = $this->service->create($data);
        $course->load('course_facilities');

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil dibuat',
            'data' => $course,
        ], 201);
    }

    public function update(CourseRequest $request, Course $course): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $data['thumbnail'] = $file;
        }

        $updatedCourse = $this->service->update($course, $data);
        $updatedCourse->load('course_facilities');

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil diupdate',
            'data' => $updatedCourse,
        ], 200);
    }

    public function destroy(Course $course): JsonResponse
    {
        // Hapus course lewat service
        $this->service->destroy($course);

        return response()->json([
            'success' => true,
            'message' => 'Course berhasil dihapus',
        ]);
    }
}
