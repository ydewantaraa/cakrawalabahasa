<section class="py-4 overflow-hidden">

    <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
        <span class="text-yellow-400 text-base mr-3">★</span>
        <span class="text-base">{{ $specialClass->name }}</span>
    </h2>

    <div class="carousel relative w-full px-4 pb-4">
        <div class="carousel-track flex justify-center gap-4 md:gap-8 w-max">

            @foreach ($specialCourses->concat($specialCourses) as $course)
                <div
                    class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] overflow-hidden w-[200px] sm:w-[220px] md:w-[240px] flex flex-col">

                    <img src="{{ $course->thumbnail }}" alt="{{ $course->name }}"
                        class="w-full object-cover h-[150px] sm:h-[180px] md:h-[200px] lg:h-[250px]" />

                    <div class="p-4 md:p-6 lg:p-8 text-center flex flex-col">

                        <h3 class="font-bold text-xs md:text-sm lg:text-base text-[#151d52] mb-5">
                            {{ $course->name }}
                        </h3>

                        <div class="mt-auto">
                            <a href="/layanan/{{ $course->slug }}"
                                class="bg-gradient-to-r from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 lg:py-3 xl:px-6 rounded-full font-semibold shadow-lg text-[10px] sm:text-xs lg:text-base">
                                Lihat Detail
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>

</section>
