@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-8">
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
@endsection
