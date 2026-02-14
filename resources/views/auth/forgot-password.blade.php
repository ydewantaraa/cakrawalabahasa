@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            <h1 class="text-xl font-semibold mb-4 text-center text-gray-800">
                Forgot Password
            </h1>

            <p class="mb-4 text-sm text-gray-600 text-center">
                Enter your email address and we'll send you a password reset link.
            </p>

            @include('components.status-message')

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email -->
                <div class="mb-6">
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <button type="submit" class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2">
                    Send Reset Password Link
                </button>
            </form>

        </div>
    </div>
@endsection
