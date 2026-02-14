<div id="profile-view" class="space-y-6">

    {{-- AVATAR --}}
    <div class="flex items-center gap-4 pb-4 border-b">
        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('img/default-avatar.png') }}"
            alt="Avatar" class="w-20 h-20 rounded-full object-cover border shadow">

        <div>
            <p class="text-lg font-semibold text-gray-900">
                {{ $user->full_name }}
            </p>
            <p class="text-sm text-gray-600">
                {{ $user->email }}
            </p>
        </div>
    </div>

    {{-- NAMA --}}
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Nama</span>
        <span class="text-gray-900">{{ $user->full_name }}</span>
    </div>

    {{-- EMAIL --}}
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Email</span>
        <span class="text-gray-900">{{ $user->email }}</span>
    </div>

    {{-- WHATSAPP --}}
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Nomor WhatsApp</span>
        <span class="text-gray-900">{{ $studentProfile?->whatsapp ?? '-' }}</span>
    </div>

    {{-- TANGGAL LAHIR --}}
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Tanggal Lahir</span>
        <span class="text-gray-900">
            {{ $studentProfile?->birthday ? \Carbon\Carbon::parse($studentProfile->birthday)->format('d M Y') : '-' }}
        </span>
    </div>

    {{-- EMAIL VERIFIED --}}
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Email Verified</span>
        <span class="text-gray-900">
            {{ $user->hasVerifiedEmail() ? 'Sudah diverifikasi' : 'Belum diverifikasi' }}
        </span>
    </div>

    {{-- BUTTON --}}
    <div class="mt-6 text-right">
        <button id="edit-profile-btn"
            class="bg-navy_1 hover:bg-navy_2 text-white font-semibold py-2 px-4 rounded shadow">
            Edit Profile
        </button>
    </div>
</div>
