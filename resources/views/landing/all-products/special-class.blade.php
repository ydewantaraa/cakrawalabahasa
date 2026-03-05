@php
    $specialClasses = $programServices->flatMap->relatedPrograms->unique('id');

    $specialCourses = $specialClasses->flatMap->courses;
@endphp

<section class="py-4 overflow-hidden">
    <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-6 flex items-center px-4 lg:px-20 xl:px-0">
        <span class="text-yellow-400 text-base mr-3">★</span>
        <span class="text-base">Special Class</span>
    </h2>

    <div class="carousel relative w-full overflow-hidden">
        <div class="carousel-track flex gap-4 px-4 w-max">

            {{-- DATA ASLI --}}
            @foreach ($specialCourses as $course)
                <div
                    class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] my-2 mx-0 md:mx-2 overflow-hidden w-[180px] sm:w-[200px] md:w-[240px] flex flex-col">

                    <img src="{{ $course->thumbnail }}"
                        class="w-full object-cover h-[200px] sm:h-[220px] md:h-[190px] lg:h-[250px]" />

                    <div class="p-4 text-center flex flex-col">
                        <h3 class="font-bold text-sm lg:text-base text-[#151d52] mb-5">
                            {{ $course->name }}
                        </h3>

                        <div class="mt-auto">
                            <a href="{{ route('courses.show', $course->slug) }}"
                                class="bg-gradient-to-r from-[#f6422e] to-orange-400 
                                text-white px-4 py-3 rounded-full 
                                font-semibold shadow-lg text-xs sm:text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>
