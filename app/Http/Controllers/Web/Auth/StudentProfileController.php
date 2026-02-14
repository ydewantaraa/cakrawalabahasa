<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentProfileRequest;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class StudentProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $studentProfile = $user->student_profiles;

        return view('profile.show', compact('user', 'studentProfile'));
    }

    public function update(StudentProfileRequest $request)
    {
        Gate::authorize('student');
        $user = auth()->user();
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $emailChanged = false;

            $userData = [
                'full_name' => $data['full_name'],
            ];

            if (
                isset($data['email']) &&
                $data['email'] !== $user->email
            ) {
                $emailChanged = true;

                $wasGoogleUser = !is_null($user->google_id);

                $userData['email'] = $data['email'];
                $userData['email_verified_at'] = null;

                if ($wasGoogleUser) {
                    $userData['google_id'] = null;

                    if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                        Storage::disk('public')->delete($user->avatar);
                    }

                    $userData['avatar'] = null;
                }
            }

            if ($request->hasFile('avatar')) {
                if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                    Storage::disk('public')->delete($user->avatar);
                }

                $userData['avatar'] = $request
                    ->file('avatar')
                    ->store('avatars', 'public');
            }

            $user->update($userData);

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
