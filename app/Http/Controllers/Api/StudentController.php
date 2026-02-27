<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(
        protected StudentService $studentService
    ) {}

    public function getAllstudents()
    {
        $students = $this->studentService->getAllStudents();
        return response()->json([
            'data'    => $students,
        ], 201);
    }

    public function destroy(User $student)
    {
        $this->studentService->delete($student);

        return response()->json([
            'message' => 'Student berhasil dihapus',
        ]);
    }

    public function show(User $student)
    {
        $student->load('student_profile');
        return response()->json([
            'message' => 'Berhasil mengambil detail student',
            'data'    => $student,
        ], 200);
    }
}
