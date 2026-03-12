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
    <form action="{{ route('course-service.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-3 sm:space-y-4">
        @csrf

        {{-- Nama Layanan --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Nama Layanan</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kelas Coding Dasar"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                @change="handleThumbnailChange">
            @error('thumbnail')
                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
            @enderror

            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-24 h-24 sm:w-32 sm:h-32 object-cover border rounded">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 text-sm sm:text-base">{{ old('description') }}</textarea>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Kategori (Opsional)</label>
            <input type="text" name="category" value="{{ old('category') }}" placeholder="Contoh: Untuk Umum"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
            @error('category')
                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Fasilitas --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Fasilitas (Opsional)</label>
            <input type="text" name="facilities" value="{{ old('facilities') }}"
                placeholder="Contoh: Interpreter, Alat Pendukung, dll"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
            @error('facilities')
                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Durasi --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Durasi (Opsional)</label>
            <input type="text" name="duration" value="{{ old('duration') }}" placeholder="Contoh: 1 hari"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">
            @error('duration')
                <p class="text-red-600 text-xs sm:text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- course id --}}
        <input type="hidden" name="course_id" value="{{ $course->id }}">

        {{-- Action --}}
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
