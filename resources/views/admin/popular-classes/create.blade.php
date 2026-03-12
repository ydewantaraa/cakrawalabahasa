<!-- Form Tambah -->
<div class="space-y-4">

    <form action="{{ route('popular-classes.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Dropdown Course (Searchable) -->
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Pilih Kelas
            </label>

            <select name="course_id" class="w-full border rounded px-3 py-2 text-sm" x-init="$el.classList.add('select2')">

                <option value="">-- Pilih Kelas --</option>

                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach

            </select>
        </div>


        <!-- Price -->
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Harga
            </label>

            <input type="text" name="price" placeholder="Contoh: Mulai dari +100k / Sesi"
                class="w-full border rounded px-3 py-2 text-sm">
        </div>


        <!-- Durasi -->
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Durasi
            </label>

            <input type="text" name="duration" placeholder="10 Sesi Per Paket"
                class="w-full border rounded px-3 py-2 text-sm">
        </div>


        <!-- Descriptions -->
        <div x-data="{ descriptions: [''] }">

            <label class="block mb-2 font-medium text-sm sm:text-base">
                Deskripsi
            </label>

            <template x-for="(desc, index) in descriptions" :key="index">

                <div class="flex gap-2 mb-2 items-center">

                    <input type="text" :name="'descriptions[' + index + ']'"
                        class="flex-1 border rounded px-3 py-2 text-sm" placeholder="Masukkan deskripsi">

                    <button type="button" @click="descriptions.splice(index,1)"
                        class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded text-sm flex-shrink-0">
                        −
                    </button>

                </div>

            </template>

            <button type="button" @click="descriptions.push('')"
                class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1.5 rounded text-xs sm:text-sm">
                + Tambah Deskripsi
            </button>

        </div>


        <!-- Submit -->
        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded text-sm">
            Simpan
        </button>

    </form>

</div>
