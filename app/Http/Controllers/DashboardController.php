<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
<<<<<<< HEAD
        $tab  = $request->get('tab', 'overview');

        return match ($user->role) {
            'admin'   => app(AdminDashboardController::class)->index($request, $tab),
            'teacher' => app(TeacherDashboardController::class)->index($request, $tab),
            'student' => app(StudentDashboardController::class)->index($request, $tab),
            default   => abort(403, 'Unauthorized'),
        };
=======

        switch ($user->role) {
            case 'student':
                return view('student.dashboard');
            case 'teacher':
                return view('teacher.dashboard');
            case 'admin':
                return view('admin.dashboard');
            default:
                abort(403, 'Unauthorized');
        }
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    }
}
