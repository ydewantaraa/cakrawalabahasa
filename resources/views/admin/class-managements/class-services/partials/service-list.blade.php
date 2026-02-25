{{-- ===== Service Header ===== --}}
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

    <div>
        <h3 class="font-semibold text-gray-800 text-base">
            {{ $service->name }}
        </h3>
        <p class="text-sm text-gray-500">
            {{ $service->description }}
        </p>
    </div>

    <div class="flex gap-2 w-full sm:w-auto">
        <button class="text-sm px-3 py-1 border rounded w-full sm:w-auto"
            @click="$store.modal.show('Edit Layanan', $refs.editService{{ $service->id }}.innerHTML)">
            Edit
        </button>
        <form action="{{ route('course-service.destroy', $service->id) }}" method="POST"
            @submit.prevent="$store.alert.confirm({ title: 'Hapus Layanan?' }, ()=> $el.submit())">
            @csrf
            @method('DELETE')
            <button class="text-sm px-3 py-1 border rounded text-red-600 w-full sm:w-auto">
                Delete
            </button>
        </form>
    </div>
</div>
<hr>
