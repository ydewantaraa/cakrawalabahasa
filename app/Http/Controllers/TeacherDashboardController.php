<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index(Request $request, string $tab)
    {
        return view('teacher.dashboard', compact('tab'));
    }
}
