<div class="space-y-4">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Nama Kelas --}}
        <div>
            <label class="block mb-1 font-medium">Nama Kelas</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kelas Coding Dasar"
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
            <textarea name="description" rows="3" placeholder="Contoh: Deskripsi singkat kelas"
                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        {{-- Sub Deskripsi --}}
        <h3 class="text-lg font-semibold mb-2">Sub Deskripsi (Opsional)</h3>
        <div class="border rounded p-4 space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Judul Sub Deskripsi</label>
                <input type="text" name="sub_description_title" value="{{ old('sub_description_title') }}"
                    placeholder="Contoh: Materi Tambahan" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Isi Sub Deskripsi</label>
                <textarea name="sub_description" rows="4" placeholder="Contoh: Penjelasan detail materi"
                    class="w-full border rounded px-3 py-2">{{ old('sub_description') }}</textarea>
            </div>
        </div>



        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium">Kategori Usia</label>
            <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: 5-9 tahun"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Kuota & Durasi --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Kuota</label>
                <input type="number" name="quota" value="{{ old('quota') }}" placeholder="Contoh: 20"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Durasi</label>
                <input type="number" name="duration" value="{{ old('duration') }}" placeholder="Contoh: 90 menit/sesi"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Harga --}}
        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}"
                placeholder="Contoh: 150000" class="w-full border rounded px-3 py-2">
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
