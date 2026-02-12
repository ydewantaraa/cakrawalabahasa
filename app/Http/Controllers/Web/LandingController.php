<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::with('program_service')
            ->select('id', 'name', 'thumbnail', 'program_service_id')
            ->latest()
            ->get();

        return view('landing.course-index', compact('courses'));
    }
}
