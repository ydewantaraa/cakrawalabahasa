<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\StudentProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->prefix('auth')->group(function () {

    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);

    // Email verification
    Route::get('/email/verified', [AuthController::class, 'checkVerified']);
    Route::post('/email/resend', [AuthController::class, 'resendVerification']);

    // Password
    Route::post('/change-password', [PasswordController::class, 'change']);

    // Student Profile (WAJIB VERIFIED)
    Route::middleware('verified')->group(function () {
        Route::get('/student-profile', [StudentProfileController::class, 'show']);
        Route::patch('/student-profile', [StudentProfileController::class, 'update']);
    });
});



Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->name('verification.verify');
    Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect']);
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);
});




    
// Route::post('/login', [AuthController::class, 'login']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/email/verify', function (Request $request) {
//         return response()->json([
//             'verified' => $request->user()->hasVerifiedEmail()
//         ]);
//     });

//     Route::post('/email/verification-notification', function (Request $request) {
//         $request->user()->sendEmailVerificationNotification();
//         return response()->json(['message' => 'Verification email sent']);
//     });
// });
