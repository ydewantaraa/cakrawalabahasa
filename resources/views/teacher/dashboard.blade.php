@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Dashboard Admin')

@section('content')
    <div x-data="{ open: true }" class="relative md:flex -mx-6 pt-16">

        {{-- Sidebar --}}
        @include('partials.sidebar.main-sidebar')

        {{-- Main content --}}
        <div class="flex-1 min-h-screen transition-all duration-300"
            :class="open ? 'md:ml-64 md:pl-0 pl-4 sm:pl-6' : 'md:ml-16 sm:ml-30 md:pl-0 pl-16'">
            <div class="max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto p-4 sm:p-6 md:p-8">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">
                    Dashboard Guru
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded shadow">Total Siswa</div>
                    <div class="bg-white p-6 rounded shadow">Total Kelas</div>
                    <div class="bg-white p-6 rounded shadow">Total Guru</div>
                    <div class="bg-white p-6 rounded shadow">Total Layanan</div>
                </div>
=======
@section('title', 'Dashboard')

@section('content')
    <div class="min-h-screen flex bg-gray-100 px-4">
        <div class="flex flex-col md:flex-row p-6 space-y-6 md:space-y-0 md:space-x-6" x-data="{ activeTab: 'courses' }">
            <!-- Sidebar -->
            <div class="w-full md:w-1/5 bg-white rounded-3xl shadow-lg p-6">
                <nav class="space-y-4">
                    <!-- tombol sidebar -->
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full md:w-4/5 space-y-6">
                <h1>Dashboard Guru</h1>

                <!-- My Courses -->
                <section x-show="activeTab === 'courses'" x-cloak>
                    ...
                </section>

                <!-- History -->
                <section x-show="activeTab === 'history'" x-cloak>
                    ...
                </section>

                <!-- Favourite -->
                <section x-show="activeTab === 'favourite'" x-cloak>
                    ...
                </section>

>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
            </div>
        </div>
    </div>
@endsection
