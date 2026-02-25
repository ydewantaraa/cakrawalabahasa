<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $service;

    public function __construct(CourseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $courses = $this->service->all();
        return view('courses.index', compact('courses'));
    }

    public function store(CourseRequest $request)
    {
        $this->service->create($request->validated());

        return back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function update(CourseRequest $request, Course $course)
    {
        $this->service->update($course, $request->validated());

        return back()->with('success', 'Kelas berhasil diupdate');
    }

    public function destroy(Course $course)
    {
        $this->service->delete($course);
        return redirect()
            ->back()
            ->with('success', 'Kelas/ Kursus berhasil dihapus');
    }

    public function show($slug)
    {
        $course = Course::with([
            'course_facilities',
            'course_services.sub_course_services.prices',
            'course_services.prices',
        ])->where('slug', $slug)->firstOrFail();

        return view('landing.courses.show', compact('course'));
    }
}
