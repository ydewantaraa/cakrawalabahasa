<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PopularClassRequest;
use App\Models\Course;
use App\Models\PopularClass;
use App\Services\PopularClassService;
use Illuminate\Http\Request;

class PopularClassController extends Controller
{
    protected PopularClassService $service;
    public function __construct(PopularClassService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        $popularClasses = $this->service->getPaginated();
        $courses = Course::orderBy('name')->get(['id', 'name']);

        return view('admin.popular-classes.index', compact('popularClasses', 'courses'));
    }

    public function store(PopularClassRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Berhasil ditambahkan');
    }

    public function update(PopularClassRequest $request, PopularClass $popularClass)
    {
        $this->service->update($popularClass, $request->validated());

        return back()->with('success', 'Berhasil diperbarui');
    }

    public function destroy(PopularClass $popularClass)
    {
        $this->service->delete($popularClass);

        return back()->with('success', 'Berhasil dihapus');
    }
}
