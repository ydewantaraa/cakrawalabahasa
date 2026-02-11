<div x-data="{
    form: {
        name: @js(old('name', $course->name)),
        description: @js(old('description', $course->description)),
        sub_description_title: @js(old('sub_description_title', $course->sub_description_title)),
        sub_description: @js(old('sub_description', $course->sub_description)),
        category: @js(old('category', $course->category)),
        quota: @js(old('quota', $course->quota)),
        duration: @js(old('duration', $course->duration)),
        price: @js(old('price', $course->price)),
        learning_type: @js(old('learning_type', $course->learning_type)),
        program_service_id: @js(old('program_service_id', $course->program_service_id))
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

        {{-- Harga --}}
        <div>
            <label class="block mb-1 font-medium">Harga</label>
            <input type="number" name="price" step="0.01" x-model="form.price" placeholder="Contoh: 500000"
                class="w-full border rounded px-3 py-2">
        </div>

        {{-- Tipe Pembelajaran --}}
        <div>
            <label class="block mb-1 font-medium">Tipe Pembelajaran</label>
            <select name="learning_type" x-model="form.learning_type" class="w-full border rounded px-3 py-2">
                <option value="offline">Offline</option>
                <option value="hybrid">Hybrid</option>
                <option value="online">Online</option>
            </select>
        </div>

        {{-- Thumbnail --}}
        <div>
            <label class="block mb-1 font-medium">Thumbnail (opsional)</label>
            <input type="file" name="thumbnail" class="w-full border rounded px-3 py-2">
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
