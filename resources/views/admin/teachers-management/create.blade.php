<div class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">
    <form action="{{ route('admin.teachers.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="full_name" class="block mb-1 font-medium">Nama Guru</label>
            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                placeholder="Contoh: Budi Santoso"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('full_name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                placeholder="Contoh: budi@example.com"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="position" class="block mb-1 font-medium">Jabatan</label>
            <input type="text" name="position" id="position" value="{{ old('position') }}"
                placeholder="Contoh: Guru Matematika"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('position')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="whatsapp" class="block mb-1 font-medium">Nomor Whatsapp</label>
            <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}"
                placeholder="Contoh: 081234567890"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('whatsapp')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition">
                Batal
            </button>

            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
