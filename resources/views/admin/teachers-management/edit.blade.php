<div x-data="{
    form: {
        position: @js(old('name', $teacher->position))
    }
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">
    <form action="{{ route('admin.teachers.update', $teacher) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Jabatan --}}
        <div>
            <label class="block mb-1 font-medium">Jabatan</label>
            <input type="text" name="position" x-model="form.position" placeholder="Masukkan jabatan guru"
                class="w-full border rounded px-3 py-2">
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
