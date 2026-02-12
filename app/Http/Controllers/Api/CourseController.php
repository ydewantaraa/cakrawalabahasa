<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    /**
     * Store new course
     */
    public function store(CourseRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail');
            }

            $course = $this->service->create($data);

            return response()->json([
                'message' => 'Course created successfully',
                'data' => $course
            ], 201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Update course
     */
    public function update(CourseRequest $request, Course $course): JsonResponse
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail');
            }

            $course = $this->service->update($course, $data);

            return response()->json([
                'message' => 'Course updated successfully',
                'data' => $course
            ]);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
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
