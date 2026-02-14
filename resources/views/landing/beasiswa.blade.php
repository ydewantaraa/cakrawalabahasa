<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Section Gabung Member -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 ps-4 pb-0 md:pr-0 2xl:ps-20 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">
        
        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[300px] md:h-[380px] xl:h-[500px] 2xl:h-[600px] w-auto z-0 md:bottom-0">

        <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left text-[#151d52] md:pl-8 lg:pl-16 mb-10 md:mb-0">
                <h1 class="text-3xl sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                    Raih Cita-citamu <br> bersama kami
                </h1>
                <p class="text-white text-sm sm:text-base xl:text-lg 2xl:text-xl leading-relaxed mb-8 xl:max-w-lg 2xl:max-w-xl">
                    Gantungkan cita-citamu setinggi langit dan wujudkan bersama Cakrawala Bahasa
                </p>

                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Wujudkan Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end">
                <img src="/img/orangbeasiswa.png" alt="Tutor Tes" 
                    class="w-[400px] sm:w-[400px] md:w-[500px] lg:w-[900px] object-contain">
            </div>

        </div>
    </section>

    <!-- Section Ragam Beasiswa -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-8 xl:px-20 bg-[#f5f6fa] text-center">
        <h2 class="text-3xl md:text-5xl font-bold mb-20">
            <span class="text-[#151d52]">Ragam Beasiswa</span> <br> <span class="text-orange-500">Cakrawala Impian</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-12 md:gap-6 lg:gap-12 max-w-6xl mx-auto">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 relative bg-white rounded-3xl shadow-xl overflow-visible">
                <!-- Header Orange -->
                <div class="relative bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] rounded-t-3xl text-left pt-6 pb-32 pl-6">
                    <h3 class="absolute text-3xl md:text-2xl xl:text-3xl font-bold text-white"><span class="text-[#151d52]">Beasiswa</span><br>Aku Bisa</h3>
                    <!-- Gambar -->
                    <div class="absolute bottom-0 right-0">
                        <img src="/img/beasiswa1.png" alt="Beasiswa Prestasi" class="w-44 md:w-40 lg:w-46 xl:w-[11rem] 2xl:w-48">
                    </div>
                </div>

                <!-- Isi Card -->
                <div class="text-left text-sm text-[#151d52] p-6 space-y-2">
                    <p><b>Sasaran:</b> Siswa  dari kalangan duafa di yayasan atau panti asuhan.</p>
                    <p><b>Benefit:</b> Kursus gratis 100% pembelajaran bahasa asing atau softskill untuk siswa di panti/yayasan terpilih dalam satu kelas selama 3 bulan.</p>
                    <p><b>Seleksi:</b> Pengumpulan transkrip nilai rapor dan esai motivasi, sesi wawancara.</p>
                    <p><b>Tujuan:</b> Membantu anak-anak dhuafa memperoleh akses pendidikan unggul dengan berbagai kompetensi global.</p>
                    <div class="mt-4 text-center">
                        <button class="bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] text-white font-bold px-8 py-2 rounded-full shadow-md hover:scale-105 transition">Pilih ini</button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 relative bg-white rounded-3xl shadow-xl overflow-visible">
                <div class="relative bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] rounded-t-3xl text-left pt-6 pb-32 pl-6">
                    <h3 class="absolute text-3xl md:text-2xl xl:text-3xl font-bold text-white"><span class="text-[#151d52]">Beasiswa</span><br>Warga <br>Dunia</h3>
                    <div class="absolute bottom-0 right-0">
                        <img src="/img/beasiswa2.png" alt="Beasiswa Global" class="w-44 md:w-40 lg:w-46 xl:w-[11rem] 2xl:w-48">
                    </div>
                </div>
                <div class="text-left text-sm text-[#151d52] p-6 space-y-2">
                    <p><b>Sasaran:</b> Semua kalangan yang pernah menggunakan layanan cakrawala bahasa  dan bermaksud melanjutkan studi atau karir ke luar negeri.</p>
                    <p><b>Benefit:</b> Potongan 30% untuk biaya kursus persiapan studi dan karir.</p>
                    <p><b>Seleksi:</b> CV, surat motivasi, dan tujuan pengembangan karir.</p>
                    <p><b>Tujuan:</b> Meningkatkan daya saing SDM Indonesia di pasar global.</p>
                    <div class="mt-4 text-center">
                        <button class="bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] text-white font-bold px-8 py-2 rounded-full shadow-md hover:scale-105 transition">Pilih ini</button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 relative bg-white rounded-3xl shadow-xl overflow-visible">
                <div class="relative bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] rounded-t-3xl text-left pt-6 pb-32 pl-6">
                    <h3 class="absolute text-3xl md:text-2xl xl:text-3xl font-bold text-white"><span class="text-[#151d52]">Beasiswa</span><br>Semua <br>Bisa</h3>
                    <div class="absolute bottom-0 right-0">
                        <img src="/img/beasiswa3.png" alt="Beasiswa Kader" class="w-44 md:w-40 lg:w-46 xl:w-[11rem] 2xl:w-48">
                    </div>
                </div>
                <div class="text-left text-sm text-[#151d52] p-6 space-y-2">
                    <p><b>Sasaran:</b> Individu dari semua kalangan dan usia di daerah 3T yang minim akses pendidikan.</p>
                    <p><b>Benefit:</b> Kursus gratis 100% untuk 1 kelas bahasa asing atau softskill dengan fasilitas pembelajaran online.</p>
                    <p><b>Seleksi:</b> Wawancara singkat + surat keterangan institusi lokal.</p>
                    <p><b>Tujuan:</b> Pemerataan kesempatan belajar bahasa di seluruh Indonesia.</p>
                    <div class="mt-4 text-center">
                        <button class="bg-gradient-to-t from-[#c2410c] via-[#f97316] to-[#fdba74] text-white font-bold px-8 py-2 rounded-full shadow-md hover:scale-105 transition">Pilih ini</button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Tahapan Pengajuan Beasiswa CB -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-20 bg-[#f5f6fa] text-center">
        <h2 class="text-3xl md:text-5xl font-bold mb-20">
            Tahapan Pengajuan <span class="text-orange-500"><br>Beasiswa CB</span>
        </h2>

        <div class="relative max-w-6xl mx-2 md:mx-auto">
            <!-- Panah alur garis -->
            <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-300 z-0"></div>

            <div class="grid grid-cols-3 md:grid-cols-6 gap-8 relative z-10">
                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-portal.png" alt="Portal" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">2</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Daftar Melalui Portal Resmi</p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-berkas.png" alt="Berkas" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">1</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Melengkapi Berkas Persyaratan</p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-verifikasi.png" alt="Verifikasi" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">3</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Verifikasi Berkas</p>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-wawancara.png" alt="Wawancara" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">4</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Pengumuman Wawancara</p>
                </div>

                <!-- Step 5 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-seleksi.png" alt="Seleksi" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">5</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Ujian Seleksi Tahap 1 & 2</p>
                </div>

                <!-- Step 6 -->
                <div class="flex flex-col items-center">
                    <div class="relative">
                        <div class="bg-orange-500 w-24 h-24 md:w-28 md:h-28 rounded-full flex items-center justify-center shadow-lg">
                            <img src="/img/icon-pengumuman.png" alt="Pengumuman" class="w-12 md:w-16">
                        </div>
                        <div class="absolute -top-3 -left-3 w-8 h-8 bg-[#151d52] text-white rounded-full flex items-center justify-center font-bold text-sm md:text-lg">6</div>
                    </div>
                    <p class="font-bold text-xs md:text-sm xl:text-lg text-[#151d52] mt-5 leading-snug">Pengumuman Hasil Seleksi</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Section Form Pendaftaran Beasiswa -->
    <section class="py-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 2xl:gap-24">

            <!-- Text Kiri -->
            <div class="md:w-auto text-center md:text-left md:ml-8 lg:mx-0">
                <h2 class="text-3xl xl:text-4xl 2xl:text-5xl font-bold text-[#151d52] mb-4 leading-snug">
                    Daftarkan dirimu <br>untuk dapatkan <br>beasiswa dari <br>
                    <span class="text-[#f78a28]">Cakrawala Bahasa</span>
                </h2>
            </div>

            <!-- Form Kanan -->
            <div
            class="md:w-auto bg-white p-6 sm:p-8 xl:p-12 md:mr-8 lg:mx-0 rounded-2xl shadow-[0_6px_12px_rgba(0,0,0,0.40)]
                    opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el"
            >
            <form class="grid grid-cols-1 sm:grid-cols-2 gap-4 2xl:gap-6">

                <!-- Nama Lengkap -->
                <div class="flex flex-col">
                <label for="nama_lengkap" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Nama Lengkap
                </label>
                <input
                    id="nama_lengkap"
                    name="nama_lengkap"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Nama Panggilan -->
                <div class="flex flex-col">
                <label for="nama_panggilan" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Nama Panggilan
                </label>
                <input
                    id="nama_panggilan"
                    name="nama_panggilan"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Email -->
                <div class="flex flex-col">
                <label for="email" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Email
                </label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- No WhatsApp -->
                <div class="flex flex-col">
                <label for="no_whatsapp" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    No WhatsApp
                </label>
                <input
                    id="no_whatsapp"
                    name="no_whatsapp"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Alamat Kamu -->
                <div class="sm:col-span-2 flex flex-col">
                <label for="alamat" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Alamat Kamu
                </label>
                <input
                    id="alamat"
                    name="alamat"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Sumber CB (span full width) -->
                <div class="sm:col-span-2 flex flex-col">
                <label for="sumber_cb" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Darimana kamu tahu tentang CB?
                </label>
                <input
                    id="sumber_cb"
                    name="sumber_cb"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Kebijakan -->
                <p class="sm:col-span-2 text-xs md:text-sm text-gray-400 italic text-center">
                Dengan ini kamu menyetujui kebijakan kami
                </p>

                <!-- Submit Button -->
                <div class="sm:col-span-2 flex justify-center">
                    <button
                        type="submit"
                        class="mt-2 shadow-[7px_7px_17px_0px_#000000] bg-gradient-to-r from-orange-800 to-orange-400 text-white font-bold
                            text-xs md:text-sm lg:text-xl py-2 px-6 rounded-full transition-transform
                            hover:-translate-y-1"
                    >
                        Daftar Sekarang
                    </button>
                </div>

            </form>
            </div>

        </div>
    </section>

    <!-- Section Testimoni Beasiswa -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out bg-[#ededed] fade-el px-4 py-20 md:px-20 text-center">
        
        <h2 class="text-2xl md:text-4xl font-bold text-[#151d52] mb-16">
            Testimoni <span class="text-[#f78a28]">Penerima Beasiswa</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Terima kasih atas program beasiswa yang diberikan. Bantuan ini sangat membantu anak-anak dalam memenuhi kebutuhan belajar mereka.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Hj. Hasnah Djamaluddin</p>
                        <p class="text-gray-400 text-sm">Pengelola-Panti Asuhan Rahmatullah, Makasar</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Beasiswa ini  menjadi motivasi bagi anak-anak untuk terus berkembang dan belajar lebih giat.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Iim Salimah</p>
                        <p class="text-gray-400 text-sm">Pengelola-Home Children Center, Jakarta</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Program beasiswa pembelajaran bahasa bersama native speaker ini sangat baik dan memberikan dampak positif bagi anak-anak.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Hilal Achmad</p>
                        <p class="text-gray-400 text-sm">Direktur Utama-Askar Kauni </p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Program beasiswa ini sangat membantu dalam mendukung proses belajar. Penerima beasiswa dapat terus belajar tanpa terbebani biaya, dengan tutor native speaker yang membuat pembelajaran lebih menarik dan berkualitas
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Lukman</p>
                        <p class="text-gray-400 text-sm">Pengelola-Panti Asuhan Muhammadiyah, Sawangan</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Akses belajar gratis yang diberikan membantu saya dalam belajar bahasa Turki.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Windasari</p>
                        <p class="text-gray-400 text-sm">Mahasiswa-UNIMUDA Sorong, Papua</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Saya merasa sangat terbantu karena dapat mengakses materi pembelajaran berkualitas tanpa harus mengeluarkan biaya yang besar.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Rui Porug Jabat</p>
                        <p class="text-gray-400 text-sm">Pekerja-Program Ausbildung, Jerman</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
    <x-floating-wa />
    <script src="/js/animationsection.js"></script>
</body>
</html>