<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherProfileRequest;
use App\services\TeacherProfileService;
use Illuminate\Support\Facades\Gate;

class TeacherProfileController extends Controller
{
    protected TeacherProfileService $service;

    public function __construct(TeacherProfileService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        $user = auth()->user();
        $teacherProfile = $user->teacher_profile;

        return view('profile.show', compact('user', 'teacherProfile'));
    }

    public function update(TeacherProfileRequest $request)
    {
        Gate::authorize('teacher');

        try {
            $result = $this->service->update(
                auth()->user(),
                $request->validated()
            );

            if ($result['email_changed']) {

                auth()->user()->sendEmailVerificationNotification();

                return redirect()
                    ->route('verification.notice')
                    ->with(
                        'status',
                        'Email diperbarui. Silakan lakukan verifikasi melalui email.'
                    );
            }

            return redirect()
                ->route('teacher-profile.show')
                ->with('status', 'Profile berhasil diperbarui');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'error' => 'Update profile gagal: ' . $e->getMessage()
            ]);
        }
    }
}
