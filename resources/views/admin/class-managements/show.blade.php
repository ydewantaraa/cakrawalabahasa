<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6 sm:space-y-8">

    {{-- ================= HEADER COURSE ================= --}}
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">
            Detail Course
        </h1>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">

            {{-- Thumbnail --}}
            <div class="w-full sm:w-40 md:w-48 flex-shrink-0">
                <img src="{{ $course->thumbnail ? $course->thumbnail : asset('img/default-course.png') }}" alt="Thumbnail"
                    class="w-full h-28 sm:h-32 md:h-40 object-cover rounded border">
            </div>

            {{-- Basic Info --}}
            <div class="flex-1 space-y-2">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ $course->name }}
                </h2>

                <p class="text-sm text-gray-600">
                    {{ $course->description }}
                </p>
            </div>
        </div>
    </div>

    {{-- ================= INFORMASI COURSE ================= --}}
    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 text-sm">

            <div>
                <p class="text-gray-500">Layanan Program</p>
                <p class="font-medium">{{ $course->program_service?->name ?? '-' }}</p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                <p class="font-medium">
                    @if ($course->isActive == 1)
                        Aktif
                    @else
                        Belum Aktif
                    @endif
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kategori</p>
                <p class="font-medium">{{ $course->category }}</p>
            </div>

            <div>
                <p class="text-gray-500">Kuota</p>
                <p class="font-medium">{{ $course->quota }} peserta</p>
            </div>

            <div>
                <p class="text-gray-500">Durasi</p>
                <p class="font-medium">{{ $course->duration }} jam</p>
            </div>

            <div>
                <p class="text-gray-500">Fasilitas</p>
                <p class="font-medium">
                    {{ $course->course_facilities->pluck('name')->implode(', ') ?: '-' }}
                </p>
            </div>

            <div class="sm:col-span-2">
                <p class="text-gray-500">Keterangan</p>
                <p class="font-medium">
                    {{ $course->explanation }}
                </p>
            </div>

        </div>
    </div>

</div>
