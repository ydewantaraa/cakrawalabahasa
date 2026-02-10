<div x-data class="bg-white p-4 md:p-6 rounded shadow">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h1 class="text-xl sm:text-2xl font-semibold break-words">Program Services</h1>
        <button @click="$store.modal.show('Tambah Program', $refs.createForm.innerHTML)"
            class="bg-navy_1 text-white px-4 py-2 rounded whitespace-nowrap text-sm sm:text-base">
            Tambah Program
        </button>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto">
        <table class="w-full border min-w-[500px] table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nama</th>
                    <th class="p-3 text-center">Dropdown</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programServices as $service)
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $service->name }}</td>
                        <td class="p-3 text-center">{{ $service->show_in_dropdown ? 'Ya' : 'Tidak' }}</td>
                        <td class="p-3 flex flex-wrap gap-2 justify-center">
                            <!-- Edit -->
                            <button @click="$store.modal.show('Edit Program', $refs.edit{{ $service->id }}.innerHTML)"
                                class="bg-blue-600 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('program-services.destroy', $service) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Program?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Show -->
                            <button
                                @click="$store.modal.show('Detail Program', $refs.show{{ $service->id }}.innerHTML)"
                                class="bg-gray-600 text-white px-3 py-1 rounded whitespace-nowrap text-xs sm:text-sm">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Template -->
                    <template x-ref="edit{{ $service->id }}">
                        @include('admin.program-services.edit', ['programService' => $service])
                    </template>

                    <!-- Show Template -->
                    <template x-ref="show{{ $service->id }}">
                        @include('admin.program-services.show', ['programService' => $service])
                    </template>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Create Template -->
    <template x-ref="createForm">
        @include('admin.program-services.create')
    </template>
</div>
