<div id="profile-view" class="space-y-4 md:space-y-6 px-3 md:px-0">

    {{-- AVATAR --}}
    <div class="flex flex-col sm:flex-row items-center gap-3 md:gap-4 pb-4 border-b">
        <img src="{{ $user->avatar }}" alt="Avatar"
            class="w-20 md:w-24 aspect-square rounded-full object-cover border shadow shrink-0">

        <div class="text-center sm:text-left">
            <p class="text-base md:text-lg font-semibold text-gray-900">
                {{ $user->full_name }}
            </p>
            <p class="text-sm text-gray-600 break-all">
                {{ $user->email }}
            </p>
        </div>
    </div>

    {{-- NAMA --}}
    <div class="flex flex-col sm:flex-row sm:justify-between border-b pb-2 gap-1">
        <span class="font-semibold text-gray-700">Nama</span>
        <span class="text-gray-900 break-all">
            {{ $user->full_name }}
        </span>
    </div>

    {{-- EMAIL --}}
    <div class="flex flex-col sm:flex-row sm:justify-between border-b pb-2 gap-1">
        <span class="font-semibold text-gray-700">Email</span>
        <span class="text-gray-900 break-all">
            {{ $user->email }}
        </span>
    </div>

    {{-- WHATSAPP --}}
    <div class="flex flex-col sm:flex-row sm:justify-between border-b pb-2 gap-1">
        <span class="font-semibold text-gray-700">Nomor WhatsApp</span>
        <span class="text-gray-900 break-all">
            {{ $teacherProfile?->whatsapp ?? '-' }}
        </span>
    </div>

    {{-- JABATAN --}}
    <div class="flex flex-col sm:flex-row sm:justify-between border-b pb-2 gap-1">
        <span class="font-semibold text-gray-700">Jabatan</span>
        <span class="text-gray-900 break-all">
            {{ $teacherProfile?->position ?? '-' }}
        </span>
    </div>

    {{-- EMAIL VERIFIED --}}
    <div class="flex flex-col sm:flex-row sm:justify-between border-b pb-2 gap-1">
        <span class="font-semibold text-gray-700">Email Verified</span>
        <span class="text-gray-900">
            {{ $user->hasVerifiedEmail() ? 'Sudah diverifikasi' : 'Belum diverifikasi' }}
        </span>
    </div>

    {{-- BUTTON AREA --}}
    <div class="mt-6 flex flex-col-reverse sm:flex-row sm:justify-between gap-3">

        {{-- Kembali --}}
        <a href="/dashboard"
            class="w-full sm:w-auto text-center bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm md:text-base font-medium py-2 px-4 rounded">
            Kembali ke Dashboard
        </a>

        {{-- Edit Profile --}}
        <button id="edit-profile-btn"
            class="w-full sm:w-auto bg-navy_1 hover:bg-navy_2 text-white text-sm md:text-base font-semibold py-2 px-4 rounded shadow">
            Edit Profile
        </button>

    </div>

</div>
