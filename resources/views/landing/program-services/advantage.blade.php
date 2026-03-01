<section
    class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 pb-24 md:pb-48 mb-10 bg-[#151d52] text-white relative overflow-hidden">

    <h2 class="text-3xl md:text-5xl font-bold text-center mb-16">
        Keunggulan <span class="text-[#f78a28]">{{ $programService->name }}</span>
    </h2>
    <div x-data="carouselKeunggulan()" x-init="cards = @js(
    $programService->advantage_program_services
        ->map(
            fn($item) => [
                'icon' => $item->icon,
                'image' => $item->thumbnail,
                'title' => $item->title,
                'desc' => $item->description,
            ],
        )
        ->values(),
);
    init();" class="relative">

        <div class="flex cursor-grab select-none" @mousedown="startDrag($event)" @touchstart="startDrag($event)"
            @mouseup="endDrag()" @mouseleave="endDrag()" @touchend="endDrag()" @mousemove="drag($event)"
            @touchmove="drag($event)" :style="`transform: translateX(-${position}px)`"
            style="transition: transform 0.1s linear;">

            <template x-for="card in loopedCards" :key="card.uniqueId">
                <div class="bg-[#f78a28] rounded-[30px] mx-2 sm:mx-3 
                                min-w-[200px] sm:min-w-[240px] md:min-w-[300px] 
                                p-3 sm:p-4 md:p-6 flex flex-col items-center text-center relative
                                hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300"
                    @mouseenter="pause()" @mouseleave="play()">

                    <div class="absolute -top-6 sm:-top-8 bg-[#151d52] rounded-full p-2 sm:p-3">
                        <img :src="card.icon" class="w-7 h-7 sm:w-10 sm:h-10">
                    </div>

                    <img :src="card.image"
                        class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 rounded-full object-cover mb-3 sm:mb-4 mt-6">

                    <h3 class="font-bold text-sm sm:text-base md:text-lg  text-[#151d52] mb-2 sm:mb-3"
                        x-text="card.title"></h3>

                    <p class="text-[11px] sm:text-sm md:text-base leading-relaxed text-white" x-text="card.desc">
                    </p>
                </div>
            </template>

        </div>
    </div>
    <!-- Lengkungan valley dengan garis biru tua -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

        <!-- Mobile -->
        <svg class="block md:hidden w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"
            preserveAspectRatio="none">
            <!-- Latar -->
            <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
            <!-- Garis lengkung -->
            <path d="M0,20 Q720,100 1440,20" fill="none" stroke-linecap="round" />
        </svg>

        <!-- md ke atas -->
        <svg class="hidden md:block w-full h-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"
            preserveAspectRatio="none">
            <!-- Latar -->
            <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
            <!-- Garis lengkung -->
            <path d="M0,20 Q720,140 1440,20" fill="none" stroke-linecap="round" />
        </svg>

    </div>
</section>
