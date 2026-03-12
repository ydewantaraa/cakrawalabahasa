<!-- Form Tambah Incoming Course -->
<div class="space-y-3 sm:space-y-4">

    <form action="{{ route('incoming-courses.store') }}" method="POST" class="space-y-3 sm:space-y-4">
        @csrf

        <!-- Dropdown Course -->
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Pilih Course
            </label>

            <select name="course_id" class="w-full border rounded px-3 py-2 text-sm sm:text-base">

                <option value="">-- Pilih Course --</option>

                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach

            </select>

            @error('course_id')
                <p class="text-red-500 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <!-- Incoming Date -->
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Tanggal Incoming
            </label>

            <input type="date" name="incoming_date" value="{{ old('incoming_date') }}"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base">

            @error('incoming_date')
                <p class="text-red-500 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Deskripsi
            </label>

            <textarea name="description" rows="3" class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>

            @error('description')
                <p class="text-red-600 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>


        {{-- Sub Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Sub Deskripsi
            </label>

            <textarea name="sub_description" rows="3" class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>

            @error('sub_description')
                <p class="text-red-600 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>


        <!-- Submit -->
        <div class="pt-2">
            <button type="submit"
                class="bg-green-600 hover:bg-green-500 text-white px-3 sm:px-4 py-2 rounded text-sm sm:text-base">
                Simpan
            </button>
        </div>

    </form>
</div>
