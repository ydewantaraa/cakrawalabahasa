<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherProfileRequest;
use App\services\TeacherProfileService;
use Illuminate\Http\Request;

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

        return response()->json([
            'success' => true,
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'full_name' => $user->full_name,
                    'email' => $user->email,
                    'email_verified' => $user->hasVerifiedEmail(),
                ],
                'teacher_profile' => $user->teacher_profile,
            ],
        ]);
    }

    public function update(TeacherProfileRequest $request)
    {
        try {
            $result = $this->service->update(
                auth()->user(),
                $request->validated(),
                $request
            );

            return response()->json([
                'success' => true,
                'message' => $result['email_changed']
                    ? 'Email diperbarui. Silakan verifikasi email Anda.'
                    : 'Profile berhasil diperbarui',
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
