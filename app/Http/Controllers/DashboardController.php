<?php

namespace App\Http\Controllers;

use App\Models\ProgramService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $tab  = $request->get('tab', 'overview');

        switch ($user->role) {

            case 'admin':
                return $this->adminDashboard($tab);

            case 'teacher':
                return $this->teacherDashboard($tab);

            case 'student':
                return $this->studentDashboard($tab);

            default:
                abort(403, 'Unauthorized');
        }
    }

    protected function adminDashboard(string $tab)
    {
        $data = compact('tab');

        if ($tab === 'program-services') {
            $data['programServices'] = ProgramService::latest()->get();
            $data['programServiceCount'] = ProgramService::count();
        }

        return view('admin.dashboard', $data);
    }

    protected function teacherDashboard(string $tab)
    {
        return view('teacher.dashboard', compact('tab'));
    }

    protected function studentDashboard(string $tab)
    {
        return view('student.dashboard', compact('tab'));
    }
}
