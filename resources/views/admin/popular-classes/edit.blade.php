@php
    $descriptionsOld = old('descriptions', $popular->descriptions->pluck('description')->toArray());
@endphp

<div x-data="{
    descriptions: @js($descriptionsOld ?: [''])
}" class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-4 sm:p-6 space-y-4">

    <h2 class="text-lg sm:text-xl font-semibold mb-3">
        Edit Kelas Populer
    </h2>

    <form action="{{ route('popular-classes.update', $popular) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Dropdown Course --}}
        <div>
            <label class="block mb-1 font-medium text-sm">Pilih Kelas</label>
            <select name="course_id" class="w-full border rounded px-3 py-2 text-sm" x-init="$el.classList.add('select2')">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ old('course_id', $popular->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div>
            <label class="block mb-1 font-medium text-sm">Harga</label>
            <input type="text" name="price" value="{{ old('price', $popular->price) }}"
                class="w-full border rounded px-3 py-2 text-sm" placeholder="Contoh: Mulai dari +100k / Sesi">
        </div>

        {{-- Duration --}}
        <div>
            <label class="block mb-1 font-medium text-sm">Durasi</label>
            <input type="text" name="duration" value="{{ old('duration', $popular->duration) }}"
                class="w-full border rounded px-3 py-2 text-sm" placeholder="10 Sesi Per Paket">
        </div>

        {{-- Descriptions --}}
        <div>
            <label class="block mb-2 font-medium text-sm">Deskripsi</label>

            <template x-for="(desc, index) in descriptions" :key="index">
                <div class="flex gap-2 mb-2">
                    <input type="text" :name="'descriptions[' + index + ']'" x-model="descriptions[index]"
                        class="flex-1 border rounded px-3 py-2 text-sm" placeholder="Masukkan deskripsi">

                    <button type="button" @click="descriptions.splice(index, 1)"
                        class="bg-red-500 text-white px-3 py-1 rounded text-sm whitespace-nowrap">
                        -
                    </button>
                </div>
            </template>

            <div class="mt-1">
                <button type="button" @click="descriptions.push('')"
                    class="bg-gray-600 text-white px-2 py-1 rounded text-sm whitespace-nowrap">
                    + Tambah Deskripsi
                </button>
            </div>
        </div>

        {{-- Action --}}
        <div class="flex flex-wrap gap-2 justify-end pt-3">
            <button type="button" @click="$store.modal.close()"
                class="px-3 py-1 sm:px-4 sm:py-2 border rounded text-sm hover:bg-gray-100 whitespace-nowrap">
                Batal
            </button>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm whitespace-nowrap">
                Update
            </button>
        </div>
    </form>
</div>
