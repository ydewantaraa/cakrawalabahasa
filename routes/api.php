<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\Api\Auth\PasswordController;
use App\Http\Controllers\Api\Auth\StudentProfileController;
use App\Http\Controllers\Api\ProgramServiceController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CourseServiceController;
use App\Http\Controllers\Api\PriceController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\SubCourseServiceController;
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

Route::get('/courses/{slug}', [CourseController::class, 'show']);
Route::get('/program-services/{programService:slug}', [ProgramServiceController::class, 'show']);
Route::get('/teachers/{teacher}', [TeacherController::class, 'show']);
Route::get('/students/{student}', [StudentController::class, 'show']);
Route::get('/courses', [CourseController::class, 'index']);

Route::middleware(['auth:sanctum', 'can:admin'])->prefix('admin')->group(function () {
    Route::post('/program-services', [ProgramServiceController::class, 'store']);
    Route::get('/program-services', [ProgramServiceController::class, 'index']);
    Route::put('/program-services/{programServiceById}', [ProgramServiceController::class, 'update']);
    Route::delete('/program-services/{programServiceById}', [ProgramServiceController::class, 'destroy']);
    // show program service by admin
    Route::get('/program-services/{programServiceById}', [ProgramServiceController::class, 'showAdmin']);
    Route::get('/courses/{course}', [CourseController::class, 'showAdmin']);
    Route::delete('/courses/{course}', [CourseController::class, 'destroy']);
    Route::put('/courses/{course}', [CourseController::class, 'update']);
    Route::post('/courses', [CourseController::class, 'store']);
    Route::post('/teachers', [TeacherController::class, 'store']);
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy']);
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update']);
    Route::get('/teachers', [TeacherController::class, 'getAllTeachers']);
    Route::get('/students', [StudentController::class, 'getAllStudents']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);
    // Course service endpoint
    Route::get('/courses/{course}/course-services', [CourseServiceController::class, 'index']);
    Route::post('/courses/{course}/course-services', [CourseServiceController::class, 'store']);
    Route::put('/course-services/{courseService}', [CourseServiceController::class, 'update']);
    Route::delete('/course-services/{courseService}', [CourseServiceController::class, 'destroy']);
    Route::get('/course-services/{courseService}', [CourseServiceController::class, 'show']);
    // Sub Course service endpoint
    Route::get('/course-services/{courseService}/sub-course-services', [SubCourseServiceController::class, 'index']);
    Route::post('/course-services/{courseService}/sub-course-services', [SubCourseServiceController::class, 'store']);
    Route::put('/sub-course-services/{subCourseService}', [SubCourseServiceController::class, 'update']);
    Route::delete('/sub-course-services/{subCourseService}', [SubCourseServiceController::class, 'destroy']);
    Route::get('/sub-course-services/{subCourseService}', [SubCourseServiceController::class, 'show']);
    // CRUD price berdasarkan id
    Route::get('/prices/{price}', [PriceController::class, 'show']);
    Route::put('/prices/{price}', [PriceController::class, 'update']);
    Route::delete('/prices/{price}', [PriceController::class, 'destroy']);
    // POST harga untuk course service
    Route::post('/course-services/{courseService}/prices', [PriceController::class, 'store']);
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
