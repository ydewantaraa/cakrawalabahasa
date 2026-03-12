<div x-data="{
    form: {
        name: @js(old('name', $service->name)),
        description: @js(old('description', $service->description)),
        category: @js(old('category', $service->category)),
        duration: @js(old('duration', $service->duration)),
        facilities: @js(old('facilities', $service->facilities)),
        course_id: @js(old('course_id', $service->course_id)),
    },
    thumbnailPreview: @js($service->thumbnail ?? null),
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
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-4 sm:p-6">

    <form action="{{ route('course-service.update', $service->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-3 sm:space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Nama Layanan</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: Kelas Python Dasar"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Deskripsi (Opsional)</label>
            <textarea name="description" rows="3" x-model="form.description"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Kategori</label>
            <input type="text" name="category" x-model="form.category" placeholder="Contoh: Untuk umum"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Durasi --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Durasi</label>
            <input type="text" name="duration" x-model="form.duration" placeholder="Contoh: 1 hari"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Fasilitas --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Fasilitas</label>
            <input type="text" name="facilities" x-model="form.facilities"
                placeholder="Contoh: Interpreter, Alat Pendukung, dll"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                @change="handleThumbnailChange">

            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-24 h-24 sm:w-32 sm:h-32 object-cover border rounded">
            </div>
        </div>

        <input type="hidden" name="course_id" value="{{ $course->id }}">

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-3 sm:px-4 py-2 border rounded text-sm sm:text-base hover:bg-gray-100">
                Batal
            </button>

            <button type="submit"
                class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded text-sm sm:text-base hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
