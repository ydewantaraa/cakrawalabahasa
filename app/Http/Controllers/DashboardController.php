<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProgramService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tab  = $request->get('tab', 'overview');

        return match ($user->role) {
            'admin'   => app(AdminDashboardController::class)->index($request, $tab),
            'teacher' => app(TeacherDashboardController::class)->index($request, $tab),
            'student' => app(StudentDashboardController::class)->index($request, $tab),
            default   => abort(403, 'Unauthorized'),
        };
    }
    // public function index(Request $request)
    // {
    //     $user = $request->user();
    //     $tab  = $request->get('tab', 'overview');

    //     switch ($user->role) {

    //         case 'admin':
    //             return $this->adminDashboard($request, $tab);

    //         case 'teacher':
    //             return $this->teacherDashboard($tab);

    //         case 'student':
    //             return $this->studentDashboard($tab);

    //         default:
    //             abort(403, 'Unauthorized');
    //     }
    // }

    // protected function adminDashboard(Request $request, string $tab)
    // {
    //     $data = compact('tab');

    //     if ($tab === 'program-services') {
    //         $search = $request->query('search'); // ambil query search

    //         $query = ProgramService::query();

    //         if ($search) {
    //             $query->where('name', 'like', "%{$search}%")
    //                 ->orWhere('description', 'like', "%{$search}%");
    //         }

    //         // paginate dan sertakan semua query string
    //         $programServices = $query->latest()
    //             ->paginate(3)
    //             ->appends([
    //                 'tab' => $tab,
    //                 'search' => $search,
    //             ]);

    //         $data['programServices'] = $programServices;
    //         $data['programServiceCount'] = ProgramService::count();
    //         $data['search'] = $search;
    //     } elseif ($tab === 'classes-management') {
    //         $search = $request->query('search');

    //         $query = Course::query();

    //         if ($search) {
    //             $query->where(function ($q) use ($search) {
    //                 $q->where('name', 'like', "%{$search}%")
    //                     ->orWhere('category', 'like', "%{$search}%")
    //                     ->orWhere('learning_type', 'like', "%{$search}%");
    //             });
    //         }

    //         $courses = $query->latest()
    //             ->paginate(3)
    //             ->appends([
    //                 'tab' => $tab,
    //                 'search' => $search,
    //             ]);

    //         $data['courses'] = $courses;
    //         $data['courseCount'] = Course::count();
    //         $data['search'] = $search;
    //         $data['programServices'] = ProgramService::orderBy('name')->get();
    //     }

    //     return view('admin.dashboard', $data);
    // }


    // protected function teacherDashboard(string $tab)
    // {
    //     return view('teacher.dashboard', compact('tab'));
    // }

    // protected function studentDashboard(string $tab)
    // {
    //     return view('student.dashboard', compact('tab'));
    // }
}
