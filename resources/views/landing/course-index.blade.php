    <!-- Section Layanan Kami -->
    <div x-data="carouselSection()"
        class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el mb-10 md:mb-16 space-y-16 mt-8 px-0 xl:px-20">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#f78a28]">
            Layanan <span class="text-[#151d52]">Kami</span>
        </h2>
        <template x-for="section in sections" :key="section.title">
            {{-- LANDING CONTENT KAMU YANG LAIN TETAP --}}

            <section x-data="{
                cards: @js($courses->map(fn($course) => ['id' => $course->id, 'title' => $course->name, 'img' => asset('storage/' . $course->thumbnail)]))
            }">
                <div x-data="carousel(cards)" x-init="init()" x-ref="wrapper" class="relative overflow-hidden">

                    <div x-ref="inner" class="flex cursor-grab select-none" @mousedown="startDrag"
                        @touchstart="startDrag" @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag"
                        @mousemove="drag" @touchmove="drag"
                        :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`">

                        <template x-for="card in cards" :key="card.id">
                            <div>
                                <div
                                    class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden min-w-[200px] sm:min-w-[240px] md:min-w-[210px] lg:min-w-[250px]">

                                    <img :src="card.img" :alt="card.title"
                                        class="w-full object-cover h-[200px] sm:h-[220px] md:h-[180px] lg:h-[250px]" />

                                    <div class="p-6 lg:p-8 text-center">
                                        <h3 class="font-bold text-sm lg:text-base text-[#151d52] mb-5 md:mb-8"
                                            x-text="card.title"></h3>

                                        <a :href="`/courses/${card.id}`"
                                            class="hover:-translate-y-2 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-3 sm:py-3 lg:py-3 xl:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm lg:text-base xl:text-base">
                                            Lihat Detail
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </template>

                    </div>

                </div>
            </section>

            {{-- LANDING CONTENT KAMU YANG LAIN TETAP --}}

        </template>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('coursesData', {
                cards: @json(
                    $courses->map(fn($course) => [
                            'id' => $course->id,
                            'title' => $course->name,
                            'img' => asset('storage/' . $course->thumbnail),
                        ]))
            });
        });
    </script>
