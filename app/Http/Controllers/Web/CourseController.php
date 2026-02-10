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

    public function store(CourseRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $this->service->create($data);
        return redirect()
            ->back()
            ->with('success', 'Kelas/ Kursus berhasil ditambahkan');
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail');
        }

        $this->service->update($course, $data);
        return redirect()
            ->back()
            ->with('success', 'Kelas/ Kursus berhasil diupdate');
    }

    public function destroy(Course $course)
    {
        $this->service->delete($course);
        return redirect()
            ->back()
            ->with('success', 'Kelas/ Kursus berhasil dihapus');
    }

    public function show(Course $course)
    {
        $course = $this->service->find($course->id);
        return view('courses.show', compact('course'));
    }
}
