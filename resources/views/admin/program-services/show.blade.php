<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full">
    <h2 class="text-lg font-semibold mb-4">{{ $programService->name }}</h2>

    <div class="space-y-2">
        <p><strong>Nama:</strong> {{ $programService->name }}</p>
        <p><strong>Ditampilkan di dropdown:</strong> {{ $programService->show_in_dropdown ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Deskripsi:</strong> {{ $programService->description ?? '-' }}</p>
    </div>
</div>
