<div class="md:pl-6">
    <div class="bg-white p-6 md:p-8 rounded shadow w-full max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-semibold">Dashboard Overview</h1>
            <p class="text-gray-500 text-sm mt-1">
                Ringkasan data sistem secara keseluruhan
            </p>
        </div>

        <!-- Summary Cards -->
        <div class="grid gap-6 [grid-template-columns:repeat(auto-fit,minmax(220px,1fr))]">

            <div class="bg-blue-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Jumlah Siswa</p>
                <p class="text-3xl font-bold mt-2">{{ $totalStudents }}</p>
            </div>

            <div class="bg-green-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Jumlah Guru</p>
                <p class="text-3xl font-bold mt-2">{{ $totalTeachers }}</p>
            </div>

            <div class="bg-purple-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Jumlah Kelas</p>
                <p class="text-3xl font-bold mt-2">{{ $totalClasses }}</p>
            </div>

            <div class="bg-indigo-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Program Service</p>
                <p class="text-3xl font-bold mt-2">{{ $totalProgramServices }}</p>
            </div>

            <div class="bg-pink-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Total Pendaftaran</p>
                <p class="text-3xl font-bold mt-2"> 20 </p>
            </div>

            <div class="bg-red-600 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Total Transaksi</p>
                <p class="text-3xl font-bold mt-2"> 10</p>
            </div>

            <div class="bg-gray-700 text-white p-5 rounded-lg shadow">
                <p class="text-sm">Total Pendapatan</p>
                <p class="text-3xl font-bold mt-2">
                    Rp 1.000.000
                </p>
            </div>

        </div>

    </div>

</div>
