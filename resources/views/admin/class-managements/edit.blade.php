<div x-data="{
    form: {
        name: @js(old('name', $course->name)),
        description: @js(old('description', $course->description)),
        explanation: @js(old('explanation', $course->explanation)),
        category: @js(old('category', $course->category)),
        price_note: @js(old('price_note', $course->price_note)),
        quota: @js(old('quota', $course->quota)),
        shopee_link: @js(old('shopee_link', $course->shopee_link)),
        duration: @js(old('duration', $course->duration)),
        isActive: Boolean(@js(old('isActive', $course->isActive))),
        hasTeacher: Boolean(@js(old('hasTeacher', $course->hasTeacher))),
        program_service_id: @js(old('program_service_id', $course->program_service_id)),
        facilities: @js(old('facilities', $course->course_facilities->pluck('name')->implode(', '))),
        thumbnailPreview: @js($course->thumbnail ? $course->thumbnail : null)
    },
    handleThumbnailChange(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => this.form.thumbnailPreview = e.target.result;
            reader.readAsDataURL(file);
        } else {
            this.form.thumbnailPreview = null;
        }
    }
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-4 sm:p-6">

    <h2 class="text-lg sm:text-xl font-semibold mb-4">Edit Kelas</h2>

    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data"
        class="space-y-3 sm:space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Nama Kelas</label>
            <input type="text" name="name" x-model="form.name"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <input type="hidden" name="isActive" value="0">
        <div class="flex items-center gap-2 text-sm sm:text-base">
            <input type="checkbox" name="isActive" value="1" x-model="form.isActive">
            <label>Kelas Sudah Launching</label>
        </div>

        <input type="hidden" name="hasTeacher" value="0">
        <div class="flex items-center gap-2 text-sm sm:text-base">
            <input type="checkbox" name="hasTeacher" value="1" x-model="form.hasTeacher">
            <label>Tampilkan Pilihan Guru</label>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Layanan Program</label>
            <select name="program_service_id" x-model="form.program_service_id"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                <option value="">— Pilih Program —</option>
                @foreach ($programServices as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Deskripsi</label>
            <textarea name="description" rows="3" x-model="form.description"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Link Shopee (Opsional)</label>
            <input type="url" name="shopee_link" x-model="form.shopee_link"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Fasilitas</label>
            <input type="text" name="facilities" x-model="form.facilities"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Kategori</label>
            <input type="text" name="category" x-model="form.category"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Harga</label>
            <input type="text" name="price_note" x-model="form.price_note"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
            <div>
                <label class="block mb-1 font-medium text-sm sm:text-base">Kuota</label>
                <input type="text" name="quota" x-model="form.quota"
                    class="w-full border rounded px-3 py-2 text-sm sm:text-base">
            </div>

            <div>
                <label class="block mb-1 font-medium text-sm sm:text-base">Durasi (jam)</label>
                <input type="text" name="duration" x-model="form.duration"
                    class="w-full border rounded px-3 py-2 text-sm sm:text-base">
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Keterangan (Opsional)</label>
            <textarea name="explanation" rows="3" x-model="form.explanation"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Thumbnail (opsional)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                @change="handleThumbnailChange">

            <div x-show="form.thumbnailPreview" class="mt-2">
                <img :src="form.thumbnailPreview" class="w-24 h-24 sm:w-32 sm:h-32 object-cover border rounded">
            </div>
        </div>

        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-3 sm:px-4 py-2 border rounded text-sm sm:text-base">
                Batal
            </button>

            <button type="submit" class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded text-sm sm:text-base">
                Update
            </button>
        </div>
    </form>
</div>
