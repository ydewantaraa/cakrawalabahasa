{{-- <div class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6"> --}}
<div class="space-y-4">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Nama Kelas --}}
        <div>
            <label class="block mb-1 font-medium">Nama Kelas</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Program Service --}}
        <div>
            <label class="block mb-1 font-medium">Program Service</label>
            <select name="program_service_id" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
                <option value="">— Pilih Program —</option>
                @foreach ($programServices as $service)
                    <option value="{{ $service->id }}"
                        {{ old('program_service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
            @error('program_service_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        {{-- Sub Deskripsi --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Judul Sub Deskripsi</label>
                <input type="text" name="sub_description_title" value="{{ old('sub_description_title') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Isi Sub Deskripsi</label>
                <input type="text" name="sub_description" value="{{ old('sub_description') }}"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <input type="text" name="category" value="{{ old('category') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Kuota & Durasi --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Kuota</label>
                <input type="number" name="quota" value="{{ old('quota') }}"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Durasi (jam)</label>
                <input type="number" name="duration" value="{{ old('duration') }}"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Harga --}}
        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Tipe Pembelajaran --}}
        <div>
            <label class="block mb-1 font-medium">Tipe Pembelajaran</label>
            <select name="learning_type" class="w-full border rounded px-3 py-2">
                <option value="offline">Offline</option>
                <option value="hybrid">Hybrid</option>
                <option value="online">Online</option>
            </select>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2">
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-4">
            <button type="button" @click="$store.modal.close()" class="px-4 py-2 border rounded hover:bg-gray-100">
                Batal
            </button>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
