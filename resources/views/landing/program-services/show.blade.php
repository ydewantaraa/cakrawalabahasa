<!DOCTYPE html>
<html lang="id">

<head>
    <x-head />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* CSS Khusus Swiper */
        .swiper {
            width: 100%;
            /* Penting: Hidden mencegah layar melebar keluar */
            overflow: hidden !important;
            padding: 10px 0 20px 0;
        }

        .swiper-slide {
            width: auto;
            height: auto;
        }

        .swiper-slide>div {
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="/css/auto-swipe.css">
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />
    <!-- Section CB For Kids -->
    <section
        class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 md:ps-4 pb-0 md:pr-0 2xl:ps-20 
           bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">

        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern"
            class="absolute right-0 bottom-0 h-[330px] md:h-[430px] xl:h-[530px] 2xl:h-[630px] w-auto z-0 md:bottom-0">

        <div
            class="relative flex flex-col md:flex-row items-start md:items-center justify-center md:justify-between z-10">

            <!-- Teks Kiri -->
            <div
                class="md:w-2/5 text-left pl-7 pr-6 sm:pr-0 md:pl-8 lg:pl-16 mb-10 md:mb-0 md:-mt-16 xl:-mt-20 2xl:-mt-24">
                <p class="text-[#151d52] font-semibold text-xl md:text-3xl mb-3">
                    {{ $programService->name }}
                </p>

                @if ($programService->subhero_text)
                    {{-- Jika ada subhero_text --}}
                    <h1
                        class="text-3xl text-[#151d52] sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                        {{ $programService->hero_text }}
                    </h1>

                    <h1
                        class="text-xl text-white sm:text-2xl md:text-2xl xl:text-2xl 2xl:text-3xl font-bold leading-tight mb-6">
                        {{ $programService->subhero_text }}
                    </h1>
                @else
                    {{-- Jika tidak ada subhero_text --}}
                    <h1
                        class="text-3xl text-white sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                        {{ $programService->hero_text }}
                    </h1>
                @endif
                <a href="#"
                    class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Cek Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end pb-10 md:pb-16 mt-4 md:mt-8">
                <img src="{{ $programService->hero_image }}"
                    class="w-[350px] sm:w-[280px] md:w-[450px] lg:w-[550px] 2xl:w-[750px] object-contain">
            </div>

        </div>

        <!-- Lengkungan valley -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

            <!-- Mobile -->
            <svg class="block md:hidden w-full h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <path d="M0,20 Q720,100 1440,20" fill="none" stroke="#0b1a53" stroke-width="30"
                    stroke-linecap="round" />
            </svg>

            <!-- md ke atas -->
            <svg class="hidden md:block w-full h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"
                preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <path d="M0,20 Q720,140 1440,20" fill="none" stroke="#0b1a53" stroke-width="30"
                    stroke-linecap="round" />
            </svg>

        </div>
    </section>

    <!-- Section Keterangan Program Service -->
    @include('landing.program-services.program_explanation')

    <div x-init="sections = [{
        title: '{{ $programService->name }}',
        cards: @js(
    $courses
        ->where('isActive', true)
        ->map(
            fn($course) => [
                'id' => $course->id,
                'slug' => $course->slug,
                'title' => $course->name,
                'img' => $course->thumbnail,
            ],
        )
        ->values(),
)
    }];"
        class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el mb-10 md:mb-16 space-y-16 mt-8 px-0 xl:px-20">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#f78a28]">
            Layanan <span class="text-[#151d52]">Kami</span>
        </h2>
        @if ($programService->relatedPrograms->isNotEmpty())
            @include('landing.program-services.program_with_related')
        @else
            @include('landing.program-services.program_without_related')
        @endif
    </div>
    <!-- Section Fitur Utama Kami -->
    @include('landing.program-services.feature')
    <!-- Section Keunggulan Program Service -->
    @include('landing.program-services.advantage')
    <script src="/js/animationsection.js"></script>
    <script src="/js/programs.js"></script>
    <script src="/js/auto-swipe.js"></script>
    <x-footer />
    <x-floating-wa />
</body>

</html>
