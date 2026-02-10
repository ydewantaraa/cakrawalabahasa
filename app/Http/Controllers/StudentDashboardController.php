<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index(Request $request, string $tab)
    {
        return view('student.dashboard', compact('tab'));
    }
}
