<div id="profile-edit" class="space-y-4 hidden">
    <form method="POST" action="{{ route('student-profile.update') }}">
        @csrf
        @method('PATCH')

        <div>
            <label class="block font-semibold text-gray-700">Nama</label>
            <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Nomor WhatsApp</label>
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $studentProfile?->whatsapp) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Tanggal Lahir</label>
            <input type="date" name="birthday" value="{{ old('birthday', $studentProfile?->birthday) }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mt-4 text-right flex gap-2 justify-end">
            <button type="button" id="cancel-edit"
                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded shadow">
                Batalkan
            </button>

            <button type="submit" class="bg-navy_1 hover:bg-navy_2 text-white font-semibold py-2 px-4 rounded shadow">
                Simpan
            </button>
        </div>
    </form>
</div>
