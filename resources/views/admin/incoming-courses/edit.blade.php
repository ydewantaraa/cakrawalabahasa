<div class="bg-white rounded shadow-lg w-full max-w-2xl z-50 p-6">

    <h2 class="text-xl font-semibold mb-4">
        Edit Incoming Course
    </h2>

    <form action="{{ route('incoming-courses.update', $incomingCourse) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Dropdown Course --}}
        <div>
            <label class="block mb-1 font-medium">Pilih Course (Belum Aktif)</label>

            <select name="course_id" class="w-full border rounded px-3 py-2">

                <option value="">-- Pilih Course --</option>

                @foreach ($courses as $course)
                    <option value="{{ $course->id }}"
                        {{ old('course_id', $incomingCourse->course_id) == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach

            </select>

            @error('course_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Incoming Date --}}
        <div>
            <label class="block mb-1 font-medium">Tanggal Incoming</label>

            <input type="date" name="incoming_date" min="{{ now()->format('Y-m-d') }}"
                value="{{ old('incoming_date', \Carbon\Carbon::parse($incomingCourse->incoming_date)->format('Y-m-d')) }}"
                class="w-full border rounded px-3 py-2">

            @error('incoming_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>


        {{-- Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Deskripsi</label>
            <textarea name="description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Sub Deskripsi --}}
        <div>
            <label class="block mb-1 font-medium">Sub Deskripsi</label>
            <textarea name="sub_description" rows="4" class="w-full border rounded px-3 py-2"></textarea>
            @error('sub_description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Action --}}
        <div class="flex justify-end gap-2 pt-4">
            <button type="button" @click="$store.modal.close()" class="px-4 py-2 border rounded hover:bg-gray-100">
                Batal
            </button>

            <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </div>
    </form>
</div>
