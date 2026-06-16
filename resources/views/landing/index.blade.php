<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <link rel="stylesheet" href="/css/auto-swipe.css">
    <style>
        /* Sembunyikan scrollbar di semua browser */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Menyembunyikan scrollbar tapi tetap bisa discroll */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-scroll {
            animation: scroll 60s linear infinite;
        }
        .pause-animation {
            animation-play-state: paused !important;
        }

        .slide-container {
            max-width: 1120px;
            width: 100%;
            padding: 40px 0;
        }
        .slide-content {
            margin: 0 40px;
            overflow: hidden;
            border-radius: 25px;
        }
        .card {
            border-radius: 25px;
            background-color: #FFF;
        }
        .image-content,
        .card-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px 14px;
        }
        .image-content {
            position: relative;
            row-gap: 5px;
            padding: 25px 0;
        }
        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #4070F4;
            border-radius: 25px 25px 0 25px;
        }
        .overlay::before,
        .overlay::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -40px;
            height: 40px;
            width: 40px;
            background-color: #4070F4;
        }
        .overlay::after {
            border-radius: 0 25px 0 0;
            background-color: #FFF;
        }
        .card-image {
            position: relative;
            height: 150px;
            width: 150px;
            border-radius: 50%;
            background: #FFF;
            padding: 3px;
        }
        .card-image .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #4070F4;
        }
        .name {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }
        .description {
            font-size: 14px;
            color: #707070;
            text-align: center;
        }
        .button {
            border: none;
            font-size: 16px;
            color: #FFF;
            padding: 8px 16px;
            background-color: #4070F4;
            border-radius: 6px;
            margin: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .button:hover {
            background: #265DF2;
        }

        /* ðŸŸ¢ Custom Nav Button Styling */
        .swiper-navBtn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            z-index: 10;
        }
        .swiper-navBtn:hover {
            color: #4070F4;
        }

        /* ðŸ”´ Sembunyikan icon default Swiper arrow */
        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        /* âœ… Styling untuk gambar panah kustom */
        .custom-arrow img {
            width: 24px;
            height: 24px;
            object-fit: contain;
        }

        /* Posisi default tetap */
        .swiper-button-next {
            right: 0;
        }
        .swiper-button-prev {
            left: 0;
        }

        .swiper-pagination-bullet {
            background-color: #6E93f7;
            opacity: 1;
        }
        .swiper-pagination-bullet-active {
            background-color: #4070F4;
        }

        @media screen and (max-width: 768px) {
            .slide-content {
                margin: 0 10px;
            }
            .swiper-navBtn {
                display: none;
            }
        }
        /* Agar card di Swiper Native Teacher tidak stretch memenuhi layar */
        .native-speaker-swiper .swiper-slide {
            width: auto !important;
        }

        /* Atur slide Native Teacher agar memenuhi layar di HP (centered) tapi normal di desktop */
        @media (max-width: 767px) {
            .native-speaker-swiper .swiper-slide {
                width: 100% !important; /* Paksa slide memenuhi lebar layar HP */
            }
        }
        @media (min-width: 768px) {
            .native-speaker-swiper .swiper-slide {
                width: auto !important; /* Di desktop, ukuran mengikuti konten */
            }
        }

        /* Mengatasi masalah centering di Desktop untuk Master Teacher */
        @media (min-width: 768px) {
            .master-teacher-container {
                overflow-x: visible !important; /* Hapus scroll horizontal */
                justify-content: center !important; /* Tengahkan grup card */
                flex-wrap: wrap !important; /* Biarkan wrap jika perlu */
            }
            /* Hilangkan lebar 100% pada wrapper card agar kembali normal */
            .master-card-wrapper {
                width: auto !important;
            }
        }

        /* Atur Swiper Native Teacher agar tidak memaksa 100% lebar di Desktop */
        @media (min-width: 768px) {
            .native-speaker-swiper .swiper-slide {
                width: auto !important; /* Lebar mengikuti konten card */
            }
        }
    </style>
