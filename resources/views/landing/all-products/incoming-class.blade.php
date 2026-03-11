{{-- INCOMING CLASS --}}
<section class="py-6 px-4 mt-12">

    <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-6 flex items-center px-0">
        <span class="text-yellow-400 mr-3">★</span>
        <span>Incoming Class</span>
    </h2>

    <!-- RESPONSIVE LAYOUT -->
    <div class="flex flex-col md:flex-row justify-center items-center">

        <!-- COUNTDOWN -->
        <div class="container-countdown flex md:justify-center">
            <div class="countdown">
                <div class="countdown-card">
                </div>
                <div class="calendar-image">
                    <span class="days-left text-3xl md:text-4xl font-bold" id="days"></span>
                    <p class="text-sm md:text-base">Days Left</p>
                </div>

                <div id="countdownTimer" class="mt-2 text-sm md:text-base font-semibold"></div>
            </div>
        </div>

        <!-- CAROUSEL -->
        <div class="course-carousel">
            <h2 id="carouselTitle" class="font-semibold text-base md:text-xl">
            </h2>
            <div class="carousel-incoming">
                @foreach ($incomingCourses as $incoming)
                    <div class="slide-course card-incoming h-[500px] md:h-[340px]"
                        data-title="{{ $incoming->course->name }}"
                        data-end-date="{{ \Carbon\Carbon::parse($incoming->incoming_date)->format('Y-m-d\TH:i:s') }}">

                        <!-- IMAGE -->
                        <img src="{{ $incoming->course->thumbnail }}" class="w-full md:w-[45%] h-full object-cover"
                            alt="Course Image">
                        <!-- CONTENT -->
                        <div class="course-info">
                            <h1 class="font-semibold">Siap?! Kuasai <span>Dunia</span> dengan <span>Bahasa</span>?!
                            </h1>
                            <p class="text-center">Gabung dan Jadilah Avatar Penguasa Bahasa!</p>
                            <a href="#"
                                class="shadow-xl bg-gradient-to-r from-[#f6422e] to-orange-400 hover:bg-gradient-to-l from-[#f6422e] to-orange-400">Join
                                Now!</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="carousel-nav">
                @foreach ($incomingCourses as $index => $course)
                    <span class="dot {{ $index == 0 ? 'active' : '' }}"></span>
                @endforeach
            </div>
        </div>
    </div>
</section>
