<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\StudentProfileController;
use App\Http\Controllers\Api\ProgramServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'can:admin'])->group(function () {
    Route::post('/program-services', [ProgramServiceController::class, 'store']);
    Route::put('/program-services/{programService}', [ProgramServiceController::class, 'update']);
    Route::delete('/program-services/{programService}', [ProgramServiceController::class, 'destroy']);
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

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink']);
    Route::post('/reset-password', [PasswordController::class, 'resetPassword']);
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->name('verification.verify');

    Route::get('/google/redirect', [GoogleAuthController::class, 'redirect']);
    Route::get('/google/callback', [GoogleAuthController::class, 'callback']);
});
