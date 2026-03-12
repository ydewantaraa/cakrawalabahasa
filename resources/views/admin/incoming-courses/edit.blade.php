<div x-data="{
    form: {
        description: @js(old('description', $incomingCourse->description)),
        sub_description: @js(old('sub_description', $incomingCourse->sub_description)),
    }
}" class="bg-white rounded shadow-lg w-full max-w-md sm:max-w-2xl z-50 p-4 sm:p-6">

    <h2 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4">
        Edit Incoming Course
    </h2>

    <form action="{{ route('incoming-courses.update', $incomingCourse) }}" method="POST" class="space-y-3 sm:space-y-4">
        @csrf
        @method('PUT')

        {{-- Dropdown Course --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Pilih Course (Belum Aktif)
            </label>

            <select name="course_id" class="w-full border rounded px-3 py-2 text-sm sm:text-base">

                <option value="">-- Pilih Course --</option>

                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ old('course_id', $incomingCourse->course_id) == $course->id ? 'selected' : '' }}>
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

        {{-- Incoming Date --}}
        <div>
            <label class="block mb-1 font-medium text-sm sm:text-base">
                Tanggal Incoming
            </label>

            <input type="date" name="incoming_date" min="{{ now()->format('Y-m-d') }}"
                value="{{ old('incoming_date', \Carbon\Carbon::parse($incomingCourse->incoming_date)->format('Y-m-d')) }}"
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

            <textarea name="description" rows="3" x-model="form.description"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>

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

            <textarea name="sub_description" rows="3" x-model="form.sub_description"
                class="w-full border rounded px-3 py-2 text-sm sm:text-base"></textarea>

            @error('sub_description')
                <p class="text-red-600 text-xs sm:text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-3 sm:pt-4">
            <button type="button" @click="$store.modal.close()"
                class="px-3 sm:px-4 py-2 border rounded hover:bg-gray-100 text-sm">
                Batal
            </button>

            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-3 sm:px-4 py-2 rounded text-sm">
                Update
            </button>
        </div>

    </form>
</div>
