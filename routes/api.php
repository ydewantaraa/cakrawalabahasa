<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\StudentProfileController;
use App\Http\Controllers\Api\ProgramServiceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\TeacherProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', function (Request $request) {
    $user = $request->user();

    if ($user->role === 'teacher') {
        $user->load('teacher_profile');
    }

    if ($user->role === 'student') {
        $user->load('student_profile');
    }

    return response()->json([
        'data' => $user
    ], 200);
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::post('/program-services', [ProgramServiceController::class, 'store']);
    // Route::show('/program-services', [ProgramServiceController::class, 'show']);
    Route::put('/program-services/{programService}', [ProgramServiceController::class, 'update']);
    Route::delete('/program-services/{programService}', [ProgramServiceController::class, 'destroy']);
    Route::apiResource('/courses', CourseController::class);
    Route::post('/teachers', [TeacherController::class, 'store']);
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy']);
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update']);
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show']);
    Route::get('/teachers', [TeacherController::class, 'getAllTeachers']);
    Route::get('/students', [StudentController::class, 'getAllStudents']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);
});

Route::prefix('auth')->group(function () {

    Route::middleware(['auth:sanctum', 'can:all-users'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/email/verified', [AuthController::class, 'checkVerified']);
        Route::post('/email/resend', [AuthController::class, 'resendVerification']);
        Route::post('/change-password', [PasswordController::class, 'change']);
    });

    Route::middleware(['auth:sanctum', 'can:student', 'verified'])->group(function () {
        Route::get('/student-profile', [StudentProfileController::class, 'show']);
        Route::patch('/student-profile', [StudentProfileController::class, 'update']);
    });

    Route::middleware(['auth:sanctum', 'can:teacher', 'verified'])->group(function () {
        Route::get('/teacher-profile', [TeacherProfileController::class, 'show']);
        Route::patch('/teacher-profile', [TeacherProfileController::class, 'update']);
    });

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
    Route::get('/reset-password', function (Request $request) {
        return response()->json([
            'token' => $request->token,
            'email' => $request->email,
        ]);
    });
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->name('verification.verify');

    Route::get('/google/redirect', [GoogleAuthController::class, 'redirect']);
    Route::get('/google/callback', [GoogleAuthController::class, 'callback']);
});
