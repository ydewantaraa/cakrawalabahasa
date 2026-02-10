<div class="bg-white rounded shadow-lg w-full max-w-2xl p-6 space-y-4">

    <h2 class="text-xl font-semibold">Detail Program Service</h2>

    <div class="space-y-2">
        <div>
            <p class="text-sm text-gray-500">Nama Program</p>
            <p class="font-medium">{{ $programService->name }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Deskripsi</p>
            <p class="font-medium">
                {{ $programService->description ?: '-' }}
            </p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Ditampilkan di Dropdown</p>
            <p class="font-medium">
                {{ $programService->show_in_dropdown ? 'Ya' : 'Tidak' }}
            </p>
        </div>
    </div>

    <div class="flex justify-end pt-4">
        <button type="button" @click="$store.modal.close()"
            class="px-4 py-2 border rounded hover:bg-gray-100 transition">
            Tutup
        </button>
    </div>

</div>
