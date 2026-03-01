<template x-for="section in sections" :key="section.title">
    <section>
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
            <span class="text-yellow-400 text-base mr-3">★</span>
            <span class="text-base" x-text="section.title"></span>
        </h2>
        <div x-data="carousel(section.cards)" x-init="init()" x-ref="wrapper" class="relative overflow-hidden">
            <div x-ref="inner" class="flex cursor-grab select-none" @mousedown="startDrag" @touchstart="startDrag"
                @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag" @mousemove="drag" @touchmove="drag"
                :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`">
                <template x-for="card in cards" :key="card.id">
                    <div class="flex justify-center">
                        <div
                            class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden
                   min-w-[200px] sm:min-w-[240px] md:min-w-[260px] lg:min-w-[280px]
                   max-w-[280px] flex flex-col h-[350px] sm:h-[370px] md:h-[380px] lg:h-[380px]">

                            <!-- Container gambar -->
                            <div class="w-full h-[55%] overflow-hidden">
                                <img :src="card.img" :alt="card.title"
                                    class="w-full h-full object-cover object-center" />
                            </div>

                            <!-- Konten card -->
                            <div class="p-4 sm:p-6 lg:p-8 flex-1 flex flex-col justify-between text-center">
                                <h3 class="font-bold text-sm lg:text-base text-[#151d52] truncate" x-text="card.title">
                                </h3>
                                <a :href="`/layanan/${card.slug}`"
                                    class="hover:-translate-y-1 mt-4 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm lg:text-base">
                                    Lihat Detail
                                </a>
                            </div>

                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>

@foreach ($programService->relatedPrograms as $related)
    <section x-data="specialClassSwiper(@js(
    $related->courses->map(
        fn($course) => [
            'id' => $course->id,
            'slug' => $course->slug,
            'img' => $course->thumbnail,
            'title' => $course->name,
        ],
    ),
))" x-init="initSwiper()">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
            <span class="text-yellow-400 text-base mr-3">★</span>
            <span class="text-base">{{ $related->name }}</span>
        </h2>

        <div class="swiper specialClassSwiper px-2 md:px-4">
            <div class="swiper-wrapper">
                <template x-for="card in specialCards" :key="card.id">
                    <div class="swiper-slide">
                        <div
                            class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden
                   min-w-[200px] sm:min-w-[240px] md:min-w-[260px] lg:min-w-[280px]
                   max-w-[280px] flex flex-col h-[350px] sm:h-[370px] md:h-[380px] lg:h-[380px]">
                            <img :src="card.img" :alt="card.title"
                                class="w-full object-cover h-[150px] sm:h-[180px] md:h-[200px] lg:h-[250px]" />
                            <div class="p-4 md:p-6 lg:p-8 text-center">
                                <h3 class="font-bold text-xs md:text-sm lg:text-base text-[#151d52] mb-3 md:mb-5"
                                    x-text="card.title"></h3>
                                <a :href="`/layanan/${card.slug}`"
                                    class="hover:-translate-y-2 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 lg:py-3 xl:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-[10px] sm:text-xs lg:text-base">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
@endforeach
