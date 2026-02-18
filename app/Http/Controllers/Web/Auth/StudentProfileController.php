<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentProfileRequest;
use App\Services\StudentProfileService;
use Illuminate\Support\Facades\Gate;

class StudentProfileController extends Controller
{
    protected StudentProfileService $service;

    public function __construct(StudentProfileService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        $user = auth()->user();
        $studentProfile = $user->student_profile;

        return view('profile.show', compact('user', 'studentProfile'));
    }

    public function update(StudentProfileRequest $request)
    {
        Gate::authorize('student');

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
                ->route('student-profile.show')
                ->with('status', 'Profile berhasil diperbarui');
        } catch (\Throwable $e) {
            return back()->withErrors([
                'error' => 'Update profile gagal: ' . $e->getMessage()
            ]);
        }
    }
}
