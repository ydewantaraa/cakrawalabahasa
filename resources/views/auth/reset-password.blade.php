@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">
                Reset Password
            </h1>

            @if ($errors->any())
                <div class="mb-4 p-2 text-sm text-center bg-red-100 text-red-700 rounded">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Token -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $email) }}" required autofocus
                        autocomplete="username"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">New Password</label>
                    <input type="password" name="password" required autocomplete="new-password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Password Confirmation -->
                <div class="mb-6">
                    <label class="block text-sm text-gray-700 mb-1">
                        Confirm New Password
                    </label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <button type="submit" class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2">
                    Reset Password
                </button>
            </form>

        </div>
    </div>
@endsection
