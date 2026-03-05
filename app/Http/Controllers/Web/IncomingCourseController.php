<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncomingCourseRequest;
use App\Models\IncomingCourse;
use App\Services\IncomingCourseService;
use Illuminate\Http\Request;

class IncomingCourseController extends Controller
{
    protected IncomingCourseService $service;

    public function __construct(IncomingCourseService $service)
    {
        $this->service = $service;
    }

    public function store(IncomingCourseRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Incoming course berhasil dibuat');
    }

    public function show(IncomingCourse $incomingCourse)
    {
        $data = $this->service->getById($incomingCourse);

        return view('admin.incoming-courses.show', [
            'incomingCourse' => $data
        ]);
    }

    public function update(
        IncomingCourseRequest $request,
        IncomingCourse $incomingCourse
    ) {
        $this->service->update(
            $incomingCourse,
            $request->validated()
        );

        return back()->with('success', 'Incoming course berhasil diupdate');
    }

    public function destroy(IncomingCourse $incomingCourse)
    {
        $this->service->delete($incomingCourse);

        return back()->with('success', 'Incoming course berhasil dihapus');
    }
}
