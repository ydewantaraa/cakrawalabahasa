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

                    @default
                        @include('admin.tabs.overview')
                @endswitch
            </div>
        </div>
    </div>
@endsection
