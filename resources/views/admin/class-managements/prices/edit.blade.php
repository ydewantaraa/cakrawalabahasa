<div x-data="{
    form: {
        price: @js(old('price', optional($price)->price ?? '')),
        sub_course_service_id: @js(old('sub_course_service_id', optional($price)->sub_course_service_id ?? '')),
        learning_type: @js(old('learning_type', optional($price)->learning_type ?? [])),
        unit_type: @js(old('unit_type', optional($price)->unit_type ?? '')),
        package_size: @js(old('package_size', optional($price)->package_size ?? '')),
        label_type: @js(old('label_type', optional($price)->label_type ?? ''))
    }
}" class="bg-white rounded shadow-lg w-full max-w-2xl p-4 sm:p-6">

    <form action="{{ $price ? route('prices.update', $price) : route('prices.store') }}" method="POST"
        class="space-y-3 sm:space-y-4">

        @csrf
        @if ($price)
            @method('PUT')
        @endif

        {{-- Hidden Relation --}}
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <input type="hidden" name="course_service_id" value="{{ $service->id }}">

        {{-- Sub Course Service --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Sub Layanan</label>
            <select name="sub_course_service_id" x-model="form.sub_course_service_id"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                <option value="">Tanpa Sub Layanan</option>
                @foreach ($service->sub_course_services as $sub)
                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Harga</label>
            <input type="number" name="price" step="0.01" x-model="form.price"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base" required>
        </div>

        {{-- Learning Type --}}
        <div>
            <label class="block mb-2 font-medium text-sm sm:text-base">Learning Type</label>

            <div class="flex flex-wrap gap-3 sm:gap-4 text-sm sm:text-base">
                @foreach (['online', 'offline', 'hybrid'] as $type)
                    <label class="flex items-center gap-2">
                        <input type="radio" name="learning_type[]" value="{{ $type }}"
                            :checked="form.learning_type.includes('{{ $type }}')"
                            @change="if($event.target.checked){ form.learning_type.push('{{ $type }}') } else { form.learning_type = form.learning_type.filter(i => i !== '{{ $type }}') }">
                        {{ ucfirst($type) }}
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Unit Type --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">Tipe Unit Harga</label>
            <select name="unit_type" x-model="form.unit_type"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">
                <option value="">-- Tidak menggunakan unit harga --</option>
                <option value="fixed">Fixed</option>
                <option value="per_item">Per Item</option>
            </select>
        </div>

        {{-- Package Size --}}
        <div x-show="form.unit_type === 'fixed'" x-cloak>
            <label class="block mb-1 font-medium text-sm sm:text-base">Label Paket</label>
            <input type="text" name="package_size" x-model="form.package_size"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                placeholder="contoh: per 10 sesi, per bulan (4 sesi 1 jam/sesi), dll">
        </div>

        {{-- Label Type --}}
        <div x-show="form.unit_type === 'per_item'" x-cloak>
            <label class="block mb-1 font-medium text-sm sm:text-base">Label Tipe</label>
            <input type="text" name="label_type" x-model="form.label_type"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"
                placeholder="contoh: per halaman, per orang, dll">
        </div>

        {{-- Hidden hasQuantity --}}
        <input type="hidden" name="hasQuantity" :value="form.unit_type === 'per_item' ? 1 : 0">

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
