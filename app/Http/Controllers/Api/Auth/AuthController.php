<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\VerifyEmailMail;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $auth)
    {
        $user = $auth->register(
            $request->full_name,
            $request->email,
            $request->password
        );
        $url = url("/api/email/verify/{$user->id}/" . sha1($user->email));

        Mail::to($user->email)->send(new VerifyEmailMail($url));

        return response()->json([
            'message' => 'User registered. Please verify your email.',
            'user' => $user
        ], 201);
    }


    public function login(LoginRequest $request, AuthService $auth)
    {
        $user = $auth->login($request->email, $request->password);

        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'verified' => $user->hasVerifiedEmail()
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function checkVerified(Request $request)
    {
        return response()->json([
            'verified' => $request->user()->hasVerifiedEmail()
        ]);
    }

    public function verifyEmail($id, $hash)
    {
        $user = User::findOrFail($id);

        if (! hash_equals(sha1($user->email), $hash)) {
            return response()->json(['message' => 'Invalid verification link'], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified']);
        }

        $user->markEmailAsVerified();

        return response()->json(['message' => 'Email verified successfully']);
    }

    public function resendVerification(Request $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified'
            ]);
        }

        $url = url("/api/email/verify/{$user->id}/" . sha1($user->email));

        Mail::to($user->email)->send(new VerifyEmailMail($url));

        return response()->json([
            'message' => 'Verification email sent'
        ]);
    }
}
