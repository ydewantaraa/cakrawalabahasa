<div x-data="{
    form: {
        name: @js(old('name', $course->name)),
        description: @js(old('description', $course->description)),
        sub_description_title: @js(old('sub_description_title', $course->sub_description_title)),
        sub_description: @js(old('sub_description', $course->sub_description)),
        category: @js(old('category', $course->category)),
        quota: @js(old('quota', $course->quota)),
        duration: @js(old('duration', $course->duration)),
        program_service_id: @js(old('program_service_id', $course->program_service_id)),
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
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">

    <h2 class="text-xl font-semibold mb-4">Edit Kelas</h2>

    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Kelas</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: Kelas Python Dasar"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Program Service --}}
        <div>
            <label class="block mb-1 font-medium">Program Service</label>
            <select name="program_service_id" x-model="form.program_service_id" class="w-full border rounded px-3 py-2">
                <option value="">— Pilih Program —</option>
                @foreach ($programServices as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="3" x-model="form.description" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        {{-- Sub Deskripsi --}}
        <h3 class="text-lg font-semibold mb-2">Sub Deskripsi (Opsional)</h3>
        <div class="border rounded p-4 space-y-4">
            <div>
                <label class="block mb-1 text-sm font-medium">Judul Sub Deskripsi</label>
                <input type="text" name="sub_description_title" x-model="form.sub_description_title"
                    placeholder="Masukan judul deskripsi" class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium">Isi Sub Deskripsi</label>
                <textarea name="sub_description" x-model="form.sub_description" rows="4" placeholder="Contoh: Pengenalan Python"
                    class="w-full border rounded px-3 py-2"></textarea>
            </div>
        </div>

        {{-- Kategori --}}
        <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <input type="text" name="category" x-model="form.category" placeholder="Contoh: Coding"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Kuota & Durasi --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1 font-medium">Kuota</label>
                <input type="number" name="quota" x-model="form.quota" placeholder="Contoh: 20"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">Durasi (jam)</label>
                <input type="number" name="duration" x-model="form.duration" placeholder="Contoh: 40"
                    class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Media Pembelajaran --}}
        <div x-data="{
            types: {
                offline: {{ $course->learning_types->where('type', 'offline')->first() ? 'true' : 'false' }},
                online: {{ $course->learning_types->where('type', 'online')->first() ? 'true' : 'false' }},
                hybrid: {{ $course->learning_types->where('type', 'hybrid')->first() ? 'true' : 'false' }},
            }
        }" class="space-y-4">

            <label class="block font-medium">Media Pembelajaran</label>

            {{-- OFFLINE --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.offline">
                    Offline
                </label>
                <div x-show="types.offline">
                    <input type="number" name="learning_types[offline][price]"
                        value="{{ old('learning_types.offline.price', optional($course->learning_types->where('type', 'offline')->first())->price) }}"
                        placeholder="Harga Offline" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            {{-- ONLINE --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.online">
                    Online
                </label>
                <div x-show="types.online">
                    <input type="number" name="learning_types[online][price]"
                        value="{{ old('learning_types.online.price', optional($course->learning_types->where('type', 'online')->first())->price) }}"
                        placeholder="Harga Online" class="w-full border rounded px-3 py-2">
                </div>
            </div>

            {{-- HYBRID --}}
            <div class="border rounded p-3 space-y-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" x-model="types.hybrid">
                    Hybrid
                </label>
                <div x-show="types.hybrid">
                    <input type="number" name="learning_types[hybrid][price]"
                        value="{{ old('learning_types.hybrid.price', optional($course->learning_types->where('type', 'hybrid')->first())->price) }}"
                        placeholder="Harga Hybrid" class="w-full border rounded px-3 py-2">
                </div>
            </div>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail (opsional)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2"
                @change="handleThumbnailChange">

            {{-- Preview --}}
            <div x-show="form.thumbnailPreview" class="mt-2">
                <img :src="form.thumbnailPreview" class="w-32 h-32 object-cover border rounded">
            </div>
        </div>

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
