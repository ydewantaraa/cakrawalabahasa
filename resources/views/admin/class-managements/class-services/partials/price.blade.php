{{-- ===== PRICE SECTION ===== --}}
<div class="space-y-3">

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
        <h4 class="font-medium text-gray-700">
            Harga
        </h4>

        <button @click="$store.modal.show('Tambah Harga', $refs.createPrice{{ $service->id }}.innerHTML)"
            class="text-sm bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded w-full sm:w-auto">
            + Tambah Harga
        </button>
    </div>
</div>
@foreach ($course->course_services as $service)
    <template x-ref="createPrice{{ $service->id }}">
        @include('admin.class-managements.prices.create', ['service' => $service])
    </template>
@endforeach
