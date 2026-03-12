<div class="bg-white rounded shadow-lg w-full max-w-2xl p-4 sm:p-6" x-data="{ unitType: '' }">

    <h2 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">Tambah Harga</h2>

    <form action="{{ route('prices.store') }}" method="POST" class="space-y-3 sm:space-y-4">
        @csrf

        {{-- Hidden Relation --}}
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <input type="hidden" name="course_service_id" value="{{ $service->id }}">

        {{-- Sub Course Service --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Sub Layanan</label>
            <select name="sub_course_service_id" class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                <option value="">Tanpa Sub Layanan</option>
                @foreach ($service->sub_course_services as $sub)
                    <option value="{{ $sub->id }}">
                        {{ $sub->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Harga</label>
            <input type="number" name="price" step="0.01"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base" required>
        </div>

        {{-- Learning Type --}}
        <div>
            <label class="block mb-2 font-medium text-sm sm:text-base">Learning Type</label>

            <div class="flex flex-wrap gap-3 sm:gap-4 text-sm sm:text-base">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="learning_type[]" value="online">
                    Online
                </label>

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="learning_type[]" value="offline">
                    Offline
                </label>

                <label class="flex items-center gap-2">
                    <input type="checkbox" name="learning_type[]" value="hybrid">
                    Hybrid
                </label>
            </div>
        </div>

        {{-- Unit Type --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Tipe Unit Harga</label>

            <select name="unit_type" x-model="unitType" class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                <option value="">-- Tidak menggunakan unit harga --</option>
                <option value="fixed">Harga Paket (per bulan / per 10 sesi / per paket)</option>
                <option value="per_item">Harga Per Item (per halaman / per orang / per unit)</option>
            </select>
        </div>

        {{-- Package Size --}}
        <div x-show="unitType === 'fixed'" x-cloak>
            <label class="block mb-1 font-medium text-sm sm:text-base">Label Paket (Opsional)</label>
            <input type="text" name="package_size" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                placeholder="contoh: per 10 sesi, per bulan (4 sesi 1 jam/sesi), dll">
        </div>

        {{-- Label Type --}}
        <div x-show="unitType === 'per_item'" x-cloak>
            <label class="block mb-1 font-medium text-sm sm:text-base">Label Tipe (Opsional)</label>
            <input type="text" name="label_type" class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                placeholder="contoh: per halaman, per orang, dll">
        </div>

        {{-- hasQuantity --}}
        <input type="hidden" name="hasQuantity" :value="unitType === 'per_item' ? 1 : 0">

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="submit"
                class="px-3 sm:px-4 py-2 bg-blue-600 text-white rounded text-sm sm:text-base hover:bg-blue-700">
                Simpan
            </button>
        </div>

    </form>
</div>
