@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <h1 class="text-xl font-semibold mb-6 text-gray-800 dark:text-gray-100">
                Login
            </h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <button class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
