{{-- ===== SUB SERVICE SECTION ===== --}}
<div class="space-y-3">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
        <h4 class="font-medium text-gray-700">
            Sub Layanan
        </h4>

        <button class="text-sm bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded w-full sm:w-auto"
            @click="$store.modal.show('Tambah Sub Layanan {{ $service->name }}', $refs.createSubService{{ $service->id }}.innerHTML)">
            + Tambah Sub Layanan
        </button>
    </div>

    @forelse($service->sub_course_services as $sub)
        <div class="border rounded p-3 bg-white flex justify-between items-center text-sm">

            {{-- LEFT SECTION (Thumbnail + Info) --}}
            <div class="flex items-center gap-3">

                {{-- Thumbnail --}}
                @if ($sub->thumbnail)
                    <img src="{{ $sub->thumbnail }}" class="w-16 h-16 object-cover rounded border">
                @else
                    <div
                        class="w-16 h-16 flex items-center justify-center bg-gray-100 rounded border text-gray-400 text-xs">
                        No Image
                    </div>
                @endif

                {{-- Text --}}
                <div>
                    <p class="font-medium text-gray-800">
                        {{ $sub->name }}
                    </p>
                    <p class="text-gray-500">
                        {{ $sub->description }}
                    </p>
                </div>

            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex gap-2 w-full sm:w-auto">

                {{-- EDIT --}}
                <button class="text-sm px-3 py-1 border rounded w-full sm:w-auto"
                    @click="$store.modal.show('Edit Sub Layanan', $refs.editSubService{{ $sub->id }}.innerHTML)">
                    Edit
                </button>

                {{-- DELETE --}}
                <form action="{{ route('sub-course-service.destroy', $sub->id) }}" method="POST"
                    @submit.prevent="$store.alert.confirm({ title: 'Hapus Sub Layanan?' }, () => $el.submit())">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm px-3 py-1 border rounded text-red-600 w-full sm:w-auto">
                        Delete
                    </button>
                </form>

            </div>

        </div>

        {{-- EDIT MODAL TEMPLATE --}}
        <template x-ref="editSubService{{ $sub->id }}">
            {{-- include form edit di sini --}}
        </template>

    @empty
        <div class="text-sm text-gray-400">
            Belum ada sub layanan.
        </div>
    @endforelse

</div>

<hr>
<template x-ref="createSubService{{ $service->id }}">
    @include('admin.class-managements.sub-class-services.create', ['service' => $service])
</template>
