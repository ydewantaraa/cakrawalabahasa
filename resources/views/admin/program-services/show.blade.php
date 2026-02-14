<div class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">{{ $programService->name }}</h2>

    {{-- Info Umum --}}
    <div class="space-y-2 mb-4">
        <p><strong>Nama:</strong> {{ $programService->name }}</p>
        <p><strong>Ditampilkan di dropdown:</strong> {{ $programService->show_in_dropdown ? 'Ya' : 'Tidak' }}</p>
        <p><strong>Deskripsi:</strong> {{ $programService->description ?? '-' }}</p>
        <p><strong>Hero Text:</strong> {{ $programService->hero_text ?? '-' }}</p>

        {{-- Hero Image --}}
        <p><strong>Hero Image:</strong></p>
        @if ($programService->hero_image)
            <img src="{{ $programService->hero_image }}" alt="Hero Image"
                class="w-64 h-32 object-cover rounded border mb-2">
        @else
            <span class="text-gray-500">Belum ada hero image.</span>
        @endif

        {{-- Image Service --}}
        <p><strong>Image Service:</strong></p>
        @if ($programService->image_service)
            <img src="{{ $programService->image_service }}" alt="Image Service"
                class="w-64 h-32 object-cover rounded border mb-2">
        @else
            <span class="text-gray-500">Belum ada image service.</span>
        @endif
    </div>

    {{-- Fitur Program --}}
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

    {{-- Advantage Program --}}
    @if ($programService->advantage_program_services->isNotEmpty())
        <h3 class="text-lg font-semibold mt-6 mb-2">Keunggulan Program</h3>
        <div class="space-y-4">
            @foreach ($programService->advantage_program_services as $advantage)
                <div class="border rounded p-3 flex flex-col sm:flex-row gap-4 items-start">
                    {{-- Thumbnail --}}
                    @if ($advantage->thumbnail)
                        <img src="{{ $advantage->thumbnail }}" alt="{{ $advantage->title }}"
                            class="w-32 h-32 object-cover rounded border">
                    @endif

                    <div class="flex-1 space-y-1">
                        <p><strong>Nama Keunggulan:</strong> {{ $advantage->title }}</p>
                        <p><strong>Deskripsi Keunggulan:</strong> {{ $advantage->description ?? '-' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 mt-4">Belum ada keunggulan untuk program ini.</p>
    @endif
</div>
