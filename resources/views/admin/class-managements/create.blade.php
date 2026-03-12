<div class="space-y-3 sm:space-y-4" x-data="{
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
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3 sm:space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Nama Kelas</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
        </div>

        <input type="hidden" name="isActive" value="0">
        <div class="flex items-center gap-2 text-sm sm:text-base">
            <input type="checkbox" name="isActive" value="1">
            <label>Kelas Sudah Launching</label>
        </div>

        <input type="hidden" name="hasTeacher" value="0">
        <div class="flex items-center gap-2 text-sm sm:text-base">
            <input type="checkbox" name="hasTeacher" value="1">
            <label>Tampilkan Pilihan Guru</label>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Layanan Program</label>
            <select name="program_service_id"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
                <option value="">— Pilih Program —</option>
                @foreach ($programServices as $service)
                    <option value="{{ $service->id }}"
                        {{ old('program_service_id') == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Link Shopee (Opsional)</label>
            <input type="url" name="shopee_link" value="{{ old('shopee_link') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Fasilitas</label>
            <input type="text" name="facilities" value="{{ old('facilities') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Pisahkan setiap fasilitas dengan tanda koma (,)
            </p>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Kategori Usia</label>
            <input type="text" name="category" value="{{ old('category') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Harga</label>
            <input type="text" name="price_note" value="{{ old('price_note') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
            <div>
                <label class="block mb-1 font-medium text-sm sm:text-base">Kuota</label>
                <input type="text" name="quota" value="{{ old('quota') }}"
                    class="w-full border rounded px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm sm:text-base">Durasi</label>
                <input type="text" name="duration" value="{{ old('duration') }}"
                    class="w-full border rounded px-3 py-2 text-sm sm:text-base">
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Keterangan (Opsional)</label>
            <textarea name="explanation" rows="3" class="w-full border rounded px-3 py-2 text-sm sm:text-base">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                @change="handleThumbnailChange">

            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-24 h-24 sm:w-32 sm:h-32 object-cover border rounded">
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-3 sm:px-4 py-2 border rounded text-sm sm:text-base hover:bg-gray-100">
                Batal
            </button>

            <button type="submit"
                class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded text-sm sm:text-base hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
