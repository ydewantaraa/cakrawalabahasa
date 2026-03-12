<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6">

    {{-- ================= HEADER POPULAR CLASS ================= --}}
    <div>
        <h1 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6">
            Detail Kelas Populer
        </h1>

        <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 items-start">

            {{-- Thumbnail Course --}}
            <div class="w-full lg:w-48 flex-shrink-0">
                <img src="{{ $popularClass->course->thumbnail ? $popularClass->course->thumbnail : asset('img/default-course.png') }}"
                    alt="Thumbnail" class="w-full h-32 sm:h-36 lg:h-40 object-cover rounded border">
            </div>

            {{-- Basic Info --}}
            <div class="flex-1 space-y-2">
                <h2 class="text-lg sm:text-xl font-semibold text-gray-800">
                    {{ $popularClass->course->name }}
                </h2>

                <p class="text-sm sm:text-base text-gray-600">
                    {{ $popularClass->course->description }}
                </p>

                <div class="mt-3 sm:mt-4">
                    <p class="text-gray-500 text-sm">Harga Populer</p>
                    <p class="text-base sm:text-lg font-semibold text-navy_1">
                        {{ $popularClass->price }}
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

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 text-sm sm:text-base">

            <div>
                <p class="text-gray-500">Layanan Program</p>
                <p class="font-medium">
                    {{ $popularClass->course->program_service?->name ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kategori</p>
                <p class="font-medium">
                    {{ $popularClass->course->category }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Durasi</p>
                <p class="font-medium">
                    {{ $popularClass->course->duration }} jam
                </p>
            </div>

            <div>
                <p class="text-gray-500">Kuota</p>
                <p class="font-medium">
                    {{ $popularClass->course->quota }} peserta
                </p>
            </div>
        </div>
    </div>

    {{-- ================= DESKRIPSI POPULER ================= --}}
    <div>
        <h3 class="text-base sm:text-lg font-semibold mb-3 sm:mb-4 text-gray-800">
            Keunggulan Kelas Populer
        </h3>

        @if ($popularClass->descriptions->count())
            <ul class="list-disc ml-5 sm:ml-6 space-y-1 sm:space-y-2 text-sm sm:text-base text-gray-700">
                @foreach ($popularClass->descriptions as $desc)
                    <li>{{ $desc->description }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-sm text-gray-500">Tidak ada deskripsi.</p>
        @endif
    </div>

</div>
