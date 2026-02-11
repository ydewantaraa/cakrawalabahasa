<div x-data="{
    form: {
        name: @js(old('name', $programService->name)),
        description: @js(old('description', $programService->description)),
        show_in_dropdown: @js(old('show_in_dropdown', $programService->show_in_dropdown))
    }
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">
    <h2 class="text-xl font-semibold mb-4">Edit Program Service</h2>

    <form action="{{ route('program-services.update', $programService) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Program</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: CB For Kids"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="4" x-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        {{-- Dropdown --}}
        <input type="hidden" name="show_in_dropdown" value="0">
        <div class="flex items-center gap-2">
            <input type="checkbox" name="show_in_dropdown" value="1" x-model="form.show_in_dropdown">
            <label>Tampilkan di dropdown</label>
        </div>

        <div class="flex justify-end gap-2">
            <button type="button" @click="$store.modal.close()"
                class="px-4 py-2 rounded border border-gray-300 hover:bg-gray-100 transition">
                Batal
            </button>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
                Update
            </button>
        </div>
    </form>
</div>
