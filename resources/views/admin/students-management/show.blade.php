<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row gap-6">
        {{-- Thumbnail / Foto student --}}
        <div class="w-full md:w-48 flex-shrink-0">
            <img src="{{ $student->avatar }}" alt="Foto student" class="w-full h-32 md:h-40 object-cover rounded border">
        </div>

        {{-- Basic Info --}}
        <div class="flex-1 space-y-2">
            <h2 class="text-xl font-semibold font-semibold text-navy_2">
                {{ $student->full_name }}
            </h2>

            <p class="text-sm font-semibold text-navy_2">
                {{ $student->email }}
            </p>

            @if ($student->email_verified_at)
                <span class="text-xs text-green-600 font-medium">
                    ✔ Email Terverifikasi
                </span>
            @else
                <span class="text-xs text-red-600 font-medium">
                    ✖ Belum Terverifikasi
                </span>
            @endif
        </div>
    </div>

    {{-- Detail Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
        <div>
            <p class="text-gray-500">Whatsapp</p>
            <p class="font-medium">{{ $student->student_profile?->whatsapp ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500">Role</p>
            <p class="font-medium">{{ $student->role }}</p>
        </div>

        <div>
            <p class="text-gray-500">Kelas yang diikuti</p>
            <p class="font-medium">contoh: english (aktif/ tidak aktif)</p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Pendaftaran</p>
            <p class="font-medium">{{ $student->created_at->format('d M Y') }}</p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Update Terakhir</p>
            <p class="font-medium">{{ $student->updated_at->format('d M Y') }}</p>
        </div>
    </div>

</div>