</head>
<body class="bg-[#f0f5ff] overflow-x-hidden mx-auto" perspective-[1000px] x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header/>

    <!-- Hero Section -->
    <section class="text-white flex flex-col md:flex-row items-center justify-between px-4 md:px-8 lg:px-20 py-8 md:py-16 relative bg-cover bg-[center_left_34rem] md:bg-center bg-[url('/img/bg-mobile.png')] md:bg-[url('/img/bg-desktop.png')]" style="margin-top: 2.5rem;">
        <div class="md:w-1/2 order-1 md:order-none">
            <h1 class="text-lg md:text-2xl xl:text-3xl 2xl:text-4xl font-bold mb-2 sm:mb-3 md:mb-4">
                Pusatnya Asah Talenta<br>
                Softskill, Bahasa, dan Seni Budaya<br>
                Pilihan Pasti! di Indonesia
            </h1>
            <p class="mb-2 md:mb-3 text-xs md:text-base xl:text-lg 2xl:text-xl">Blended learning terintegrasi dan terkoneksi global</p>
            <p class="italic text-xs md:text-base xl:text-base 2xl:text-lg mb-4 sm:mb-6">#bridgingtheworldthroughlanguage</p>

            <div class="flex flex-row space-x-3 mb-6 sm:mb-8">
                {{-- Hanya tampilkan tombol Daftar jika belum login --}}
                @guest
                    <a href="{{ route('register') }}"
                    class="bg-orange-600 hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200
                        px-2 py-1 text-xs
                        sm:px-3 sm:py-1 sm:text-sm lg:text-sm xl:text-base
                        lg:px-4 lg:py-2
                        rounded-full border-2 border-white font-semibold flex items-center hover:bg-[#253ea4]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7 mr-1">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                        </svg>
                        Daftar Sekarang
                    </a>
                @endguest

                {{-- Jika sudah login, tampilkan foto profil sebagai link ke halaman profile --}}
                @auth
                @endauth
                <a href="{{ asset('downloads/app-cakrawalabahasa.apk') }}" download class="bg-orange-600 hover:shadow-md transform hover:-translate-y-0.5 transition-all duration-200
                    px-2 py-1 text-xs
                    sm:px-3 sm:py-1 sm:text-sm xl:text-base
                    lg:px-4 lg:py-2 lg:text-sm
                    rounded-full border-2 border-white font-semibold flex items-center hover:bg-[#253ea4]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-7 mr-1">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    Unduh App
                </a>
            </div>

            <div class="flex justify-end items-end md:hidden -mr-4">
                <img src="/img/figure-hero1.png" alt="Hero Image" class="max-w-[250px] h-auto opacity-0 translate-y-20 transition-all duration-1000 ease-out fade-el">
            </div>
        </div>

        <div class="md:mt-8 md:w-1/2 hidden items-end md:flex justify-end">
            <img src="/img/figure-hero1.png" alt="Hero Image" class="max-w-full md:w-[380px] lg:w-[500px] xl:w-[450px] 2xl:w-[600px] h-auto opacity-0 translate-y-20 transition-all duration-1000 ease-out fade-el">
        </div>
    </section>

    <!-- Fitur Section -->
    <section class="bg-white text-black rounded-3xl py-2 px-3 sm:px-4 md:mx-[1rem] lg:px-5 mx-5 lg:mx-16 xl:mx-10 2xl:mx-20 -mt-12 md:-mt-16 relative z-10 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
        <div class="flex space-x-2 py-[8px] md:py-2 overflow-x-scroll scrollbar-hide">
            <a href="/marketplace pengajar" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-3 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/pengajar.png" class="h-8 md:h-8 lg:h-10 xl:h-12">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Marketplace Pengajar</p>
            </a>
            
            <a href="/video belajar modul" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-3 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/icon video.png" class="h-8 md:h-8 lg:h-10 xl:h-12">
                <p class="text-[7.2px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Video Belajar & Modul Ajar</p>
            </a>

            <a href="/ujian penilaian" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-3 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/uji keterampilan.png" class="h-8 md:h-8 lg:h-10 xl:h-12">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Ujian & Penilaian</p>
            </a>

            <a href="/alih bahasa grammar" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-3 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/icon language1.png" class="h-8 md:h-8 lg:h-10 xl:h-12">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Alih Bahasa & Grammar</p>
            </a>

            <a href="/komunitas permainan" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-3 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/community.png" class="h-8 md:h-8 lg:h-10 xl:h-12">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12.5px] 2xl:text-base font-semibold text-center md:text-start">Komunitas & Permainan</p>
            </a>

            <a href="/semua-produk" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 lg:px-10 xl:px-2 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-4 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/icon menu bar.png" class="h-4 md:h-6 lg:h-7 xl:h-8">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Semua <br>Produk</p>
            </a>
        </div>
    </section>

    <!-- Paket Populer Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el text-black py-10 px-0">

        <h2
            class="text-sm sm:text-xl md:text-2xl font-bold mb-8 text-start flex items-start justify-start px-4 md:px-20">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span>
            Paket Populer
        </h2>

        <div class="carousel relative w-full overflow-hidden">

            <div class="carousel-track flex gap-4 px-4 md:px-8 w-max py-2">

                @foreach ($popularClasses as $popular)
                    <div class="w-[200px] sm:w-[200px] md:w-[240px] lg:w-[260px] xl:w-[280px] flex-shrink-0">

                        <div
                            class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">

                            {{-- Nama Kelas --}}
                            <div
                                class="bg-[#232c5f] rounded-b-xl ml-3 mr-3 text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">
                                {{ $popular->course->name }}
                            </div>

                            {{-- Thumbnail --}}
                            <img src="{{ $popular->course->thumbnail }}"
                                class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">

                            <div class="p-5 flex flex-col flex-grow">

                                {{-- Descriptions --}}
                                <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">

                                    @foreach ($popular->descriptions as $desc)
                                        <li class="flex items-start">

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">

                                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365
                                                9.75 9.75-4.365 9.75-9.75
                                                9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75
                                                0 1 0-1.22-.872l-3.236
                                                4.53L9.53 12.22a.75.75
                                                0 0 0-1.06 1.06l2.25
                                                2.25a.75.75 0 0 0
                                                1.14-.094l3.75-5.25Z" clip-rule="evenodd" />

                                            </svg>

                                            <span class="ml-2">
                                                {{ $desc->description }}
                                            </span>

                                        </li>
                                    @endforeach

                                </ul>

                                {{-- Harga --}}
                                <div
                                    class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">

                                    <p>
                                        <strong>{{ $popular->price }}</strong>
                                    </p>

                                    <p>{{ $popular->duration }}</p>

                                </div>

                                {{-- Button --}}
                                <div class="flex justify-center">

                                    <a href="{{ route('courses.show', $popular->course->slug) }}"
                                        class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">

                                        Lihat Detail

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Layanan Kami Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-4 px-4 md:px-20">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-8 text-start flex items-center justify-start">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Layanan Kami
        </h2>

        <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-xl shadow-lg overflow-hidden w-full max-w-3xl mx-auto">
            <div class="w-full aspect-video relative">
                <iframe class="absolute top-0 left-0 w-full h-full"
                    src="https://www.youtube.com/embed/nOgbYoU9wOw" 
                    title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                </iframe>
            </div>
            <div class="p-4 text-center text-sm md:text-base">
                Bincang Sore Bersama Kak Seto Part 1: Menumbuhkan Potensi Belajar Anak di Masa Pandemi
            </div>
        </div>
    </section>

    <!-- Pengalaman CBers Milingual Section -->
    <section class="py-6 px-3 md:px-12">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-8 flex items-center">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span>
            Pengalaman CBers (CB learners)
        </h2>

        <div class="relative max-w-screen-lg mx-auto">
            <div class="bg-[#232c5f] h-[20rem] sm:h-[27rem] p-5 rounded-[35px] shadow-lg overflow-hidden bg-cover bg-center"
                style="background-image: url('/img/layer jago.png')">
                <div class="relative w-full h-full flex items-center overflow-hidden">
                    <div class="slide-container swiper">
                        <div class="slide-content">
                            <!-- ID ditambahkan di sini untuk target JavaScript -->
                            <div class="card-wrapper swiper-wrapper" id="cbers-wrapper">
                                <!-- Card akan di-generate oleh JavaScript di sini -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="swiper-button-prev swiper-navBtn custom-arrow">
                <img src="/img/arrow-kiri.png" alt="Prev">
            </div>
            <div class="swiper-button-next swiper-navBtn custom-arrow">
                <img src="/img/arrow-kanan.png" alt="Next">
            </div>
        </div>
    </section>
    <div style="position: relative">
        <div class="swiper-pagination"></div>
    </div>

    <!-- Kenalan dengan Master Teacher Berpengalaman Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-6" x-data="{ openCard: null }">
        <h2 class="text-sm sm:text-xl md:text-2xl px-4 md:px-20 font-bold text-start flex items-center justify-start mb-8">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Kenalan dengan Master Teacher
        </h2>

        <!-- 
            PERUBAHAN:
            - Tambah class 'master-teacher-container'.
            - Tetap pakai snap-x untuk HP.
        -->
        <div class="master-teacher-container flex items-center overflow-x-auto snap-x snap-mandatory scrollbar-hide space-x-4 px-4 md:px-0 pb-4">

            <!-- Card 1 -->
            <!-- Tambah class 'master-card-wrapper' -->
            <div class="master-card-wrapper w-full flex-shrink-0 snap-center flex justify-center md:w-auto">
                <div class="flex flex-col items-center w-[220px] xl:w-[260px]">
                    <img src="/img/master-teacher/kak_ria_enes.png" alt="Kak Ria Enes" class="w-[130px] md:w-[170px] z-10">
                    <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                        <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                        <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Ria Enes</h3>
                        <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor CB For Kids</p>
                        <hr class="border-white mb-2 w-1/2 mx-auto">
                        <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                        <div x-show="openCard === 1" class="text-left text-sm space-y-2">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Figur Edukator Anak</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Musisi Musik Anak</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Broadcaster</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button @click="openCard === 1 ? openCard = null : openCard = 1"
                                class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                                <span x-show="openCard !== 1">Read More</span>
                                <span x-show="openCard === 1">Read Less</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="master-card-wrapper w-full flex-shrink-0 snap-center flex justify-center md:w-auto">
                <div class="flex flex-col items-center w-[220px] xl:w-[260px]">
                    <img src="/img/master-teacher/kak_yudha_dewantara.png" alt="Kak Yudha Dewantara" class="w-[130px] md:w-[170px] z-10">
                    <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                        <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                        <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Yudha Dewantara</h3>
                        <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Pemrograman</p>
                        <hr class="border-white mb-2 w-1/2 mx-auto">
                        <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                        <div x-show="openCard === 2" class="text-left text-sm space-y-2">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Sertifikasi IoT di BBPVP</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Sertifikasi Web Developer</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Sertifikasi UI/UX</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button @click="openCard === 2 ? openCard = null : openCard = 2"
                                class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                                <span x-show="openCard !== 2">Read More</span>
                                <span x-show="openCard === 2">Read Less</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="master-card-wrapper w-full flex-shrink-0 snap-center flex justify-center md:w-auto">
                <div class="flex flex-col items-center w-[220px] xl:w-[260px]">
                    <img src="/img/master-teacher/kak_syamsri_firdaus.png" alt="Kak Syamsri Firdaus" class="w-[130px] md:w-[170px] z-10">
                    <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                        <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                        <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Syamsuri Firdaus</h3>
                        <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Keislaman</p>
                        <hr class="border-white mb-2 w-1/2 mx-auto">
                        <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                        <div x-show="openCard === 3" class="text-left text-sm space-y-2">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Juara 1 MTQ Int. di Turki</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Juara 1 MTQ Int. di Afrika</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Juara 1 MTQ Int. di Afrika</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button @click="openCard === 3 ? openCard = null : openCard = 3"
                                class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2xl_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                                <span x-show="openCard !== 3">Read More</span>
                                <span x-show="openCard === 3">Read Less</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="master-card-wrapper w-full flex-shrink-0 snap-center flex justify-center md:w-auto pr-4 md:pr-0">
                <div class="flex flex-col items-center w-[220px] xl:w-[260px]">
                    <img src="/img/master-teacher/kak_banon_gautama.png" alt="Kak Banon Gautama" class="w-[130px] md:w-[170px] z-10">
                    <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                        <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                        <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Banon Gautama</h3>
                        <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Seni & Budaya</p>
                        <hr class="border-white mb-2 w-1/2 mx-auto">
                        <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                        <div x-show="openCard === 4" class="text-left text-sm space-y-2">
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Juri Lomba Seni</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Performing Artist</span>
                            </div>
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                                <span>Bintang Film dan Iklan</span>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button @click="openCard === 4 ? openCard = null : openCard = 4"
                                class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                                <span x-show="openCard !== 4">Read More</span>
                                <span x-show="openCard === 4">Read Less</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Native Speaker -->
    <section class="py-10 md:py-14 bg-gradient-to-b from-blue-50 to-white">
        <h2 class="text-sm sm:text-xl md:text-2xl px-4 md:px-20 font-bold text-start flex items-center justify-start mb-8">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Kenalan dengan Native Teacher
        </h2>
        <div class="flex space-x-2 px-2 md:px-2 xl:px-24 overflow-x-auto scrollbar-hide pb-4 justify-start md:justify-center">

            <!-- Swiper Container -->
            <div class="native-speaker-swiper swiper relative">
                <div class="swiper-wrapper" id="teacher-wrapper">
                    <!-- Card akan di-generate oleh JavaScript di sini -->
                </div>
                <!-- Navigation Buttons -->
                {{-- <div class="swiper-button-prev"> <img src="/img/arrow-kiri.png" alt=""></div>
                <div class="swiper-button-next"> <img src="/img/arrow-kanan.png" alt=""></div> --}}
            </div>
        </div>
        <div class="justify-center flex mt-4">
            <a href="marketplace pengajar"
            class="bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] 
            from-orange-800 to-orange-400 text-white 
            shadow-[2px_2px_12px_0px_#000000] rounded-full 
            transform hover:-translate-y-1 hover:scale-105 
            transition-all duration-200 px-6 py-2 
            font-semibold text-xs md:text-sm">
            Lihat Semua
            </a>
        </div>
    </section>

    <!-- Script untuk Generate Card dan Inisialisasi Swiper -->
    <script>
        // 1. DATA CARD (Tetap sama)
        const teachersData = [
            {
                name: "Mr. Karim ElMahdy",
                image: "/img/native-speaker/Mr. Karim ElMahdy.png",
                title: "Arabic Native Speaker",
                subtitle: "",
                achievements: [
                    "Arabic Tutor of Cakrawala Bahasa",
                    "Indonesian Enthusiast",
                    "Artist & Influencer",
                ]
            },
            {
                name: "Ms. Malaka Khalil",
                image: "/img/native-speaker/Ms. Malaka Khalil.png",
                title: "Arabic Native Speaker",
                subtitle: "",
                achievements: [
                    "Arabic Tutor of Cakrawala Bahasa",
                    "Licensed Egyptologist",
                    "International Tour Guide Experience",
                ]
            },
            {
                name: "Mr. Islam Kara",
                image: "/img/native-speaker/Mr. Islam Kara.png",
                title: "Turkish Native Speaker",
                subtitle: "",
                achievements: [
                    "Turkish Tutor of Cakrawala Bahasa",
                    "Lived and studied in Indonesia",
                    "Fashion Enthusiast",
                ]
            },
            {
                name: "Ms. Rumeysa Yaman",
                image: "/img/native-speaker/Ms. Rumeysa Yaman.png",
                title: "Turkish Native Speaker",
                subtitle: "",
                achievements: [
                    "Turkish Tutor of Cakrawala Bahasa",
                    "1st Winner of the Indonesian Speech Competition in Turkey",
                    "Content Creator & Influencer",
                ]
            },
            {
                name: "Mr. Michael",
                image: "/img/native-speaker/Mr. Michael.png",
                title: "English (U.S) Native Speaker",
                subtitle: "",
                achievements: [
                    "English Tutor of Cakrawala Bahasa",
                    "Certified TESOL Instructor",
                    "International Tour Guide Experience",
                ]
            },
            {
                name: "Dr. Mrs. Diana V.",
                image: "/img/native-speaker/Dr. Mrs. Diana Velimetova.png",
                title: "Russian Native Speaker",
                subtitle: "",
                achievements: [
                    "Russian Tutor of Cakrawala Bahasa",
                    "Lecturer and Researcher in Russia",
                    "Content Creator & Fashion Enthusiast",
                ]
            },
            {
                name: "Dr. Mr. Saf Buxy",
                image: "/img/native-speaker/Dr. Mr. Saf Buxy.png",
                title: "British Native Speaker",
                subtitle: "",
                achievements: [
                    "English Tutor of Cakrawala Bahasa",
                    "TEDx Speaker & Author",
                    "UN Peace Ambassador",
                ]
            },
            {
                name: "Mrs. Safira",
                image: "/img/native-speaker/Mrs. Safira.png",
                title: "Russian Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Mr. Bertrand",
                image: "/img/native-speaker/Mr. Bertrand.png",
                title: "French Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Mrs. Melek",
                image: "/img/native-speaker/Mrs. Melek.png",
                title: "Dutch Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Ms. Daria",
                image: "/img/native-speaker/Ms. Daria.png",
                title: "French Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Mr. Stefano",
                image: "/img/native-speaker/Mr. Stefano.png",
                title: "Italian Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Mrs. Diana",
                image: "/img/native-speaker/Mrs. Diana.png",
                title: "Spanish Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Mrs. Haruka",
                image: "/img/native-speaker/Mrs. Haruka.png",
                title: "Japanese Native Speaker",
                subtitle: "",
                achievements: []
            },
            {
                name: "Ms. Eun Ji",
                image: "/img/native-speaker/Ms. Eun Ji.png",
                title: "Korean Native Speaker",
                subtitle: "",
                achievements: []
            },
        ];

        // 2. TEMPLATE & LOGIC
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('teacher-wrapper');

            const createAchievementsHTML = (achievements) => {
                if (!achievements || achievements.length === 0) return '';
                return `
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i>
                        <span>${achievements.join('</span></div><div class="flex items-start"><i class="fas fa-check-circle text-blue-400 mt-1 mr-2 flex-shrink-0"></i><span>')}</span>
                    </div>
                `;
            };

            teachersData.forEach(teacher => {
                const subtitleHTML = teacher.subtitle 
                    ? `<p class="text-[11px] xl:text-xs 2xl:text-sm mb-3 text-gray-400">${teacher.subtitle}</p>` 
                    : '';

                const achievementsHTML = createAchievementsHTML(teacher.achievements);
                const contentDivHTML = achievementsHTML 
                    ? `<div x-show="openCard" x-transition class="text-left text-sm space-y-2">${achievementsHTML}</div>` 
                    : '';

                const slideHTML = `
                    <div class="swiper-slide">
                        <div class="flex justify-center h-full">
                            <div class="flex flex-col items-center w-[220px] xl:w-[260px]">
                                <img src="${teacher.image}" alt="${teacher.name}" class="w-[130px] md:w-[170px] z-10">
                                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                                    <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">${teacher.name}</h3>
                                    <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">${teacher.title}</p>
                                    ${subtitleHTML}
                                    <hr class="border-white mb-2 w-1/2 mx-auto">
                                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>
                                    <div x-data="{ openCard: false }">
                                        ${contentDivHTML}
                                        <div class="mt-4">
                                            <button @click="openCard = !openCard"
                                                class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                                                <span x-show="!openCard">Read More</span>
                                                <span x-show="openCard">Read Less</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                wrapper.insertAdjacentHTML('beforeend', slideHTML);
            });

            // 3. INISIALISASI SWIPER
            const nativeSpeakerSwiper = new Swiper('.native-speaker-swiper', {
                slidesPerView: 'auto', 
                spaceBetween: 20,
                loop: false,
                centeredSlides: true, // Default untuk Mobile (tengah satu-satu)
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        centeredSlides: false, // Di Desktop: tidak centered satu-satu, tapi rata kiri (normal row)
                        spaceBetween: 30,
                    },
                },
                on: {
                    init: function () {
                        const style = document.createElement('style');
                        style.innerHTML = `
                            .swiper-button-next img, .swiper-button-prev img {
                                width: 20px;
                                height: 20px;
                            }
                        `;
                        document.head.appendChild(style);
                    }
                }
            });
        });
    </script>
    
    <!-- Section Chat Konsultan -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-6 px-4 md:px-20"> 
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold text-start flex items-center justify-start mb-8">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Tanyakan Via Master Edukasi
        </h2>
        <x-section-chat />
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WA -->
    <x-floating-wa />
    <script src="/js/auto-swipe.js"></script>

    <script>
        const swiperPaket = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 12,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 3000,
        freeMode: true,
        grabCursor: true,
            allowTouchMove: true,
        });
    </script>

    <!-- script jagoan milingual -->
    <script src="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>

    <script src="/js/animationsection.js"></script>

    <script>
        // 1. DATA CBERS
        // Silakan tambahkan atau kurangi data di bawah ini sesuai kebutuhan (target 40 card)
        const cbersData = [
            {
                name: "Bara",
                image: "/img/jagoan-milingual/Bara.png",
                link: "#"
            },
            {
                name: "Talula",
                image: "/img/jagoan-milingual/Talula.png",
                link: "#"
            },
            {
                name: "Husein",
                image: "/img/jagoan-milingual/Husein.png",
                link: "#"
            },
            {
                name: "Adiba",
                image: "/img/jagoan-milingual/Adiba.png",
                link: "#"
            },
            {
                name: "Skye",
                image: "/img/jagoan-milingual/Skye.png",
                link: "#"
            },
            {
                name: "Sakha",
                image: "/img/jagoan-milingual/Sakha.png",
                link: "#"
            },
            {
                name: "Zayn",
                image: "/img/jagoan-milingual/Zayn.png",
                link: "#"
            },
            {
                name: "Eijaz",
                image: "/img/jagoan-milingual/Eijaz.png",
                link: "#"
            },
            {
                name: "Aeyza",
                image: "/img/jagoan-milingual/Aeyza.png",
                link: "#"
            },
            {
                name: "Darendra",
                image: "/img/jagoan-milingual/Darendra.png",
                link: "#"
            },
            {
                name: "Shiefa",
                image: "/img/jagoan-milingual/Shiefa.png",
                link: "#"
            },
            {
                name: "Zayn",
                image: "/img/jagoan-milingual/Zayn2.png",
                link: "#"
            },
            {
                name: "Kaira",
                image: "/img/jagoan-milingual/Kaira.png",
                link: "#"
            },
            {
                name: "Hamzah",
                image: "/img/jagoan-milingual/Hamzah.png",
                link: "#"
            },
            {
                name: "Senna",
                image: "/img/jagoan-milingual/Senna.png",
                link: "#"
            },
            {
                name: "Zikri",
                image: "/img/jagoan-milingual/Zikri.png",
                link: "#"
            },
            {
                name: "Rory",
                image: "/img/jagoan-milingual/Rory.png",
                link: "#"
            },
            {
                name: "Maleeq",
                image: "/img/jagoan-milingual/Maleeq.png",
                link: "#"
            },
            {
                name: "Shifalona",
                image: "/img/jagoan-milingual/Shifalona.png",
                link: "#"
            },
            {
                name: "Khiar",
                image: "/img/jagoan-milingual/Khiar.png",
                link: "#"
            },
            {
                name: "Revania",
                image: "/img/jagoan-milingual/Revania.png",
                link: "#"
            },
            {
                name: "Azka",
                image: "/img/jagoan-milingual/Azka.png",
                link: "#"
            },
            {
                name: "Annaya",
                image: "/img/jagoan-milingual/Annaya.png",
                link: "#"
            },
            {
                name: "Mysa",
                image: "/img/jagoan-milingual/Mysa.png",
                link: "#"
            },
            {
                name: "Kane",
                image: "/img/jagoan-milingual/Kane.png",
                link: "#"
            },
            {
                name: "Arta",
                image: "/img/jagoan-milingual/Arta.png",
                link: "#"
            },
            {
                name: "Rania",
                image: "/img/jagoan-milingual/Rania.png",
                link: "#"
            },
            {
                name: "Dyandra",
                image: "/img/jagoan-milingual/Dyandra.png",
                link: "#"
            },
            {
                name: "Azzam",
                image: "/img/jagoan-milingual/Azzam.png",
                link: "#"
            },
            {
                name: "Danendra",
                image: "/img/jagoan-milingual/Danendra.png",
                link: "#"
            },
            {
                name: "Raisa",
                image: "/img/jagoan-milingual/Raisa.png",
                link: "#"
            },
            {
                name: "Uwais",
                image: "/img/jagoan-milingual/Uwais.png",
                link: "#"
            },
            {
                name: "Alesha",
                image: "/img/jagoan-milingual/Alesha.png",
                link: "#"
            },
            {
                name: "Riani",
                image: "/img/jagoan-milingual/Riani.png",
                link: "#"
            },
            {
                name: "Hasna",
                image: "/img/jagoan-milingual/Hasna.png",
                link: "#"
            },
            {
                name: "Shaqueena",
                image: "/img/jagoan-milingual/Shaqueena.png",
                link: "#"
            },
            {
                name: "Eijaz",
                image: "/img/jagoan-milingual/Eijaz2.png",
                link: "#"
            },
            {
                name: "Carissa",
                image: "/img/jagoan-milingual/Carissa.png",
                link: "#"
            },
            {
                name: "Nadiya",
                image: "/img/jagoan-milingual/Nadiya.png",
                link: "#"
            },
        ];

        // 2. LOGIC GENERATE CARD
        document.addEventListener('DOMContentLoaded', function () {
            const cbersWrapper = document.getElementById('cbers-wrapper');

            if (cbersWrapper) {
                cbersData.forEach(item => {
                    const slideHTML = `
                        <div class="card swiper-slide">
                            <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                    <img src="${item.image}" alt="${item.name}" class="w-20 sm:w-32 rounded-lg" />
                                </div>
                                <div class="p-3 sm:p-4 text-center mt-auto">
                                    <p class="font-bold text-sm sm:text-lg lg:text-xl">${item.name}</p>
                                    <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman CBers</p>
                                    <div class="flex justify-center">
                                        <a href="${item.link}" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    cbersWrapper.insertAdjacentHTML('beforeend', slideHTML);
                });
            }

            // 3. INISIALISASI SWIPER CBERS
            // Pastikan ini dijalankan setelah card di-generate
            const swiperJagoan = new Swiper(".slide-content", {
                slidesPerView: 3,
                spaceBetween: 25,
                loop: true,
                centerSlide: true,
                fade: true,
                grabCursor: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    0:    { slidesPerView: 2 },
                    520:  { slidesPerView: 3 },
                    950:  { slidesPerView: 4 },
                },
            });
        });
    </script>
</body>
</html>