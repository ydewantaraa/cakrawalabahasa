<div x-data="{ detailId: null, serviceManagement: null, priceManagement: null }"
    class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h1 class="text-xl sm:text-2xl font-semibold break-words">Manajemen Kelas</h1>

        <div class="flex gap-2 flex-wrap">
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex gap-2">
                <input type="hidden" name="tab" value="{{ $tab }}"> <!-- tetap di tab courses -->
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..."
                    class="border rounded px-2 py-1 text-sm">
                <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-500">
                    Cari
                </button>
            </form>

            <!-- Tambah Button -->
            <button @click="$store.modal.show('Tambah Kelas', $refs.createForm.innerHTML)"
                class="bg-navy_1 hover:bg-navy_2 text-white px-4 py-2 rounded whitespace-nowrap text-sm sm:text-base">
                Tambah Kelas
            </button>
        </div>
    </div>
    <hr>

    <!-- Table Container -->
    <div x-show="!detailId && !serviceManagement && !priceManagement" class="overflow-x-auto" x-cloak>
        <table class="w-full border min-w-[500px] table-auto">
            <thead class="bg-gray-100 normal-case">
                <tr>
                    <th class="p-3 text-left normal-case">Nama</th>
                    <th class="p-3 text-left">Kategori</th>
                    <th class="p-3 text-left normal-case">Layanan Program</th>
                    <th class="p-3 text-left normal-case">Manajemen Layanan</th>
                    <th class="p-3 text-left normal-case">Manajemen Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $course->name }}</td>

                        <td class="p-3 break-words">
                            {{ $course->category }}
                        </td>

                        {{-- PROGRAM SERVICE --}}
                        <td class="p-3 break-words">
                            {{ $course->program_service?->name ?? '-' }}
                        </td>

                        {{-- TOMBOL LIHAT COURSE SERVICE --}}
                        <td class="p-3 break-words">
                            <button @click="serviceManagement = {{ $course->id }}"
                                class="bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail Layanan
                            </button>
                        </td>

                        {{-- TOMBOL LIHAT COURSE HARGA --}}
                        <td class="p-3 break-words">
                            <button @click="priceManagement = {{ $course->id }}"
                                class="bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail Harga
                            </button>
                        </td>

                        {{-- AKSI --}}
                        <td class="p-3 flex flex-wrap gap-2 justify-center">
                            <!-- Edit -->
                            <button @click="$store.modal.show('Edit Kelas', $refs.edit{{ $course->id }}.innerHTML)"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Kelas?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Detail -->
                            <button @click="detailId = {{ $course->id }}"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Template -->
                    <template x-ref="edit{{ $course->id }}">
                        @include('admin.class-managements.edit', ['course' => $course])
                    </template>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>

    <!-- Detail Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            <div x-show="detailId === {{ $course->id }}" class="space-y-4">
                @include('admin.class-managements.show', ['course' => $course])

                <button @click="detailId = null" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Detail Layanan Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            <div x-show="serviceManagement === {{ $course->id }}" class="space-y-4">
                @include('admin.class-managements.class-services.partials.course-service-management', [
                    'course' => $course,
                ])

                <button @click="serviceManagement = null"
                    class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Detail Harga Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            <div x-show="priceManagement === {{ $course->id }}" class="space-y-4">
                @include('admin.class-managements.class-services.partials.price-management', [
                    'course' => $course,
                ])

                <button @click="priceManagement = null"
                    class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Create Template -->
    <template x-ref="createForm">
        @include('admin.class-managements.create')
    </template>
</div>
