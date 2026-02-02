<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    <!-- Section Uji Kemampuan -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 ps-4 pb-0 md:pr-0 2xl:ps-20 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">
        
        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[300px] md:h-[400px] xl:h-[540px] 2xl:h-[650px] w-auto z-0 md:bottom-0">

        <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left text-[#151d52] md:pl-8 lg:pl-16 mb-10 md:mb-0">
                <h1 class="text-3xl sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                    Uji Kemampuanmu,<br> Raih Sertifikatmu!
                </h1>
                <p class="text-white text-sm sm:text-base xl:text-lg 2xl:text-xl leading-relaxed mb-8 max-w-lg">
                    Ikuti kuis, ujian berkala, dan assessment berstandar internasional.
                    Dapatkan laporan hasil belajar otomatis dan rekomendasi peningkatan skill.
                </p>

                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Coba Tes Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end">
                <img src="/img/student-couple.png" alt="Tutor Tes" 
                    class="w-[400px] sm:w-[400px] md:w-[500px] lg:w-[900px] object-contain">
            </div>

        </div>
    </section>

    <!-- Section Keunggulan Ujian -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-20 text-center">

        <!-- Judul -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#151d52] mb-2">
            Keunggulan Ujian Bersama
        </h2>
        <h3 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#f78a28] mb-12">
            Cakrawala Bahasa
        </h3>

        <!-- Grid Keunggulan -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-12 max-w-6xl mx-auto">

            <!-- Item 1 -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-[#f78a28] p-5 rounded-2xl mb-5 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                    <img src="/img/icon.png" alt="Icon" class="w-16 h-16 mx-auto">
                </div>
                <h4 class="font-bold text-lg md:text-xl lg:text-2xl text-[#151d52] mb-3">100+ Peserta</h4>
                <p class="text-sm md:text-base lg:text-lg text-gray-600">Mengikuti tes bersama kami di seluruh penjuru daerah</p>
            </div>

            <!-- Item 2 -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-[#f78a28] p-5 rounded-2xl mb-5 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                    <img src="/img/icon.png" alt="Icon" class="w-16 h-16 mx-auto">
                </div>
                <h4 class="font-bold text-lg md:text-xl lg:text-2xl text-[#151d52] mb-3">100+ Latihan</h4>
                <p class="text-sm md:text-base lg:text-lg text-gray-600">Yang disediakan untuk menunjang simulasi</p>
            </div>

            <!-- Item 3 -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-[#f78a28] p-5 rounded-2xl mb-5 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                    <img src="/img/icon.png" alt="Icon" class="w-16 h-16 mx-auto">
                </div>
                <h4 class="font-bold text-lg md:text-xl lg:text-2xl text-[#151d52] mb-3">Metode Efektif</h4>
                <p class="text-sm md:text-base lg:text-lg text-gray-600">Dirancang khusus untuk kemudahan peserta</p>
            </div>

            <!-- Item 4 -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-[#f78a28] p-5 rounded-2xl mb-5 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                    <img src="/img/icon.png" alt="Icon" class="w-16 h-16 mx-auto">
                </div>
                <h4 class="font-bold text-lg md:text-xl lg:text-2xl text-[#151d52] mb-3">Beragam Bahasa</h4>
                <p class="text-sm md:text-base lg:text-lg text-gray-600">Tersedia banyak pilihan bahasa sesuai kebutuhan</p>
            </div>

            <!-- Item 5 -->
            <div class="flex flex-col items-center text-center">
                <div class="bg-[#f78a28] p-5 rounded-2xl mb-5 shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                    <img src="/img/icon.png" alt="Icon" class="w-16 h-16 mx-auto">
                </div>
                <h4 class="font-bold text-lg md:text-xl lg:text-2xl text-[#151d52] mb-3">Pengajar Profesional</h4>
                <p class="text-sm md:text-base lg:text-lg text-gray-600">Pengajar dan penguji bersertifikat dalam bidang pengajaran</p>
            </div>

        </div>
    </section>

    <!-- Section Pilih Kelasmu Sendiri -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 lg:px-20 xl:px-14 2xl:px-28 text-center">

        <!-- Judul -->
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#151d52] mb-16">
            Pilih Kelasmu <span class="text-[#f78a28]">Sendiri</span>
        </h2>

        <!-- Card Container -->
        <div class="flex flex-col md:flex-row justify-center items-stretch gap-5 2xl:gap-10">

            <!-- Basic Level -->
            <div class="w-full bg-white rounded-3xl relative shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                <div class="relative bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] p-6 xl:pt-16 min-h-[165px] xl:h-auto 2xl:h-[220px] rounded-t-3xl">
                    <h3 class="text-xl md:text-lg xl:text-2xl 2xl:text-3xl font-bold text-[#151d52] text-left leading-tight">Basic Level <br>Assessment</h3>
                    <p class="text-sm md:text-xs xl:text-sm 2xl:text-base text-white mt-1 text-left">Pengukuran pemahaman <br>dasar bahasa asing</p>
                    <img src="/img/menkribo.png" alt="Advanced" 
                        class="absolute top-[-33px] md:top-[-21px] xl:top-[-40px] 2xl:top-[-55px] right-0 w-[180px] md:w-[170px] lg:w-[215px] xl:w-[215px] 2xl:w-[250px]">
                </div>
                <div class="p-6 flex flex-col h-full">
                    <ul class="text-[#151d52] text-left space-y-4 mb-6 text-xs md:text-xs xl:text-[13px] 2xl:text-base">
                        <li>✔ Menyediakan hasil penilaian yang mudah dipahami.</li>
                        <li>✔ Memberikan rekomendasi belajar lanjutan.</li>
                        <li>✔ Tersedia latihan tambahan setelah tes.</li>
                    </ul>
                    <div class="w-50% text-xs md:text-xs xl:text-sm 2xl:text-base">
                        <a href="#" class="hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 border-2 border-[#151d52] text-[#151d52] px-6 py-2 rounded-full font-semibold hover:bg-[#232c5f] hover:text-white">
                            Cek Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            <!-- Intermediate Level -->
            <div class="w-full bg-white rounded-3xl relative shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                <div class="relative bg-gradient-to-t from-[#0ea5e9] via-[#22d3ee] to-[#a5f3fc] p-6 xl:pt-16 min-h-[165px] xl:h-auto 2xl:h-[220px] rounded-t-3xl">
                    <h3 class="text-xl md:text-lg xl:text-2xl 2xl:text-3xl font-bold text-[#151d52] text-left leading-tight">Intermediate <br>Assessment</h3>
                    <p class="text-sm md:text-xs xl:text-sm 2xl:text-base text-white mt-1 text-left">Uji kemampuan lebih <br>dalam dan lanjutan</p>
                    <img src="/img/menkribo.png" alt="Advanced" 
                        class="absolute top-[-33px] md:top-[-21px] xl:top-[-40px] 2xl:top-[-55px] right-0 w-[180px] md:w-[170px] lg:w-[215px] xl:w-[215px] 2xl:w-[250px]">
                </div>
                <div class="p-6 flex flex-col h-full">
                    <ul class="text-[#151d52] text-left space-y-4 mb-6 text-xs md:text-xs xl:text-[13px] 2xl:text-base">
                        <li>✔ Menyediakan hasil penilaian yang mudah dipahami.</li>
                        <li>✔ Memberikan rekomendasi belajar lanjutan.</li>
                        <li>✔ Tersedia latihan tambahan setelah tes.</li>
                    </ul>
                    <div class="w-50% text-xs md:text-xs xl:text-sm 2xl:text-base">
                        <a href="#" class="hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 border-2 border-[#151d52] text-[#151d52] px-6 py-2 rounded-full font-semibold hover:bg-[#232c5f] hover:text-white">
                            Cek Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

            <!-- Advanced Level -->
            <div class="w-full bg-white rounded-3xl relative shadow-[0_6px_12px_rgba(0,0,0,0.40)]">
                <div class="relative bg-gradient-to-t from-[#e11d48] via-[#f13f7f] to-[#f9a8d4] p-6 xl:pt-16 min-h-[165px] xl:h-auto 2xl:h-[220px] rounded-t-3xl">
                    <h3 class="text-xl md:text-lg xl:text-2xl 2xl:text-3xl font-bold text-[#151d52] text-left leading-tight">Advanced <br>Assessment</h3>
                    <p class="text-sm md:text-xs xl:text-sm 2xl:text-base text-white mt-1 text-left">Uji kemampuan lebih <br>dalam dan lanjutan</p>
                    <img src="/img/menkribo.png" alt="Advanced" 
                        class="absolute top-[-33px] md:top-[-21px] xl:top-[-40px] 2xl:top-[-55px] right-0 w-[180px] md:w-[170px] lg:w-[215px] xl:w-[215px] 2xl:w-[250px]">
                </div>
                <div class="p-6 flex flex-col h-full">
                    <ul class="text-[#151d52] text-left space-y-4 mb-6 text-xs md:text-xs xl:text-[13px] 2xl:text-base">
                        <li>✔ Menyediakan hasil penilaian yang mudah dipahami.</li>
                        <li>✔ Memberikan rekomendasi belajar lanjutan.</li>
                        <li>✔ Tersedia latihan tambahan setelah tes.</li>
                    </ul>
                    <div class="w-50% text-xs md:text-xs xl:text-sm 2xl:text-base">
                        <a href="#" class="hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 border-2 border-[#151d52] text-[#151d52] px-6 py-2 rounded-full font-semibold hover:bg-[#232c5f] hover:text-white">
                            Cek Selengkapnya
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CTA Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-16">
        <div class="relative bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#232c5f] via-[#29336e] to-[#3c4a9a] rounded-[50px] shadow-lg overflow-hidden w-full max-w-[1000px] mx-auto flex flex-col md:flex-row items-center justify-between px-6">

            <!-- Hiasan pattern -->
            <img src="/img/hiasan1.png" alt="Pattern" 
                class="absolute right-0 bottom-0 h-[220px] sm:h-[260px] md:h-full w-auto opacity-20 z-0 md:top-0">

            <!-- Teks kiri -->
            <div class="md:w-1/2 text-white md:text-left text-center z-10 mt-6 md:pl-8 lg:pl-16 mb-8 md:mb-0">
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold leading-tight mb-6">
                    Udah Siap <br> untuk Ikut Ujian? <br> 
                    <span class="text-[#f78a28]">atau Mau Cek Ombak Dulu?</span>
                </h1>

                <div class="flex justify-center items-center md:justify-start gap-4">
                    <a href="#" class="bg-[#f78a28] border-2 border-white text-white font-semibold px-4 md:px-8 py-3 rounded-full text-sm md:text-base lg:text-lg hover:bg-orange-500 transition">
                        Mulai Ujian
                    </a>
                    <a href="#" class="border-2 border-white text-white font-semibold px-4 md:px-8 py-3 rounded-full text-sm md:text-base lg:text-lg hover:bg-white hover:text-[#0b1a53] transition">
                        Unduh Modul
                    </a>
                </div>
            </div>

            <!-- Gambar orang -->
            <div class="md:w-1/2 flex justify-end items-end relative z-10 md:pr-8 lg:pr-16">
                <img src="/img/berfikir.png" alt="Pria" class="w-[200px] sm:w-[260px] md:w-[320px]">
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