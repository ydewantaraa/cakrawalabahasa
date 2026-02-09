<div x-data class="bg-white p-4 md:p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">Program Services</h1>

        <button @click="$store.modal.show('Tambah Program', $refs.createForm.innerHTML)"
            class="bg-navy_1 text-white px-4 py-2 rounded">
            Tambah Program
        </button>

    </div>

    <table class="w-full border">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3">Dropdown</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programServices as $service)
                <tr class="border-t">
                    <td class="p-3">{{ $service->name }}</td>
                    <td class="p-3 text-center">
                        {{ $service->show_in_dropdown ? 'Ya' : 'Tidak' }}
                    </td>
                    <td class="p-3 flex gap-2 justify-center">

                        {{-- EDIT --}}
                        <button @click="$store.modal.show('Edit Program', $refs.edit{{ $service->id }}.innerHTML)"
                            class="bg-blue-600 text-white px-3 py-1 rounded">
                            Edit
                        </button>


                        {{-- DELETE --}}
                        <form action="{{ route('program-services.destroy', $service) }}" method="POST"
                            @submit.prevent="$store.alert.confirm({ title: 'Hapus Program?' }, ()=> $el.submit())">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- EDIT TEMPLATE --}}

                <template x-ref="edit{{ $service->id }}">
                    @include('admin.program-services.edit', ['programService' => $service])
                </template>
            @endforeach
        </tbody>
    </table>

    {{-- CREATE TEMPLATE --}}
    <template x-ref="createForm">
        @include('admin.program-services.create')
    </template>

</div>
