<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomingCourseRequest;
use App\Models\IncomingCourse;
use App\Services\IncomingCourseService;
use Illuminate\Http\Request;

class IncomingCourseController extends Controller
{
    protected IncomingCourseService $service;

    public function __construct(IncomingCourseService $service)
    {
        $this->service = $service;
    }

    /**
     * GET /api/incoming-courses
     */
    public function index()
    {
        $data = $this->service->getAll();

        return response()->json([
            'message' => 'List incoming course',
            'data' => $data
        ]);
    }

    /**
     * GET /api/incoming-courses/{incomingCourse}
     */
    public function show(IncomingCourse $incomingCourse)
    {
        $data = $this->service->getById($incomingCourse);

        return response()->json([
            'message' => 'Detail incoming course',
            'data' => $data
        ]);
    }

    /**
     * POST /api/incoming-courses
     */
    public function store(
        IncomingCourseRequest $request
    ) {
        $incoming = $this->service->store($request->validated());

        return response()->json([
            'message' => 'Incoming course berhasil dibuat',
            'data' => $incoming->load('course')
        ], 201);
    }

    /**
     * PUT /api/incoming-courses/{incomingCourse}
     */
    public function update(
        IncomingCourseRequest $request,
        IncomingCourse $incomingCourse
    ) {
        $incoming = $this->service->update(
            $incomingCourse,
            $request->validated()
        );

        return response()->json([
            'message' => 'Incoming course berhasil diupdate',
            'data' => $incoming->load('course')
        ]);
    }

    /**
     * DELETE /api/incoming-courses/{incomingCourse}
     */
    public function destroy(IncomingCourse $incomingCourse)
    {
        $this->service->delete($incomingCourse);

        return response()->json([
            'message' => 'Incoming course berhasil dihapus'
        ]);
    }
}
