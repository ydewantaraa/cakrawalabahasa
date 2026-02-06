<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentProfileRequest;
use App\Mail\VerifyEmailMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StudentProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        return response()->json([
            'success' => true,
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'email_verified' => $user->hasVerifiedEmail(),
                ],
                'student_profile' => $user->student_profiles,
            ],
        ]);
    }

    /**
     * PATCH /api/profile
     */
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
            $user->student_profiles()->updateOrCreate(
                ['student_id' => $user->id],
                [
                    'whatsapp' => $data['whatsapp'],
                    'birthday' => $data['birthday'],
                ]
            );

            DB::commit();

            // Kirim ulang email verifikasi jika email berubah
            if ($emailChanged) {
                $verificationUrl = url(
                    "/api/auth/email/verify/{$user->id}/" . sha1($user->email)
                );

                Mail::to($user->email)
                    ->send(new VerifyEmailMail($verificationUrl));
            }

            return response()->json([
                'success' => true,
                'message' => $emailChanged
                    ? 'Email diperbarui. Silakan verifikasi email Anda.'
                    : 'Profile berhasil diperbarui',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Update profile gagal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
