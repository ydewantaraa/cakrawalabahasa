<div x-data="{ detailId: null }"
    class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h1 class="text-xl sm:text-2xl font-semibold break-words">Manajemen Guru</h1>

        <div class="flex gap-2 flex-wrap">
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex gap-2">
                <input type="hidden" name="tab" value="{{ $tab }}">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..."
                    class="border rounded px-2 py-1 text-sm">
                <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-500">
                    Cari
                </button>
            </form>

            <!-- Tambah Button -->
            <button @click="$store.modal.show('Tambah Guru', $refs.createForm.innerHTML)"
                class="bg-navy_1 text-white px-4 py-2 rounded whitespace-nowrap text-sm sm:text-base">
                Tambah Guru
            </button>
        </div>
    </div>

    <!-- Table Container -->
    <div x-show="!detailId" class="overflow-x-auto" x-cloak>
        <table class="w-full border min-w-[500px] table-auto">
            <thead class="bg-gray-100 normal-case">
                <tr>
                    <th class="p-3 text-left normal-case">Nama</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Jabatan</th>
                    <th class="p-3 text-left normal-case">No Whatsapp</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $teacher->full_name }}</td>
                        <td class="p-3 break-words">
                            {{ $teacher->email }}
                        </td>
                        <td class="p-3 break-words">
                            {{ $teacher->teacher_profile?->position ?? '-' }}
                        </td>
                        <td class="p-3 break-words">
                            {{ $teacher->teacher_profile?->whatsapp ?? '-' }}
                        </td>
                        <td class="p-3 flex flex-wrap gap-2 justify-center">
                            <!-- Edit Button -->
                            <button
                                @click="$store.modal.show('Edit Data Guru {{ $teacher->full_name }}', $refs.edit{{ $teacher->id }}.innerHTML)"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Kelas?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Detail Button -->
                            <button @click="detailId = {{ $teacher->id }}"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Template -->
                    <template x-ref="edit{{ $teacher->id }}">
                        @include('admin.teachers-management.edit', ['teacher' => $teacher])
                    </template>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $teachers->links() }}
        </div>
    </div>

    <!-- Detail Section -->
    <div x-cloak>
        @foreach ($teachers as $teacher)
            <div x-show="detailId === {{ $teacher->id }}" class="space-y-4">
                @include('admin.teachers-management.show', ['teacher' => $teacher])

                <button @click="detailId = null" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Create Template -->
    <template x-ref="createForm">
        @include('admin.teachers-management.create')
    </template>
</div>
