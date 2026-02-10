<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    /**
     * Get all courses
     */
    public function index(): JsonResponse
    {
        $courses = $this->service->all();
        return response()->json($courses);
    }

    /**
     * Get single course
     */
    public function show(Course $course): JsonResponse
    {
        $course = $this->service->find($course->id);
        return response()->json($course);
    }

    public function store(CourseRequest $request): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $course = $this->service->create($data);
        return response()->json($course, 201);
    }

    public function update(CourseRequest $request, Course $course): JsonResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $course = $this->service->update($course, $data);
        return response()->json($course);
    }


    /**
     * Delete a course
     */
    public function destroy(Course $course): JsonResponse
    {
        $this->service->delete($course);
        return response()->json(['message' => 'Course deleted']);
    }
}
