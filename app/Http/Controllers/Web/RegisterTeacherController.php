<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTeacherRequest;
use App\Models\User;
use App\Services\RegisterTeacherService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisterTeacherController extends Controller
{
    public function __construct(
        protected RegisterTeacherService $teacherService
    ) {}

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(RegisterTeacherRequest $request)
    {
        $this->teacherService->create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Teacher berhasil ditambahkan');
    }

    public function update(Request $request, User $teacher)
    {
        $request->validate([
            'position' => 'required|string',
        ]);

        $this->teacherService->updateTeacher($teacher, $request->position);

        return redirect()
            ->back()
            ->with('success', 'Data teacher berhasil diupdate');
    }

    public function destroy(User $teacher): RedirectResponse
    {
        $this->teacherService->delete($teacher);

        return redirect()
            ->back()
            ->with('success', 'Teacher berhasil dihapus');
    }
}
