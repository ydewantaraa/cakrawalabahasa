<div id="profile-edit" class="space-y-4 hidden">
    <form method="POST" action="{{ route('teacher-profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="flex flex-col items-start gap-4 pb-6 border-b">
            {{-- Avatar Preview --}}
            <img src="{{ $user->avatar }}" class="w-24 h-24 sm:w-28 sm:h-28 rounded-full object-cover border"
                alt="Avatar">

            {{-- Upload Avatar --}}
            <div class="w-full max-w-sm">
                <label class="block mb-2 font-semibold text-gray-700">
                    Ubah Avatar
                </label>

                <input type="file" name="avatar" accept="image/*"
                    class="block w-full text-sm text-gray-600
                   file:mr-3 file:py-2 file:px-4
                   file:rounded-md file:border-0
                   file:text-sm file:font-semibold
                   file:bg-navy_1 file:text-white
                   hover:file:bg-navy_2
                   focus:outline-none">
            </div>
        </div>
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
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $teacherProfile?->whatsapp) }}"
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
