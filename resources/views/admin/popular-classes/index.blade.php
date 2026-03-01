<div x-data="{ detailId: null }"
    class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
        <h1 class="text-xl sm:text-2xl font-semibold">
            Manajemen Kelas Populer
        </h1>

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
            <button @click="$store.modal.show('Tambah Kelas Populer', $refs.createForm.innerHTML)"
                class="bg-navy_1 hover:bg-navy_2 text-white px-4 py-2 rounded text-sm">
                + Tambah Kelas Populer
            </button>
        </div>
    </div>

    <!-- Table -->
    <div x-show="!detailId" class="overflow-x-auto" x-cloak>
        <table class="w-full border min-w-[600px] table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Kelas</th>
                    <th class="p-3 text-left">Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($popularClasses as $popular)
                    <tr class="border-t">
                        <td class="p-3">
                            {{ $popular->course->name }}
                        </td>

                        <td class="p-3">
                            {{ $popular->price }}
                        </td>

                        <td class="p-3 flex flex-wrap gap-2 justify-center">
                            <!-- Edit -->
                            <button @click="$store.modal.show('Edit Kelas', $refs.edit{{ $popular->id }}.innerHTML)"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('popular-classes.destroy', $popular) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Kelas?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Detail -->
                            <button @click="detailId = {{ $popular->id }}"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail
                            </button>
                        </td>
                    </tr>
                    <template x-ref="edit{{ $popular->id }}">
                        @include('admin.popular-classes.edit')
                    </template>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $popularClasses->links() }}
        </div>
    </div>
    <template x-ref="createForm">
        @include('admin.popular-classes.create')
    </template>
    <!-- Detail Section -->
    <div x-cloak>
        @foreach ($popularClasses as $popular)
            <div x-show="detailId === {{ $popular->id }}" class="space-y-4">
                @include('admin.popular-classes.show', ['popularClass' => $popular])

                <button @click="detailId = null" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>
</div>
