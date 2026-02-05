@extends('layouts.app')

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
                Change Password
            </h1>

            @if ($errors->any())
                <div class="mb-4 p-2 text-center bg-red-100 text-red-700 rounded">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.change') }}">
                @csrf

                <!-- Password Lama -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">
                        Old Password
                    </label>
                    <input type="password" name="current_password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <!-- Password Baru -->
                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">
                        New Password
                    </label>
                    <input type="password" name="password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <!-- Konfirmasi Password -->
                <div class="mb-6">
                    <label class="block text-sm text-gray-700 mb-1">
                        Password Confirmation
                    </label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <button class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2">
                    Simpan Perubahan
                </button>
            </form>

            <div class="text-sm text-center mt-6">
                <a href="{{ route('dashboard') }}" class="text-blue-500 underline">
                    Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
@endsection
