@foreach ($programServices->where('slug', '!=', 'special-class') as $programService)
    <section
        class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el text-black py-10 px-0 opacity-100 translate-y-0">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
            <span class="text-yellow-400 text-base mr-3">★</span>
            <span class="text-base">
                {{ $programService->name }}
            </span>
        </h2>

        <div x-data="carousel()" x-init="init()" x-ref="wrapper" class="relative overflow-hidden pb-4">

            <div x-ref="inner" class="flex justify-center cursor-grab select-none px-4" @mousedown="startDrag"
                @touchstart="startDrag" @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag" @mousemove="drag"
                @touchmove="drag" :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`">

                @foreach ($programService->courses->where('isActive', true) as $course)
                    <div
                        class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-2 md:m-4 overflow-hidden min-w-[180px] sm:min-w-[210px] md:min-w-[180px] xl:min-w-[240px]">

                        <img src="{{ $course->thumbnail }}"
                            class="w-full object-cover h-[150px] sm:h-[180px] md:h-[200px] lg:h-[250px]" />

                        <div class="p-4 md:p-6 lg:p-8 text-center">
                            <h3
                                class="font-bold text-sm sm:text-sm md:text-sm lg:text-base xl:text-lg text-[#151d52] mb-5 md:mb-8">
                                {{ $course->name }}
                            </h3>

                            <a href="{{ route('courses.show', $course->slug) }}"
                                class="bg-gradient-to-r from-[#f6422e] to-orange-400 text-white px-3 sm:px-5 md:px-4 py-3 rounded-full font-semibold shadow-lg text-xs sm:text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endforeach
