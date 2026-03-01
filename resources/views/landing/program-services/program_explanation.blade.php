<section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-12 lg:py-16 px-4 md:px-20">
    <div class="flex flex-col md:flex-row items-center justify-center gap-10">

        <!-- Gambar -->
        <div class="relative flex-shrink-0">
            <div
                class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-[200px] h-[200px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden border-4 border-[#151d52]">
                <img src="{{ $programService->image_service }}" alt="{{ $programService->name }}"
                    class="object-cover w-full h-full">
            </div>

            <!-- Lingkaran Orange Dekoratif -->
            <div class="absolute -top-5 -left-5 w-16 h-16 bg-[#f78a28] rounded-full z-10"></div>
        </div>

        <!-- Teks -->
        <div class="max-w-xl text-center md:text-left">
            <h2 class="text-xl md:text-2xl xl:text-3xl font-bold text-[#151d52] mb-4">
                Apa itu {{ $programService->name }}?
            </h2>
            <p class="text-[#151d52] text-xs md:text-base 2xl:text-lg leading-relaxed text-justify">
                {{ $programService->description }}
            </p>
        </div>

    </div>
</section>
