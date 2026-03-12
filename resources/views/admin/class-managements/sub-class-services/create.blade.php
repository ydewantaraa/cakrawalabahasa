<div class="mx-auto w-full max-w-md p-4 sm:p-6 space-y-3 sm:space-y-4">

    <form action="{{ route('sub-course-service.store') }}" method="POST" enctype="multipart/form-data"
        class="space-y-3 sm:space-y-4">

        @csrf

        {{-- Nama Sub Layanan --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Nama Sub Layanan
            </label>

            <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Sesi 1 - Pengenalan"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base focus:ring-2 focus:ring-blue-500">

            @error('name')
                <p class="text-red-600 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <input type="hidden" name="course_service_id" value="{{ $service->id }}">

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
