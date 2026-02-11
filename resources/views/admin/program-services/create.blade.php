<div class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">
    <form action="{{ route('program-services.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block mb-1 font-medium">Nama Program</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                placeholder="Contoh: CB For Kids"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" id="description" rows="4"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input type="hidden" name="show_in_dropdown" value="0">

        <div class="flex items-center gap-2">
            <input type="checkbox" name="show_in_dropdown" id="show_in_dropdown" value="1"
                {{ old('show_in_dropdown', 1) ? 'checked' : '' }}>
            <label for="show_in_dropdown" class="font-medium">
                Tampilkan di dropdown
            </label>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition">
                Batal
            </button>

            <button type="submit"
                class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 transition">Simpan</button>
        </div>
    </form>
</div>
