<!-- Section Layanan Kami -->
<section
    class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el md:mt-5 xl:mt-8 py-16 pb-10 px-4 lg:px-20 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-[#151d52] mb-5">Layanan Kami</h2>
    <div
        class="max-w-[95%] xl:max-w-[90%] 2xl:max-w-[80%] mx-auto flex flex-col md:flex-row overflow-hidden rounded-2xl shadow-lg">
        @foreach ($programServices as $programService)
            @if ($programService->show_in_dropdown == 1)
                <div class="group relative flex-1 flex flex-col bg-white">
                    <!-- Gambar dengan zoom on hover -->
                    <div class="relative overflow-hidden h-[220px] md:h-[260px]">
                        <img src="{{ $programService->image_service }}" alt="{{ $programService->name }}"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-transparent pointer-events-none">
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-2xl font-bold text-[#151d52] mb-4">
                            {{ $programService->name }}
                        </h3>
                        <div class="flex justify-center">
                            <a href="{{ route('program-services.show', $programService) }}"
                                class="mt-auto px-26 inline-block bg-gradient-to-r from-[#fd5243] to-[#f1877e] 
                        text-white font-semibold px-8 py-3 rounded-full shadow-lg
                        transition-transform duration-300 hover:-translate-y-1">
                                Cek Di sini!
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
