<div class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6" x-data="{
    form: {
        name: @js(old('name', $sub->name)),
        course_id: @js(old('course_service_id', $sub->course_service_id)),
    }
}">

    <form id="update-sub-{{ $sub->id }}" action="{{ route('sub-course-service.update', $sub->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div>
            <label class="block mb-1 font-medium">Nama Sub Layanan</label>
            <input type="text" name="name" x-model="form.name" placeholder="Contoh: Kelas Python Dasar"
                class="w-full border rounded px-3 py-2">
        </div>
        <input type="hidden" name="course_service_id" value="{{ $sub->course_service_id }}">
    </form>
    {{-- Action --}}
    <div class="flex justify-end gap-2 pt-4">
        {{-- Batal --}}
        <button type="button" @click="$store.modal.close()" class="px-4 py-2 border rounded hover:bg-gray-100">
            Batal
        </button>

        {{-- Update --}}
        <button type="submit" form="update-sub-{{ $sub->id }}"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update
        </button>

        {{-- Hapus --}}
        <form action="{{ route('sub-course-service.destroy', $sub->id) }}" method="POST"
            @submit.prevent="$store.alert.confirm({ title: 'Hapus Sub Layanan?' }, () => $el.submit())">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                Hapus
            </button>
        </form>
    </div>
</div>
