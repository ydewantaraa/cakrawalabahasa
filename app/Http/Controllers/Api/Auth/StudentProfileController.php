<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StudentProfileRequest;
use App\Mail\VerifyEmailMail;
use App\services\StudentProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

        return response()->json([
            'success' => true,
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'email_verified' => $user->hasVerifiedEmail(),
                ],
                'student_profile' => $user->student_profile,
            ],
        ]);
    }

    public function update(StudentProfileRequest $request)
    {
        try {
            $user = auth()->user();

            $result = $this->service->update(
                $user,
                $request->validated()
            );

            // refresh data dari database
            $user->refresh()->load('student_profile');

            return response()->json([
                'success' => true,
                'message' => $result['email_changed']
                    ? 'Email diperbarui. Silakan verifikasi email Anda.'
                    : 'Profile berhasil diperbarui',
                'data' => $user,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update profile gagal',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
