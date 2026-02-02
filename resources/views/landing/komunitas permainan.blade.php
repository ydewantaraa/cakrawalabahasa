<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    <!-- Section Belajar Bareng Main Bareng -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el
            py-5 md:py-16 px-4 md:px-20 mt-10 md:mt-20">
        <div class="relative bg-[#f78a28] bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] rounded-[50px] shadow-[0_6px_12px_rgba(0,0,0,0.40)]
                overflow-visible
                w-full max-w-[1000px] mx-auto
                flex flex-col md:flex-row items-center justify-between
                px-6 md:px-10 lg:px-16">

            {{-- Hiasan pattern --}}
            <img
            src="/img/hiasan1.png"
            alt="Pattern"
            class="absolute right-0 bottom-2 h-[250px] sm:h-[260px] md:h-full w-auto z-0 md:top-0 md:bottom-0"
            />

            {{-- Teks kiri --}}
            <div class="md:w-1/2 text-[#151d52] p-6 text-center md:text-left z-10">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-4">
                    Belajar Bareng, <br> Main Bareng !
                </h1>
                <p class="italic text-white text-xs sm:text-sm lg:text-base md:text-justify">
                    Gabung dengan komunitas global Cakrawala Bahasa, ikuti games berhadiah,
                    challenge mingguan, dan forum diskusi antar pelajar dari berbagai negara.
                </p>
                <div class="mt-5">
                    <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-xs md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                        Coba Main
                    </a>
                </div>
            </div>

            {{-- Gambar tutor --}}
            <div
            class="md:w-1/2 flex justify-end relative z-10 mt-0 sm:-mt-10 md:-mt-3 lg:-mt-10">
            <img
                src="/img/peopleplay.png"
                alt="Tutor"
                class="w-[200px] sm:w-[300px] md:w-[500px] lg:w-[550px] xl:w-[650px] h-auto">
            </div>
        </div>
    </section>

    <!-- Section Leaderboard -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 pb-10 px-4 md:px-20 text-center">

        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#151d52] mb-16">Leaderboard</h2>

        <!-- Top 3 Leaderboard -->
        <div class="flex flex-col-2 md:flex-row justify-center items-center gap-2 lg:gap-16 mb-20">

            <!-- Rank 3 -->
            <div class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el relative flex flex-col items-center">
                <div class="relative z-10">
                    <img src="/img/Mask group1.png" alt="Nero" class="w-[150px] md:w-[180px] lg:w-[220px] h-auto rounded-full object-cover border-8 border-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    <span class="absolute top-[-20px] left-1/2 transform -translate-x-1/2 text-2xl font-bold text-red-500">
                        3 <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold text-sm md:text-2xl lg:text-3xl text-[#151d52]">Nero August</h3>
                    <p class="text-gray-500 text-xs md:text-base">@Augustinusrme</p>
                    <p class="text-[#151d52] text-sm md:text-lg mt-1"><i class="fas fa-heart text-red-500"></i> 380</p>
                </div>
            </div>

            <!-- Rank 1 -->
            <div class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el relative flex flex-col items-center">
                <div class="relative z-10">
                    <img src="/img/Mask group2.png" alt="Amy" class="w-[180px] md:w-[220px] lg:w-[260px] h-auto rounded-full object-cover border-8 border-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    <span class="absolute top-[-20px] left-1/2 transform -translate-x-1/2 text-2xl font-bold text-green-500">
                        1 <i class="fas fa-caret-up"></i>
                    </span>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold text-sm md:text-2xl lg:text-3xl text-[#151d52]">Amy Venesia</h3>
                    <p class="text-gray-500 text-xs md:text-base">@venesiabecky</p>
                    <p class="text-[#151d52] text-sm md:text-lg mt-1"><i class="fas fa-heart text-red-500"></i> 500</p>
                </div>
            </div>

            <!-- Rank 2 -->
            <div class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el relative flex flex-col items-center">
                <div class="relative z-10">
                    <img src="/img/Mask group3.png" alt="Lucas" class="w-[150px] md:w-[180px] lg:w-[220px] h-auto rounded-full object-cover border-8 border-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    <span class="absolute top-[-20px] left-1/2 transform -translate-x-1/2 text-2xl font-bold text-green-500">
                        2 <i class="fas fa-caret-up"></i>
                    </span>
                </div>
                <div class="mt-4">
                    <h3 class="font-bold text-sm md:text-2xl lg:text-3xl text-[#151d52]">Lucas Vee</h3>
                    <p class="text-gray-500 text-xs md:text-base">@Veelucassss</p>
                    <p class="text-[#151d52] text-sm md:text-lg mt-1"><i class="fas fa-heart text-red-500"></i> 400</p>
                </div>
            </div>

        </div>

        <!-- Rank 4-6 -->
        <div class="max-w-3xl mx-auto flex flex-col gap-8">

            <!-- Rank 4 -->
            <div class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 opacity-0 translate-y-5 ease-out fade-el flex items-center justify-between bg-white rounded-full px-6 py-4 lg:px-10 lg:py-6">
                <div class="flex items-center gap-4 lg:gap-8">
                    <span class="text-2xl lg:text-3xl font-bold text-red-500">4 <i class="fas fa-caret-down"></i></span>
                    <img src="/img/Mask group3.png" alt="Lucas" class="w-14 lg:w-20 h-14 lg:h-20 rounded-full object-cover border-4 border-[#f78a28]">
                    <div class="text-left">
                        <h3 class="font-bold text-[#151d52] text-lg lg:text-xl">Lucas Vee</h3>
                        <p class="text-gray-500 text-sm">@Veelucassss</p>
                    </div>
                </div>
                <p class="text-[#151d52] text-lg lg:text-xl"><i class="fas fa-heart text-red-500"></i> 300</p>
            </div>

            <!-- Rank 5 -->
            <div class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 opacity-0 translate-y-5 ease-out fade-el flex items-center justify-between bg-white rounded-full px-6 py-4 lg:px-10 lg:py-6">
                <div class="flex items-center gap-4 lg:gap-8">
                    <span class="text-2xl lg:text-3xl font-bold text-green-500">5 <i class="fas fa-caret-up"></i></span>
                    <img src="/img/Mask group2.png" alt="Lucas" class="w-14 lg:w-20 h-14 lg:h-20 rounded-full object-cover border-4 border-[#f78a28]">
                    <div class="text-left">
                        <h3 class="font-bold text-[#151d52] text-lg lg:text-xl">Lucas Vee</h3>
                        <p class="text-gray-500 text-sm">@Veelucassss</p>
                    </div>
                </div>
                <p class="text-[#151d52] text-lg lg:text-xl"><i class="fas fa-heart text-red-500"></i> 290</p>
            </div>

            <!-- Rank 6 -->
            <div class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 opacity-0 translate-y-5 ease-out fade-el flex items-center justify-between bg-white rounded-full px-6 py-4 lg:px-10 lg:py-6">
                <div class="flex items-center gap-4 lg:gap-8">
                    <span class="text-2xl lg:text-3xl font-bold text-red-500">6 <i class="fas fa-caret-down"></i></span>
                    <img src="/img/Mask group3.png" alt="Lucas" class="w-14 lg:w-20 h-14 lg:h-20 rounded-full object-cover border-4 border-[#f78a28]">
                    <div class="text-left">
                        <h3 class="font-bold text-[#151d52] text-lg lg:text-xl">Lucas Vee</h3>
                        <p class="text-gray-500 text-sm">@Veelucassss</p>
                    </div>
                </div>
                <p class="text-[#151d52] text-lg lg:text-xl"><i class="fas fa-heart text-red-500"></i> 275</p>
            </div>

        </div>

    </section>

    <!-- Section Forum Chat -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-10 pb-0 ps-4 bg-gradient-to-tr from-[#0b1a53] via-[#1e3a8a] to-[#3b82f6] relative overflow-hidden">

        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[350px] sm:h-[260px] md:h-full w-auto opacity-10 z-0 md:top-0">

        <div class="relative flex flex-col md:flex-row md:items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left md:pl-8 lg:pl-16 mb-10 md:mb-0">
                <h1 class="text-3xl sm:text-3xl md:text-4xl lg:text-5xl 2xl:text-6xl font-bold leading-tight mb-4 text-white">
                    Nikmati koneksi <br>tanpa batas<br>
                    <span class="text-[#f78a28]">Belajar bareng <br>teman baru <br>dari berbagai <br>negara</span>
                </h1>
            </div>

            <!-- Gambar HP Forum Chat -->
            <div class="flex justify-end items-end">
                <img src="/img/forum-chat.png" alt="Forum Chat" 
                    class="w-[250px] sm:w-[350px] md:w-[400px] lg:w-[450px] xl:w-[450px] object-contain">
            </div>

        </div>
    </section>

    <!-- Section Ajak Teman -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-10 py- pb-0 ps-4 bg-gradient-to-tr from-[#c2410c] via-[#f78a28] to-[#fdba74] relative overflow-hidden">

        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[220px] sm:h-[260px] md:h-full w-auto opacity-20 z-0 md:top-0">

        <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left md:pl-8 lg:pl-16 mb-10 md:mb-0">
                <h1 class="text-3xl sm:text-4xl text-white lg:text-5xl 2xl:text-6xl font-bold leading-tight mb-4">
                    Jangan main sendirian...
                </h1>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl 2xl:text-6xl font-bold leading-tight text-[#151d52] mb-8">
                    yuk, ajak teman lainnya biar seru
                </h2>

                <p class="text-white text-sm sm:text-base lg:text-lg 2xl:text-xl leading-relaxed mb-8 max-w-lg">
                    Gabung dengan komunitas global Cakrawala Bahasa, ikuti games berhadiah, challenge mingguan, dan forum diskusi antar pelajar dari berbagai negara.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-xs md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                        Main Game
                    </a>
                    <a href="#" class="border-2 border-[#151d52] text-[#151d52] px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500  hover:text-white hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                        Ikut Komunitas
                    </a>
                </div>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end md:pr-8 lg:pr-16">
                <img src="/img/ajakan-main.png" alt="Ajak Main" 
                    class="w-[300px] sm:w-[350px] md:w-[450px] lg:w-[500px] xl:-[550px] object-contain">
            </div>

        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WA -->
    <x-floating-wa />

    <script src="/js/animationsection.js"></script>
</body>
</html>