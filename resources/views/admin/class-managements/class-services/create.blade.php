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
    <form action="{{ route('course-service.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        {{-- Nama Kelas --}}
        <div>
            <label class="block mb-1 font-medium">Nama Layanan</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Kelas Coding Dasar"
                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2"
                @change="handleThumbnailChange">
            @error('thumbnail')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            {{-- Preview --}}
            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-32 h-32 object-cover border rounded">
            </div>
        </div>

        {{-- Description --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>
        <input type="hidden" name="course_id" value="{{ $course->id }}">

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
