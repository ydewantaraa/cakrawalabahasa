<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProgramService;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request, string $tab)
    {
        $data = compact('tab');

        if ($tab === 'overview') {
            $data += $this->overviewTab($request);
        }

        if ($tab === 'program-services') {
            $data += $this->programServiceTab($request);
        }

        if ($tab === 'classes-management') {
            $data += $this->courseTab($request);
        }

        if ($tab === 'teachers-management') {
            $data += $this->teacherTab($request);
        }

        if ($tab === 'students-management') {
            $data += $this->studentTab($request);
        }

        // if ($tab === 'enrollments-management') {
        //     $data += $this->teacherTab($request);
        // }

        if ($tab === 'transaction-history') {
            $data += $this->transactionTab($request);
        }

        return view('admin.dashboard', $data);
    }

    protected function overviewTab(Request $request): array
    {
        return [
            'totalStudents' => User::where('role', 'student')->count(),
            'totalTeachers' => User::where('role', 'teacher')->count(),
            'totalClasses' => Course::count(),
            'totalProgramServices' => ProgramService::count(),
            'activePrograms' => ProgramService::where('show_in_dropdown', true)->count(),
            // 'totalEnrollments' => Enrollment::count(),
            // 'totalTransactions' => Transaction::count(),
            // 'totalRevenue' => Transaction::where('status', 'paid')->sum('amount'),
        ];
    }

    protected function programServiceTab(Request $request): array
    {
        $search = $request->query('search');

        $programServices = ProgramService::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
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

        $courses = Course::with(['learning_types', 'program_service'])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhereHas('learning_types', function ($lt) use ($search) {
                            $lt->where('type', 'like', "%{$search}%");
                        });
                });
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


    protected function teacherTab(Request $request): array
    {
        $search = $request->query('search');

        // Query hanya untuk teacher
        $query = User::where('role', 'teacher')
            ->with('teacher_profile');

        // Filter search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhereHas('teacher_profile', function ($q2) use ($search) {
                        $q2->where('position', 'like', "%{$search}%");
                    });
            });
        }

        $teachers = $query->orderBy('full_name')->paginate(10)->withQueryString();

        return [
            'teachers' => $teachers,
            'teacherCount' => User::where('role', 'teacher')->count(),
            'search' => $search,
        ];
    }

    protected function studentTab(Request $request): array
    {
        $search = $request->query('search');

        // Query hanya untuk student
        $query = User::where('role', 'student')
            ->with('student_profile');

        // Filter search
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%");
            });
        }

        $students = $query->orderBy('full_name')->paginate(10)->withQueryString();

        return [
            'students' => $students,
            'studentCount' => User::where('role', 'student')->count(),
            'search' => $search,
        ];
    }
    protected function transactionTab(Request $request): array
    {
        $search = $request->query('search');

        $programServices = ProgramService::when($search, function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return [
            'programServices' => $programServices,
            'programServiceCount' => ProgramService::count(),
            'search' => $search,
        ];
    }
}
