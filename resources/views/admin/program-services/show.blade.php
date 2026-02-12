<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">{{ $programService->name }}</h2>

    <div class="space-y-2 mb-4">
        <p><strong>Nama:</strong> {{ $programService->name }}</p>
        <p><strong>Ditampilkan di dropdown:</strong> {{ $programService->show_in_dropdown ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Deskripsi:</strong> {{ $programService->description ?? '-' }}</p>
    </div>

    @if ($programService->feature_program_services->isNotEmpty())
        <h3 class="text-lg font-semibold mb-2">Fitur Program</h3>
        <div class="space-y-4">
            @foreach ($programService->feature_program_services as $feature)
                <div class="border rounded p-3 flex flex-col sm:flex-row gap-4 items-start">
                    {{-- Thumbnail --}}
                    @if ($feature->thumbnail)
                        <img src="{{ $feature->thumbnail }}" alt="{{ $feature->title }}"
                            class="w-32 h-32 object-cover rounded border">
                    @endif

                    <div class="flex-1 space-y-1">
                        <p><strong>Nama Fitur:</strong> {{ $feature->title }}</p>
                        <p><strong>Deskripsi Fitur:</strong> {{ $feature->description ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">Belum ada fitur untuk program ini.</p>
    @endif
</div>
