@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">
                Login
            </h1>
            @include('components.status-message')
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <button class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2">
                    Login
                </button>
            </form>

            <!-- Separator -->
            <div class="my-6 flex items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="mx-3 text-sm text-gray-500">atau</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <!-- Login with Google -->
            {{-- <a href="{{ route('auth.google.redirect') }}" --}}
            <a href="{{ route('google.redirect') }}"
                class="w-full flex items-center justify-center gap-3 border border-gray-300 py-2 rounded hover:bg-gray-200 mb-3">

                <!-- Google Icon (SVG) -->
                <svg class="h-5 w-5" viewBox="0 0 48 48">
                    <path fill="#EA4335"
                        d="M24 9.5c3.54 0 6.72 1.22 9.22 3.6l6.88-6.88C35.9 2.36 30.47 0 24 0 14.64 0 6.52 5.38 2.56 13.22l8.02 6.22C12.36 13.2 17.74 9.5 24 9.5z" />
                    <path fill="#4285F4"
                        d="M46.1 24.5c0-1.64-.15-3.22-.42-4.75H24v9h12.7c-.55 2.94-2.18 5.44-4.63 7.12l7.18 5.56C43.97 37.02 46.1 31.23 46.1 24.5z" />
                    <path fill="#FBBC05"
                        d="M10.58 28.44c-.48-1.44-.76-2.98-.76-4.44s.27-3 .76-4.44l-8.02-6.22C.92 16.46 0 20.12 0 24s.92 7.54 2.56 10.66l8.02-6.22z" />
                    <path fill="#34A853"
                        d="M24 48c6.48 0 11.92-2.14 15.9-5.82l-7.18-5.56c-2 1.34-4.56 2.12-8.72 2.12-6.26 0-11.64-3.7-13.42-8.94l-8.02 6.22C6.52 42.62 14.64 48 24 48z" />
                </svg>

                <span class="text-sm font-medium text-gray-700">
                    Login with Google
                </span>
            </a>

            <div class="text-sm text-center">
                <span>allready have an account? <a href="{{ route('register') }}"
                        class="text-blue-500 underline">register</a></span>
                <br>
                <span>forgot password? <a href="{{ route('password.request') }}"
                        class="text-blue-500 underline">reset</a></span>
            </div>


        </div>
    </div>
@endsection
