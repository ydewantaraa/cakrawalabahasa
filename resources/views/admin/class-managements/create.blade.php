<div class="space-y-4" x-data="{
    thumbnailPreview: null,
    handleThumbnailChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.thumbnailPreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            this.thumbnailPreview = null;
        }
    }
}">
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

        {{-- Kelas Launched? --}}
        <input type="hidden" name="isActive" value="0">
        <div class="flex items-center gap-2">
            <input type="checkbox" name="isActive" value="1" x-model="form.isActive">
            <label>Kelas Sudah Launching</label>
        </div>

        {{-- Tampilkan Pilihan Guru? --}}
        <input type="hidden" name="hasTeacher" value="0">
        <div class="flex items-center gap-2">
            <input type="checkbox" name="hasTeacher" value="1" x-model="form.hasTeacher">
            <label>Tampilkan Pilihan Guru</label>
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

        {{-- Fasilitas (pisahkan dengan koma) --}}
        <div>
            <label class="block mb-1 font-medium">Fasilitas</label>
            <input type="text" name="facilities" value="{{ old('facilities') }}"
                placeholder="Contoh: Modul, Sertifikat, Snack, Rekaman Kelas" class="w-full border rounded px-3 py-2">
            <p class="text-sm text-gray-500 mt-1">
                Pisahkan setiap fasilitas dengan tanda koma (,)
            </p>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium">Kategori Usia</label>
            <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: 5-9 tahun"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- keterangan --}}
        <div>
            <label class="block mb-1 font-medium">Keterangan (Opsional)</label>
            <textarea name="explanation" rows="3" placeholder="Keterangan terkait layanan"
                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('explanation') }}</textarea>
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
                <input type="text" name="duration" value="{{ old('duration') }}" placeholder="Contoh: 90 menit/sesi"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>
        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2"
                @change="handleThumbnailChange">

            {{-- Preview --}}
            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-32 h-32 object-cover border rounded">
            </div>
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
