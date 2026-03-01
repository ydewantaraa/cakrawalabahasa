<section
    class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el pb-10 px-4 md:px-8 xl:px-20 bg-[#f5f6fa]">
    <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#151d52]">
        Fitur Utama <span class="text-[#f78a28]">Kami</span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 xl:gap-12">

        @foreach ($programService->feature_program_services as $feature)
            <div
                class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="{{ $feature->thumbnail }}" alt="{{ $feature->title }}"
                    class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover aspect-square">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">
                        {{ $feature->title }}
                    </h3>
                    <p
                        class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        {{ $feature->description }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
</section>
