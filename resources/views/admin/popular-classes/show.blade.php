<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-8">

    {{-- ================= HEADER POPULAR CLASS ================= --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Detail Kelas Populer
        </h1>

        <div class="flex flex-col lg:flex-row gap-6 items-start">

            {{-- Thumbnail Course --}}
            <div class="w-full lg:w-48 flex-shrink-0">
                <img src="{{ $popularClass->course->thumbnail ? $popularClass->course->thumbnail : asset('img/default-course.png') }}"
                    alt="Thumbnail" class="w-full h-32 lg:h-40 object-cover rounded border">
            </div>

            {{-- Basic Info --}}
            <div class="flex-1 space-y-2">
                <h2 class="text-xl font-semibold text-gray-800">
                    {{ $popularClass->course->name }}
                </h2>

                <p class="text-sm text-gray-600">
                    {{ $popularClass->course->description }}
                </p>

                <div class="mt-4">
                    <p class="text-gray-500 text-sm">Harga Populer</p>
                    <p class="text-lg font-semibold text-navy_1">
                        {{ $popularClass->price }}
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
                <p class="text-gray-500">Program Service</p>
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
        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Keunggulan Kelas Populer
        </h3>

        @if ($popularClass->descriptions->count())
            <ul class="list-disc ml-6 space-y-2 text-sm text-gray-700">
                @foreach ($popularClass->descriptions as $desc)
                    <li>{{ $desc->description }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-sm text-gray-500">Tidak ada deskripsi.</p>
        @endif
    </div>

</div>
