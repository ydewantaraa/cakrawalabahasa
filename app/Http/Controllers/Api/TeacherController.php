<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTeacherRequest;
use App\Models\User;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct(
        protected TeacherService $teacherService
    ) {}

    public function store(RegisterTeacherRequest $request)
    {
        $teacher = $this->teacherService->create($request->validated());

        return response()->json([
            'message' => 'Teacher berhasil dibuat',
            'data'    => $teacher,
        ], 201);
    }

    public function update(Request $request, User $teacher)
    {
        $request->validate([
            'position' => 'required|string',
        ]);

        $this->teacherService->updateTeacher($teacher, $request->position);

        return response()->json([
            'message' => 'Data teacher berhasil diperbaharui',
            'data'    => $teacher,
        ], 201);
    }

    public function destroy(User $teacher)
    {
        $this->teacherService->delete($teacher);

        return response()->json([
            'message' => 'Teacher berhasil dihapus',
        ]);
    }

    public function getAllTeachers()
    {
        $teachers = $this->teacherService->getAllTeachers();
        return response()->json([
            'data'    => $teachers,
        ], 201);
    }

    public function show(User $teacher)
    {
        $teacher->load('teacher_profile');
        return response()->json([
            'message' => 'Berhasil mengambil detail teacher',
            'data'    => $teacher,
        ], 200);
    }
}
