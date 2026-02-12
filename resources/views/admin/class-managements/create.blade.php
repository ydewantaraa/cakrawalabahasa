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

        {{-- Media Pembelajaran --}}
        <div x-data="{
            types: {
                offline: {{ old('learning_types.offline.price') ? 'true' : 'false' }},
                online: {{ old('learning_types.online.price') ? 'true' : 'false' }},
                hybrid: {{ old('learning_types.hybrid.price') ? 'true' : 'false' }},
            }
        }" class="space-y-4">
            <label class="block font-medium">Media Pembelajaran</label>

            {{-- OFFLINE --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.offline">
                    Offline
                </label>

                <div x-show="types.offline" x-transition>
                    <input type="number" name="learning_types[offline][price]"
                        value="{{ old('learning_types.offline.price') }}" placeholder="Harga Offline"
                        class="w-full border rounded px-3 py-2">
                </div>
            </div>

            {{-- ONLINE --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.online">
                    Online
                </label>

                <div x-show="types.online" x-transition>
                    <input type="number" name="learning_types[online][price]"
                        value="{{ old('learning_types.online.price') }}" placeholder="Harga Online"
                        class="w-full border rounded px-3 py-2">
                </div>
            </div>

            {{-- HYBRID --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.hybrid">
                    Hybrid
                </label>

                <div x-show="types.hybrid" x-transition>
                    <input type="number" name="learning_types[hybrid][price]"
                        value="{{ old('learning_types.hybrid.price') }}" placeholder="Harga Hybrid"
                        class="w-full border rounded px-3 py-2">
                </div>
            </div>

            @error('learning_types')
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
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
