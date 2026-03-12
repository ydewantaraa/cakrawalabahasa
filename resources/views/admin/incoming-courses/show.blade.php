<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6 sm:space-y-8">

    {{-- ================= HEADER INCOMING COURSE ================= --}}
    <div>
        <h1 class="text-lg sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">
            Detail Incoming Course
        </h1>

        <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 items-start">

            {{-- Thumbnail Course --}}
            <div class="w-full sm:w-40 lg:w-48 flex-shrink-0">
                <img src="{{ $incomingCourse->course->thumbnail ? $incomingCourse->course->thumbnail : asset('img/default-course.png') }}"
                    alt="Thumbnail" class="w-full h-28 sm:h-32 lg:h-40 object-cover rounded border">
            </div>

            {{-- Basic Info --}}
            <div class="flex-1 space-y-2">

                <h2 class="text-base sm:text-xl font-semibold text-gray-800">
                    {{ $incomingCourse->course->name }}
                </h2>

                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed line-clamp-3 sm:line-clamp-none">
                    {{ $incomingCourse->course->description }}
                </p>

                <div class="mt-3 sm:mt-4">
                    <p class="text-gray-500 text-xs sm:text-sm">
                        Tanggal Incoming
                    </p>

                    <p class="text-sm sm:text-lg font-semibold text-navy_1">
                        {{ \Carbon\Carbon::parse($incomingCourse->incoming_date)->translatedFormat('d F Y') }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- ================= INFORMASI COURSE ================= --}}
    <div>

        <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4 text-gray-800">
            Informasi Kelas
        </h3>

        <div class="grid grid-cols-2 sm:grid-cols-2 gap-4 sm:gap-6 text-xs sm:text-sm">

            <div>
                <p class="text-gray-500">Layanan</p>
                <p class="font-medium">
                    {{ $incomingCourse->course->program_service?->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kategori</p>
                <p class="font-medium">
                    {{ $incomingCourse->course->category }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Durasi</p>
                <p class="font-medium">
                    {{ $incomingCourse->course->duration }} jam
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kuota</p>
                <p class="font-medium">
                    {{ $incomingCourse->course->quota }} peserta
                </p>
            </div>

        </div>

    </div>

</div>
