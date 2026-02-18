@extends('layouts.app')

@section('title', 'Profile Information - Cakrawala Bahasa')
@section('header', 'Profil Saya')

@section('content')
    <section class="w-full min-h-screen bg-gray-100 p-6">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <div class="flex justify-center mb-6">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16">
            </div>

            @include('components.status-message')

            <h1 id="page-title" class="text-xl font-bold mb-6 text-center text-gray-800">
                Profil Saya
            </h1>


            {{-- Tabs --}}
            <div class="flex border-b mb-6">
                <button id="tab-info"
                    class="px-4 py-2 font-semibold text-gray-700 border-b-2 border-navy_1 focus:outline-none">
                    Info
                </button>
                <button id="tab-security"
                    class="px-4 py-2 font-semibold text-gray-700 border-b-2 border-transparent hover:border-gray-300 focus:outline-none">
                    Security
                </button>
            </div>

            {{-- Tab Contents --}}
            <div id="content-info">
<<<<<<< HEAD
                @if (Auth::user()->role == 'student')
                    @include('profile.partials.show-student')
                    @include('profile.partials.edit-student')
                @elseif (Auth::user()->role == 'teacher')
                    @include('profile.partials.show-teacher')
                    @include('profile.partials.edit-teacher')
                @endif
=======
                {{-- Info Profile (hidden awalnya) --}}
                @include('profile.partials.info-view')

                {{-- Edit Form (hidden awalnya) --}}
                @include('profile.partials.info-edit')
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
            </div>

            {{-- Security Tab --}}
            @include('profile.partials.security')

        </div>
    </section>

    <script>
        // Tab switching
        const tabInfo = document.getElementById('tab-info');
        const tabSecurity = document.getElementById('tab-security');
        const contentInfo = document.getElementById('content-info');
        const contentSecurity = document.getElementById('content-security');
        const pageTitle = document.getElementById('page-title');

        tabInfo.addEventListener('click', () => {
            contentInfo.classList.remove('hidden');
            contentSecurity.classList.add('hidden');
            tabInfo.classList.add('border-navy_1');
            tabSecurity.classList.remove('border-navy_1');
            tabSecurity.classList.add('border-transparent');
            pageTitle.textContent = 'Profil Saya';
        });

        tabSecurity.addEventListener('click', () => {
            contentSecurity.classList.remove('hidden');
            contentInfo.classList.add('hidden');
            tabSecurity.classList.add('border-navy_1');
            tabInfo.classList.remove('border-navy_1');
            tabInfo.classList.add('border-transparent');
            pageTitle.textContent = 'Ubah Password';
        });

        // Toggle Edit Form
        const editBtn = document.getElementById('edit-profile-btn');
        const profileView = document.getElementById('profile-view');
        const profileEdit = document.getElementById('profile-edit');
        const cancelEdit = document.getElementById('cancel-edit');

        editBtn.addEventListener('click', () => {
            profileView.classList.add('hidden');
            profileEdit.classList.remove('hidden');
        });

        cancelEdit.addEventListener('click', () => {
            profileEdit.classList.add('hidden');
            profileView.classList.remove('hidden');
        });
    </script>
@endsection
