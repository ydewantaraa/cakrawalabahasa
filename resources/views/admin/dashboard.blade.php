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
                @if ($errors->any())
                    <div class="mb-4 rounded-lg bg-red-50 border border-red-200 p-4">
                        <p class="font-semibold text-red-700 mb-2">Terjadi kesalahan:</p>
                        <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="mb-4 rounded-lg bg-green-50 border border-green-200 p-4 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('warning'))
                    <div class="mb-4 rounded-lg bg-yellow-50 border border-yellow-200 p-4 text-yellow-700">
                        {{ session('warning') }}
                    </div>
                @endif

                @if (session('info'))
                    <div class="mb-4 rounded-lg bg-blue-50 border border-blue-200 p-4 text-blue-700">
                        {{ session('info') }}
                    </div>
                @endif
                @switch($tab)
                    @case('program-services')
                        @include('admin.tabs.program-services')
                    @break

                    @case('students-management')
                        @include('admin.tabs.students-management')
                    @break

                    @case('classes-management')
                        @include('admin.tabs.classes-management')
                    @break

                    @case('teachers-management')
                        @include('admin.tabs.teachers-management')
                    @break

                    @case('transaction-history')
                        @include('admin.tabs.transaction-history')
                    @break

                    @default
                        @include('admin.tabs.overview')
                @endswitch
            </div>
        </div>
    </div>
@endsection
