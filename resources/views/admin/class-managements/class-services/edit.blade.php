<div x-data="{
    form: {
        name: @js(old('name', $service->name)),
        description: @js(old('description', $service->description)),
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
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">

    <form action="{{ route('course-service.update', $service->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Layanan</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: Kelas Python Dasar"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi (Opsional)</label>
            <textarea name="description" rows="3" x-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        {{-- thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail (Opsional)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2"
                @change="handleThumbnailChange">

            {{-- Preview --}}
            <div x-show="thumbnailPreview" class="mt-2">
                <img :src="thumbnailPreview" class="w-32 h-32 object-cover border rounded">
            </div>
        </div>

        <input type="hidden" name="course_id" value="{{ $course->id }}">

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-4">
            <button type="button" @click="$store.modal.close()" class="px-4 py-2 border rounded hover:bg-gray-100">
                Batal
            </button>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
