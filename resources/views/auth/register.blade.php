@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 my-5">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            @include('components.status-message')
            <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">
                register
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama Lengkap -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 @error('full_name') border-red-500 @enderror"
                        required>
                    @error('full_name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                        required>
                    @error('email')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 @error('password') border-red-500 @enderror"
                        required>
                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 @error('password_confirmation') border-red-500 @enderror"
                        required>
                    @error('password_confirmation')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2">
                    Register
                </button>
            </form>
            <span>allready have an account? <a href="{{ route('login') }}" class="text-blue-500 underline">Login</a></span>
        </div>
    </div>
@endsection
