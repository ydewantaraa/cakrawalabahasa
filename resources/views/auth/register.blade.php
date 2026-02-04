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
                register
            </h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="full_name"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

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

                <div class="mb-4">
                    <label class="block text-sm text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                    register
                </button>
            </form>
        </div>
    </div>
@endsection
