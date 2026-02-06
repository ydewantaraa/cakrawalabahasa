<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentProfileRequest;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $studentProfile = $user->student_profiles;

        return view('profile.show', compact('user', 'studentProfile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(StudentProfileRequest $request)
    {
        StudentProfile::create($request->validated());

        return redirect()->route('profile.index')->with('success', 'Profile berhasil dibuat');
    }

    public function edit(StudentProfile $profile)
    {
        return view('web.profile.edit', compact('profile'));
    }

    public function update(StudentProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $emailChanged = false;

            // --- UPDATE USER ---
            $userData = [
                'full_name' => $data['full_name'],
            ];

            if (
                isset($data['email']) &&
                $data['email'] !== $user->email
            ) {
                $emailChanged = true;

                $userData['email'] = $data['email'];
                $userData['email_verified_at'] = null;
                $userData['google_id'] = null;
                $userData['avatar'] = null;
            }

            $user->update($userData);

            // --- UPDATE / CREATE STUDENT PROFILE ---
            $studentProfileData = [
                'whatsapp' => $data['whatsapp'],
                'birthday' => $data['birthday'],
                'student_id' => $user->id,
            ];

            $user->student_profiles()
                ->updateOrCreate(
                    ['student_id' => $user->id],
                    $studentProfileData
                );

            DB::commit();

            // KIRIM EMAIL VERIFIKASI SETELAH COMMIT
            if ($emailChanged) {
                $user->sendEmailVerificationNotification();

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
            DB::rollBack();
            return back()->withErrors([
                'error' => 'Update profile gagal: ' . $e->getMessage()
            ]);
        }
    }
}
