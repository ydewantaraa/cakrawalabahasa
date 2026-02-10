@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-4 sm:p-6 md:p-8">

        @switch($tab)
            @case('program-services')
                @include('admin.tabs.program-services')
            @break

            @case('students-management')
                @include('admin.tabs.students-management')
                <p>manajemen siswa</p>
            @break

            @case('classes-management')
                @include('admin.tabs.classes-management')
                <p>manajemen kelas</p>
            @break

            @default
                @include('admin.tabs.overview')
                <p>overview</p>
        @endswitch
    </div>
@endsection
