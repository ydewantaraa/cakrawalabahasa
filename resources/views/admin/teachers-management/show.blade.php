<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row gap-6">
        {{-- Thumbnail / Foto teacher --}}
        <div class="w-full md:w-48 flex-shrink-0">
            <img src="{{ $teacher->avatar }}" alt="Foto Teacher" class="w-full h-32 md:h-40 object-cover rounded border">
        </div>

        {{-- Basic Info --}}
        <div class="flex-1 space-y-2">
            <h2 class="text-xl font-semibold font-semibold text-navy_2">
                {{ $teacher->full_name }}
            </h2>

            <p class="text-sm text-gray-600 font-semibold text-navy_2">
                {{ $teacher->email }}
            </p>

            <div x-data="{ show: false }" class="flex items-center gap-2 text-sm">
                <span>Password awal:</span>
                @if ($teacher->teacher_profile?->initial_password)
                    <span x-text="show ? '{{ $teacher->teacher_profile->initial_password }}' : '••••••••'"></span>
                    <button type="button" @click="show = !show" class="ml-2 text-gray-500 hover:text-gray-800">
                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.973 9.973 0 012.223-3.592M6.464 6.464A9.973 9.973 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.05 10.05 0 01-1.477 2.766M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                        </svg>
                    </button>
                @else
                    <span class="text-gray-500">-</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Detail Info --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
        <div>
            <p class="text-gray-500">Whatsapp</p>
            <p class="font-medium">{{ $teacher->teacher_profile?->whatsapp ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500">Jabatan</p>
            <p class="font-medium">{{ $teacher->teacher_profile?->position ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500">Role</p>
            <p class="font-medium">{{ $teacher->role }}</p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Dibuat</p>
            <p class="font-medium">{{ $teacher->created_at->format('d M Y') }}</p>
        </div>

        <div>
            <p class="text-gray-500">Tanggal Update Terakhir</p>
            <p class="font-medium">{{ $teacher->updated_at->format('d M Y') }}</p>
        </div>
    </div>

</div>
