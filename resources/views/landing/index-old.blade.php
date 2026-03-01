<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <style>
        /* Sembunyikan scrollbar di semua browser */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
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

        /* 🟢 Custom Nav Button Styling */
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

        /* 🔴 Sembunyikan icon default Swiper arrow */
        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        /* ✅ Styling untuk gambar panah kustom */
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
    </style>
</head>
<body class="bg-[#f0f5ff] overflow-x-hidden mx-auto" perspective-[1000px] x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header/>

    <!-- Hero Section -->
    <section class="text-white flex flex-col md:flex-row items-center justify-between px-4 md:px-8 lg:px-20 py-8 md:py-16 relative bg-cover bg-[center_left_34rem] md:bg-center bg-[url('/img/bg-mobile.png')] md:bg-[url('/img/bg-desktop.png')]" style="margin-top: 2.5rem;">
        <div class="md:w-1/2 order-1 md:order-none">
            <h1 class="text-lg md:text-2xl xl:text-3xl 2xl:text-4xl font-bold mb-2 sm:mb-3 md:mb-4">
                Platform Luar Biasa<br>
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

            <a href="/semua produk" 
            class="min-w-[70px] h-auto px-2 py-2 sm:px-3 lg:px-10 xl:px-2 sm:py-2 border-[2px] border-orange-500 rounded-xl transition transform duration-300 hover:-translate-y-2 flex flex-col items-center justify-center space-y-4 md:min-w-[120px] xl:min-w-[180px] xl:h-[70px] md:flex-row md:space-y-0 md:space-x-3 hover:shadow-[0_6px_12px_rgba(0,0,0,0.50)]">
                <img src="/img/icon menu bar.png" class="h-4 md:h-6 lg:h-7 xl:h-8">
                <p class="text-[7.5px] md:text-[10.8px] lg:text-[12px] xl:text-[12px] 2xl:text-base font-semibold text-center md:text-start">Semua <br>Produk</p>
            </a>
        </div>
    </section>

    <!-- Paket Populer Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el text-black py-10 px-0">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-8 text-start flex items-start justify-start px-4 md:px-20">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Paket Populer
        </h2>
        <div class="swiper mySwiper" onmouseenter="swiperPaket.autoplay.stop()" onmouseleave="swiperPaket.autoplay.start()">
            <div class="swiper-wrapper px-2 sm:px-4 md:px-8 py-2">
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 1 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3 text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Super Kids</div>
                        <img src="/img/Super Kid.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">87% pengguna mengalami peningkatan kreativitas dan kepercayaan diri.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% pengguna terbiasa dengan pembelajaran mandiri, eksploratif, dan penuh inisiatif.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">82% pengguna mengenal dan paham konsep dasar keuangan dan kewirausahaan.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 1.499k/Bulan</strong></p>
                                <p>10 sesi 2 jam</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/super-kid" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 2 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3 text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Happy Parenting</div>
                        <img src="/img/best parenting.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% orang tua mengatahui cara membimbing anak berkembang secara optimal.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">85% orang tua lebih terampil dalam mendidik anak dengan pendekatan yang positif.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">82% orang tua mengalami peningkatan hubungan emosional yang harmonis antar keluarga.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 1.499k/Bulan</strong></p>
                                <p>10 sesi 2 jam</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/best-parenting" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 3 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Jagoan Budaya</div>
                        <img src="/img/Jago Budaya.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% pengguna mencintai budaya Indonesia sekaligus menghargai budaya asing.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">86% pengguna mengalami peningkatan wawasan budaya dan prestasi non akademik.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">89% pengguna mengalami perkembangan keterampilan seni dan kreativitas.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 1.499k/Bulan</strong></p>
                                <p>10 sesi 2 jam</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/jago-budaya" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 4 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Jagoan Bahasa</div>
                        <img src="/img/Jago Bahasa.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% pengguna mengalami peningkatan kepercayaan diri dan kemampuan berbahasa asing</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">89% pengguna mengalami peningkatan prestasi akademik dengan pembelajaran bilingual.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">85% pengguna mengalami peningkatan kemampuan membaca dan memahami Al Quran.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 1.499k/Bulan</strong></p>
                                <p>10 sesi 2 jam</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/jago-bahasa" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 5 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Jagoan Nyekill</div>
                        <img src="/img/Jagoan Nyekill.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">88% pengguna memiliki daya saing yang kuat, beradab, dan berwawasan global.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">86% pengguna menunjukkan peningkatan jiwa kewirausahaan dan pemahaman teknologi.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">85% pengguna aktif menerapkan keterampilan abad 21 dalam kehidupan sehari-hari.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 1.499k/Bulan</strong></p>
                                <p>10 sesi 2 jam</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/jago-nyekill" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 6 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Kelas ICL Mentorship</div>
                        <img src="/img/ICL Mentorship.png" alt="Cakrawala Skills" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% peserta mendapat berbagai ilmu dan wawasan internasional.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">89% peserta memperoleh kesempatan beasiswa studi dan karir internasional.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% peserta mengalami peningkatan motivasi untuk menaklukkan dunia melalui bahasa.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 50k/Sesi</strong></p>
                                <p>3 Sesi per Program</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/icl-mentorship" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 7 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Kelas CB Academy</div>
                        <img src="/img/cb-academy.png" alt="CB Academy" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% peserta mengalami peningkatan kepercayaan diri dan kemampuan berbahasa asing.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">87% peserta mampu berinteraksi dalam lebih dari satu bahasa dan siap go internasional.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">85% peserta mengenal dan memahami budaya dari setiap bahasa yang dipelajari.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 75k/Sesi</strong></p>
                                <p>20 sesi per Semester</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/cb-academy" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 8 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Kelas Camp Bahasa</div>
                        <img src="/img/camp-bahasa.png" alt="Camp Bahasa" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">88% peserta mengembangkan pola pikir yang luas dan terbuka (open-minded).</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">86% peserta memperoleh wawasan serta pelajaran hidup dengan perspektif global</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% peserta mendapat pengalaman seru dan menjadi global citizen.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 5.550k/Paket</strong></p>
                                <p>15 Hari Per Program</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/camp-bahasa" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 9 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Kelas Cakrawala Skills</div>
                        <img src="/img/cakrawala-skills.png" alt="CB Academy" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% peserta mengembangkan kemampuan problem-solving, creativity dan critical thinking.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">87% peserta mengalami peningkatan keterampilan sesuai kebutuhan industri.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">89% peserta menunjukkan minat tinggi pada inovasi dan tren industri terkini.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 75k/Sesi</strong></p>
                                <p>20 sesi per Semester</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/cakrawala-skills" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide w-[200px] h-auto sm:min-w-[200px] md:min-w-[240px] lg:min-w-[260px] xl:min-w-[280px] max-w-[280px]">
                    <!-- Card 10 -->
                    <div class="bg-white transform transition-all duration-200 hover:-translate-y-2 hover:shadow-[0_12px_16px_rgba(0,0,0,0.50)] rounded-2xl shadow-lg overflow-hidden border flex flex-col h-full">
                        <div class="bg-[#232c5f] rounded-b-xl ml-3 mr-3  text-white py-1 text-center font-semibold z-50 text-[9px] md:text-sm lg:text-base">Kelas Best Muslim</div>
                        <img src="/img/best-muslim.png" alt="Camp Bahasa" class="w-full h-50 -mt-10 md:h-60 object-cover rounded-b-2xl">
                        <div class="p-5 flex flex-col flex-grow">
                            <ul class="space-y-2 mb-5 text-[9px] md:text-[12px] lg:text-sm flex-grow">
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">90% pengguna mengalami peningkatan wawasan keislaman.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">89% pengguna menunjukkan peningkatan spiritual dan perbaikan adab.</span>
                                </li>
                                <li class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5 text-blue-500 mt-1 shrink-0">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2">85% pengguna mengalami peningkatan pemahaman Bahasa Arab dan Al Quran.</span>
                                </li>
                            </ul>
                            <div class="border-t border-black pt-3 mb-3 text-[11px] sm:text-xs md:text-sm text-center">
                                <p><strong>Mulai dari 60k/Sesi</strong></p>
                                <p>16 Sesi Per Program</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <a href="/layanan/best-muslim" class="inline-block bg-[#232c5f] text-white text-center py-2 px-3 md:px-5 text-[11px] sm:text-xs lg:text-sm rounded-full font-semibold hover:bg-blue-700 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Pengalaman Jagoan Milingual Section (Versi Swiper, Panah hanya di Desktop, Dots Selalu Ada) -->
    <section class="py-6 px-3 md:px-20">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-8 flex items-center">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span>
            Pengalaman Jagoan Milingual
        </h2>

        <div class="relative max-w-screen-lg mx-auto">
            <div class="bg-[#232c5f] h-[20rem] sm:h-[27rem] p-5 rounded-[35px] shadow-lg overflow-hidden bg-cover bg-center"
                style="background-image: url('/img/layer jago.png')">
                <div class="relative w-full h-full flex items-center overflow-hidden">
                    <div class="slide-container swiper">
                        <div class="slide-content">
                            <div class="card-wrapper swiper-wrapper">
                                <!-- Slide 1 -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Sara Mit" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Sara Mit</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 (Contoh) -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Jenny Wert" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Jenny Wert</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slide 1 -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Sara Mit" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Sara Mit</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 (Contoh) -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Jenny Wert" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Jenny Wert</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 1 -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Sara Mit" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Sara Mit</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 (Contoh) -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Jenny Wert" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Jenny Wert</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 1 -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Sara Mit" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Sara Mit</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Slide 2 (Contoh) -->
                                <div class="card swiper-slide">
                                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex-shrink-0 min-w-[100px] md:min-w-[120px] xl:min-w-[160px] flex flex-col">
                                        <div class="pt-3 flex justify-center rounded-t-xl" style="background: radial-gradient(circle at center, #ffb778 0%, #ffb778 30%, #e75506 100%);">
                                            <img src="/img/avatar.png" alt="Jenny Wert" class="w-20 sm:w-32 rounded-lg" />
                                        </div>
                                        <div class="p-3 sm:p-4 text-center mt-auto">
                                            <p class="font-bold text-sm sm:text-lg lg:text-xl">Jenny Wert</p>
                                            <p class="text-gray-500 text-[10px] sm:text-sm mb-2">Pengalaman Jagoan</p>
                                            <div class="flex justify-center">
                                                <a href="#" class="block w-20 md:w-28 bg-[#232c5f] text-white py-1 sm:py-2 rounded-full font-semibold text-[10px] sm:text-sm hover:bg-blue-800 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                                    Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tambah slide lainnya di sini -->
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

        <div class="flex space-x-4 overflow-x-auto scrollbar-hide pb-4 justify-start md:justify-center">

            <!-- Card 1 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[260px] pl-2">
                <img src="/img/master-teacher/kak ria enes.png" alt="Kak Ria Enes" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Ria Enes</h3>
                    <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Public Speaking</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 1" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Pembawa Acara TV</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Penyiar Radio Profesional</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Penyanyi Profesional</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Content Educator Anak</p>
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

            <!-- Card 2 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[260px]">
                <img src="/img/master-teacher/kak yudha dewantara.png" alt="Kak Yudha Dewantara" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Yudha Dewantara</h3>
                    <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Pemrograman</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 2" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Sertifikasi IoT di BBPVP</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Sertifikasi Web Developer</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Sertifikasi UI/UX</p>
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

            <!-- Card 3 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[260px]">
                <img src="/img/master-teacher/kak syamsri firdaus.png" alt="Kak Syamsri Firdaus" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Syamsri Firdaus</h3>
                    <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Keislaman</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 3" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Juara 1 MTQ Int. di Turki</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Juara 1 MTQ Int. di Afrika</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Juara 1 MTQ Int. di Afrika</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Youtuber</p>
                    </div>

                    <div class="mt-4">
                        <button @click="openCard === 3 ? openCard = null : openCard = 3"
                            class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                            <span x-show="openCard !== 3">Read More</span>
                            <span x-show="openCard === 3">Read Less</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[260px] pr-2">
                <img src="/img/master-teacher/kak banon gautama.png" alt="Kak Banon Gautama" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-sm xl:text-base 2xl:text-lg mb-1">Kak Banon Gautama</h3>
                    <p class="text-[11px] xl:text-xs 2xl:text-sm mb-3">Master Tutor Seni & Budaya</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 4" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Juri Lomba Pantomim Nasional</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Pemain Iklan Paramex, dll</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Pemain Film WR Supratman</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Pemain Serial Netflix</p>
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
    </section>

    <!-- Kenalan dengan Para Native Speakers Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-6" x-data="{ openCard: null }">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold text-start flex items-center justify-start mb-8 px-4 md:px-20">
            <span class="text-yellow-500 text-sm sm:text-xl md:text-2xl mr-2">★</span> Kenalan dengan Para Native Speakers
        </h2>

        <div class="flex space-x-4 overflow-x-auto scrollbar-hide pb-4 justify-start md:justify-center">

            <!-- Card 1 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[240px] pl-2">
                <img src="/img/native1.png" alt="Kak Ria Enes" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-base xl:text-lg mb-1">Dr. Saf Buxy</h3>
                    <p class="text-xs xl:text-sm mb-3">Master Bahasa Inggris</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 1" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Global Humanitarian Award</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Co-Founder of Healing from Nation</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Dr Sarvepalli Radhakrishnan Award (Award of Honor) "Gold Men's Award for leadership, excellence and achievement</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Tutor and Native Speaker English of Cakrawala Bahasa</p>
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

            <!-- Card 2 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[240px]">
                <img src="/img/native2.png" alt="Kak Yudha Dewantara" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-base xl:text-lg mb-1">Diana Vilametova</h3>
                    <p class="text-xs xl:text-sm mb-3">Master Bahasa Rusia</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 2" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Tutor and Native Speaker Russian of Cakrawala Bahasa</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Content Creator & Fashion Enthusiast</p>
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

            <!-- Card 3 -->
            <div class="flex flex-col items-center flex-shrink-0 w-[220px] xl:w-[240px] pr-2">
                <img src="/img/native3.png" alt="Kak Syamsri Firdaus" class="w-[130px] md:w-[170px] z-10">
                <div class="bg-[#232c5f] text-white rounded-3xl pt-5 pb-6 px-6 text-center shadow-lg w-full">
                    <img src="/img/favicon.png" alt="Logo" class="w-8 h-8 mx-auto mb-3">
                    <h3 class="font-bold text-base xl:text-lg mb-1">Rumeysa Yaman</h3>
                    <p class="text-xs xl:text-sm mb-3">Master Bahasa Turki</p>
                    <hr class="border-white mb-2 w-1/2 mx-auto">
                    <p class="text-xs mb-4">Pengalaman & Prestasi</p>

                    <div x-show="openCard === 3" class="text-left text-sm space-y-2">
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Youtuber and Indonesian Enthusiast</p>
                        <p><i class="fas fa-check-circle text-blue-400 mr-2"></i> Tutor and Native Speaker Turkish of Cakrawala Bahasa</p>
                    </div>

                    <div class="mt-4">
                        <button @click="openCard === 3 ? openCard = null : openCard = 3"
                            class="inline-block bg-gradient-to-r hover:shadow-[5px_5px_15px_0px_#000000] from-orange-800 to-orange-400 text-white shadow-[2px_2px_12px_0px_#000000] rounded-full transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 px-6 py-2 font-semibold text-xs md:text-sm hover:bg-orange-600">
                            <span x-show="openCard !== 3">Read More</span>
                            <span x-show="openCard === 3">Read Less</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <script>
        // Swiper Jagoan Milingual
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
    </script>

    <script src="/js/animationsection.js"></script>
</body>
</html>