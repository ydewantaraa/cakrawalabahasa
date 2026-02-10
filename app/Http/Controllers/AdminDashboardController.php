<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProgramService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request, string $tab)
    {
        $data = compact('tab');

        if ($tab === 'program-services') {
            $data += $this->programServiceTab($request);
        }

        if ($tab === 'classes-management') {
            $data += $this->courseTab($request);
        }

        return view('admin.dashboard', $data);
    }

    protected function programServiceTab(Request $request): array
    {
        $search = $request->query('search');

        $programServices = ProgramService::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(3)
            ->withQueryString();

        return [
            'programServices' => $programServices,
            'programServiceCount' => ProgramService::count(),
            'search' => $search,
        ];
    }

    protected function courseTab(Request $request): array
    {
        $search = $request->query('search');

        $courses = Course::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('learning_type', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return [
            'courses' => $courses,
            'courseCount' => Course::count(),
            'search' => $search,
            'programServices' => ProgramService::orderBy('name')->get(),
        ];
    }
}
