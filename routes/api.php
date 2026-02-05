<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/email/verified', [AuthController::class, 'checkVerified']);
        Route::post('/email/resend', [AuthController::class, 'resendVerification']);
        Route::post('/change-password', [PasswordController::class, 'change']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
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
