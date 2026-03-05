<!-- Form Tambah Incoming Course -->
<div class="space-y-4">
    <form action="{{ route('incoming-courses.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Dropdown Course -->
        <div>
            <label class="block mb-1 font-medium">Pilih Course</label>

            <select name="course_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Course --</option>

                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>

            @error('course_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Incoming Date -->
        <div>
            <label class="block mb-1 font-medium">Tanggal Incoming</label>

            <input type="date" name="incoming_date" value="{{ old('incoming_date') }}"
                class="w-full border rounded px-3 py-2">

            @error('incoming_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </form>
</div>
