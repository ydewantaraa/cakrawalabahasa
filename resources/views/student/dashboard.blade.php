@extends('layouts.app')

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
                    Dashboard Siswa
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="bg-white p-6 rounded shadow">Total Siswa</div>
                    <div class="bg-white p-6 rounded shadow">Total Kelas</div>
                    <div class="bg-white p-6 rounded shadow">Total Guru</div>
                    <div class="bg-white p-6 rounded shadow">Total Layanan</div>
                </div>
            </div>
        </div>
    </div>
@endsection
