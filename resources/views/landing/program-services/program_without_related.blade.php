<template x-for="section in sections" :key="section.title">
    <section>
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
