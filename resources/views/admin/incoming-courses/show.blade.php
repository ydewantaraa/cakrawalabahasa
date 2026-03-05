<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-8">

    {{-- ================= HEADER INCOMING COURSE ================= --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Detail Incoming Course
        </h1>

        <div class="flex flex-col lg:flex-row gap-6 items-start">

            {{-- Thumbnail Course --}}
            <div class="w-full lg:w-48 flex-shrink-0">
                <img src="{{ $incomingCourse->course->thumbnail ? $incomingCourse->course->thumbnail : asset('img/default-course.png') }}"
                    alt="Thumbnail" class="w-full h-32 lg:h-40 object-cover rounded border">
            </div>

            {{-- Basic Info --}}
            <div class="flex-1 space-y-2">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $incomingCourse->course->name }}
                </h2>

                <p class="text-sm text-gray-600">
                    {{ $incomingCourse->course->description }}
                </p>

                <div class="mt-4">
                    <p class="text-gray-500 text-sm">Tanggal Incoming</p>
                    <p class="text-lg font-semibold text-navy_1">
                        {{ \Carbon\Carbon::parse($incomingCourse->incoming_date)->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- ================= INFORMASI COURSE ================= --}}
    <div>
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Informasi Kelas
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">

            <div>
                <p class="text-gray-500">Layanan Program</p>
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
