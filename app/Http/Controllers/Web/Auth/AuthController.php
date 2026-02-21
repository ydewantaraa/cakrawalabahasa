<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request, AuthService $auth)
    {
        $user = $auth->login(
            $request->email,
            $request->password
        );

        Auth::login($user);

        return redirect()->route('dashboard')->with('status', 'Login berhasil.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request, AuthService $auth)
    {
        $user = $auth->register($request->full_name, $request->email, $request->password);
        Auth::login($user);

        return redirect()->route('dashboard')->with('status', 'Registrasi berhasil.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('status', 'Berhasil logout.');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard')->with('status', 'Email berhasil diverifikasi.');
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    }
}
