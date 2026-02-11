<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(
        protected StudentService $studentService
    ) {}
    public function destroy(User $student): RedirectResponse
    {
        $this->studentService->delete($student);

        return redirect()
            ->back()
            ->with('success', 'Student berhasil dihapus');
    }
}
