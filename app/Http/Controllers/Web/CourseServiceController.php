<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseServiceRequest;
use App\Models\CourseService;
use App\Services\CourseServiceService;
use Illuminate\Http\Request;

class CourseServiceController extends Controller
{
    protected CourseServiceService $service;

    public function __construct(CourseServiceService $service)
    {
        $this->service = $service;
    }
    public function store(CourseServiceRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Service berhasil ditambahkan.');
    }

    public function update(
        CourseServiceRequest $request,
        CourseService $courseService
    ) {
        $this->service->update(
            $courseService,
            $request->validated()
        );

        return back()->with('success', 'Service berhasil diperbarui.');
    }

    public function destroy(CourseService $courseService)
    {
        $this->service->delete($courseService);

        return back()->with('success', 'Service berhasil dihapus.');
    }
}
