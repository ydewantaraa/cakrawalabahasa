<div x-data="{ detailId: null }"
    class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 sm:mb-6 gap-3">

        <h1 class="text-lg sm:text-2xl font-semibold">
            Manajemen Incoming Course
        </h1>

        <div class="flex flex-col sm:flex-row gap-2 items-start sm:items-center">

            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex gap-2">
                <input type="hidden" name="tab" value="{{ $tab }}">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..."
                    class="border rounded px-2 py-1 text-xs sm:text-sm">
                <button type="submit"
                    class="bg-gray-600 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm hover:bg-gray-500">
                    Cari
                </button>
            </form>

            <button @click="$store.modal.show('Tambah Incoming Class', $refs.createForm.innerHTML)"
                class="bg-navy_1 hover:bg-navy_2 text-white px-3 py-2 rounded text-xs sm:text-sm whitespace-nowrap">
                + Tambah Incoming
            </button>

        </div>
    </div>


    <!-- Table -->
    <div x-show="!detailId" class="overflow-x-auto" x-cloak>

        <table class="w-full border min-w-[520px] text-xs sm:text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 sm:p-3 text-left">Course</th>
                    <th class="p-2 sm:p-3 text-left">Tanggal Incoming</th>
                    <th class="p-2 sm:p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($incomingCourses as $incoming)
                    <tr class="border-t">

                        <td class="p-2 sm:p-3">
                            {{ $incoming->course->name }}
                        </td>

                        <td class="p-2 sm:p-3">
                            {{ \Carbon\Carbon::parse($incoming->incoming_date)->format('d M Y') }}
                        </td>

                        <td class="p-2 sm:p-3 flex flex-wrap gap-1 sm:gap-2 justify-center">

                            <!-- Edit -->
                            <button
                                @click="$store.modal.show('Edit Incoming Course', $refs.edit{{ $incoming->id }}.innerHTML)"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('incoming-courses.destroy', $incoming) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Incoming Course?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-600 hover:bg-red-500 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Detail -->
                            <button @click="detailId = {{ $incoming->id }}"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-2 sm:px-3 py-1 rounded text-xs sm:text-sm">
                                Detail
                            </button>

                        </td>
                    </tr>

                    <!-- Edit Template -->
                    <template x-ref="edit{{ $incoming->id }}">
                        @include('admin.incoming-courses.edit', ['incomingCourse' => $incoming])
                    </template>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3 sm:mt-4">
            {{ $incomingCourses->links() }}
        </div>

    </div>


    <!-- Create Template -->
    <template x-ref="createForm">
        @include('admin.incoming-courses.create')
    </template>


    <!-- Detail Section -->
    <div x-cloak>

        @foreach ($incomingCourses as $incoming)
            <div x-show="detailId === {{ $incoming->id }}" class="space-y-3 sm:space-y-4">

                @include('admin.incoming-courses.show', ['incomingCourse' => $incoming])

                <button @click="detailId = null"
                    class="bg-gray-500 hover:bg-gray-400 text-white px-3 sm:px-4 py-2 rounded text-sm">
                    Kembali
                </button>

            </div>
        @endforeach

    </div>

</div>
