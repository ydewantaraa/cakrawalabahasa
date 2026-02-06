<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

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
    }
}
