<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tab  = $request->get('tab', 'overview');

        return match ($user->role) {
            'admin'   => app(AdminDashboardController::class)->index($request, $tab),
            'teacher' => app(TeacherDashboardController::class)->index($request, $tab),
            'student' => app(StudentDashboardController::class)->index($request, $tab),
            default   => abort(403, 'Unauthorized'),
        };
    }
}
