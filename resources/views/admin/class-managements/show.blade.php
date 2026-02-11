<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row gap-6">
        {{-- Thumbnail --}}
        <div class="w-full md:w-48 flex-shrink-0">
            <img src="{{ $course->thumbnail ? $course->thumbnail : asset('img/default-course.png') }}" alt="Thumbnail"
                class="w-full h-32 md:h-40 object-cover rounded border">
        </div>

        {{-- Basic Info --}}
        <div class="flex-1 space-y-2">
            <h2 class="text-xl font-semibold text-gray-800">
                {{ $course->name }}
            </h2>

            <p class="text-sm text-gray-600">
                {{ $course->description }}
            </p>

            <p class="text-lg font-semibold text-navy_2">
                Rp {{ number_format($course->price, 0, ',', '.') }}
            </p>
        </div>
    </div>

    {{-- Detail Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">

        <div>
            <p class="text-gray-500">Program Service</p>
            <p class="font-medium">
                {{ $course->program_service?->name ?? '-' }}
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
            <p class="text-gray-500">Tipe Pembelajaran</p>
            <p class="font-medium capitalize">{{ $course->learning_type }}</p>
        </div>

    </div>

    {{-- Sub Description Detail --}}
    <p class="text-gray-700 font-medium mb-2">Sub Deskripsi</p>

    {{-- Kotak Sub Deskripsi --}}
    <div class="border rounded p-4 space-y-2">
        {{-- Title Sub --}}
        <p class="text-gray-500 text-sm">
            {{ $course->sub_description_title ?? '-' }}
        </p>

        <hr class="border-gray-200">

        {{-- Isi Sub --}}
        <p class="text-gray-700 text-sm">
            {{ $course->sub_description ?? '-' }}
        </p>
    </div>

</div>
