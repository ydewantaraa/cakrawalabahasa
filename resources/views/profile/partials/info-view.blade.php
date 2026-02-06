<div id="profile-view" class="space-y-4">
    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Nama</span>
        <span class="text-gray-900">{{ $user->full_name }}</span>
    </div>

    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Email</span>
        <span class="text-gray-900">{{ $user->email }}</span>
    </div>

    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Nomor WhatsApp</span>
        <span class="text-gray-900">{{ $studentProfile?->whatsapp ?? '-' }}</span>
    </div>

    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Tanggal Lahir</span>
        <span class="text-gray-900">
            {{ $studentProfile?->birthday ? \Carbon\Carbon::parse($studentProfile->birthday)->format('d M Y') : '-' }}
        </span>
    </div>

    <div class="flex justify-between border-b pb-2">
        <span class="font-semibold text-gray-700">Email Verified</span>
        <span class="text-gray-900">
            {{ $user->hasVerifiedEmail() ? 'Sudah diverifikasi' : 'Belum diverifikasi' }}
        </span>
    </div>

    <div class="mt-6 text-right">
        <button id="edit-profile-btn"
            class="bg-navy_1 hover:bg-navy_2 text-white font-semibold py-2 px-4 rounded shadow">
            Edit Profile
        </button>
    </div>
</div>
