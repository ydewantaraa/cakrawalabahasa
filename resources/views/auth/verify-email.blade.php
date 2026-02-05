@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6 text-center">

            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            {{-- Status sukses kirim email --}}
            @if (session('status') === 'verification-link-sent')
                <div class="mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded p-3">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            @auth
                <p class="text-sm text-gray-600 mb-4">
                    Your email is not verified. Please check your inbox.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="w-full bg-navy_1 text-white py-2 rounded hover:bg-navy_2 mb-4">
                        Resend Verification Email
                    </button>
                </form>
            @else
                <p class="text-sm text-gray-600 mb-4">
                    Thanks for signing up! Please verify your email before continuing.
                </p>
            @endauth

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 underline hover:text-gray-900">
                        Log Out
                    </button>
                </form>
            @endauth

        </div>
    </div>
@endsection
