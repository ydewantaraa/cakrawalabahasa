<div x-data="{ detailId: null }"
    class="bg-white p-3 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-3 sm:mb-4 gap-2">
        <h1 class="text-lg sm:text-2xl font-semibold break-words">Manajemen Siswa</h1>

        <div class="flex gap-2 flex-wrap">
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex gap-2">
                <input type="hidden" name="tab" value="{{ $tab }}">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..."
                    class="border rounded px-2 py-1 sm:py-2 text-xs sm:text-sm">
                <button type="submit"
                    class="bg-gray-600 text-white px-2 sm:px-3 py-1 sm:py-2 rounded text-xs sm:text-sm hover:bg-gray-500">
                    Cari
                </button>
            </form>
        </div>
    </div>

    <!-- Table Container -->
    <div x-show="!detailId" class="overflow-x-auto" x-cloak>
        <table class="w-full border min-w-[500px] table-auto text-xs sm:text-sm">
            <thead class="bg-gray-100 normal-case">
                <tr>
                    <th class="p-2 sm:p-3 text-left normal-case">Nama</th>
                    <th class="p-2 sm:p-3 text-left">Email</th>
                    <th class="p-2 sm:p-3 text-left normal-case">No Whatsapp</th>
                    <th class="p-2 sm:p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-t">
                        <td class="p-2 sm:p-3 break-words">{{ $student->full_name }}</td>
                        <td class="p-2 sm:p-3 break-words">
                            <div class="flex flex-col">
                                <span>{{ $student->email }}</span>

                                @if ($student->email_verified_at)
                                    <span class="text-[10px] sm:text-xs text-green-600 font-medium">
                                        ✔ Terverifikasi
                                    </span>
                                @else
                                    <span class="text-[10px] sm:text-xs text-red-600 font-medium">
                                        ✖ Belum Verifikasi
                                    </span>
                                @endif
                            </div>
                        </td>

                        <td class="p-2 sm:p-3 break-words">
                            {{ $student->student_profile?->whatsapp ?? '-' }}
                        </td>
                        <td class="p-2 sm:p-3 text-center">
                            <div class="flex flex-wrap justify-center gap-1 sm:gap-2">

                                <!-- Delete Button -->
                                <form action="{{ route('admin.students.destroy', $student) }}" method="POST"
                                    class="inline-flex"
                                    @submit.prevent="$store.alert.confirm({ title: 'Hapus Kelas?' }, ()=> $el.submit())">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-600 hover:bg-red-500 text-white px-3 h-8 rounded text-[11px] sm:text-sm flex items-center justify-center whitespace-nowrap">
                                        Hapus
                                    </button>
                                </form>

                                <!-- Detail Button -->
                                <button @click="detailId = {{ $student->id }}"
                                    class="bg-gray-600 hover:bg-gray-500 text-white px-3 h-8 rounded text-[11px] sm:text-sm flex items-center justify-center whitespace-nowrap">
                                    Detail
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-3 sm:mt-4">
            {{ $students->links() }}
        </div>
    </div>

    <!-- Detail Section -->
    <div x-cloak>
        @foreach ($students as $student)
            <div x-show="detailId === {{ $student->id }}" class="space-y-3 sm:space-y-4">
                @include('admin.students-management.show', ['student' => $student])

                <button @click="detailId = null"
                    class="bg-gray-500 hover:bg-gray-400 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded text-sm">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>
</div>
