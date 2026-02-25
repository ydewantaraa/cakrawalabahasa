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
    <form action="{{ route('sub-course-service.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf

        {{-- Nama Sub Layanan --}}
        <div>
            <label class="block mb-1 font-medium">Nama Sub Layanan</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Sesi 1 - Pengenalan"
                class="w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">

            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <input type="hidden" name="course_service_id" value="{{ $service->id }}">

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
