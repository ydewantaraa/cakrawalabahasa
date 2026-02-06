@extends('layouts.app')

@section('title', 'Edit Profile - Cakrawala Bahasa')

@section('header', 'Profile Information')

@section('content')
    <section class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            Update your account's profile information and email address.
        </p>

        {{-- Form untuk re-send verification email --}}
        <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
            @csrf
        </form>

        {{-- Form update profile --}}
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PATCH')

            {{-- Name --}}
            <div>
                <label for="name" class="block font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input id="name" name="name" type="text"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm"
                    value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input id="email" name="email" type="email"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm"
                    value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                        Your email address is unverified.
                        <button form="send-verification" class="underline text-blue-600 hover:text-blue-800">
                            Click here to re-send the verification email.
                        </button>
                    </div>
                    @if (session('status') === 'verification-link-sent')
                        <p class="text-sm text-green-600 dark:text-green-400 mt-1">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                @endif
            </div>

            {{-- Submit --}}
            <div class="flex items-center gap-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Save
                </button>

                @if (session('status') === 'profile-updated')
                    <p class="text-sm text-gray-600 dark:text-gray-400" id="saved-message">
                        Saved.
                    </p>
                @endif
            </div>
        </form>
    </section>

    <script>
        // Auto-hide message
        const savedMessage = document.getElementById('saved-message');
        if (savedMessage) {
            setTimeout(() => savedMessage.style.display = 'none', 2000);
        }
    </script>
@endsection
