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
                    Gabung jadi <br> member kami
                </h1>
                <p class="text-white text-sm sm:text-base xl:text-lg 2xl:text-xl leading-relaxed mb-8 xl:max-w-lg 2xl:max-w-xl">
                    Dapatkan berbagai keuntungan dengan bergabung menjadi anggota di Cakrawala Bahasa
                </p>

                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Gabung Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end">
                <img src="/img/JoinMember.png" alt="Tutor Tes" 
                    class="w-[400px] sm:w-[400px] md:w-[500px] lg:w-[900px] object-contain">
            </div>

        </div>
    </section>

    <!-- Section Form Pendaftaran -->
    <section class="py-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 2xl:gap-24">

            <!-- Text Kiri -->
            <div class="md:w-auto text-center md:text-left md:ml-8 lg:mx-0">
                <h2 class="text-3xl xl:text-4xl 2xl:text-5xl font-bold text-[#151d52] mb-4 leading-snug">
                    Daftarkan dirimu <br>langsung jadi <br>bagian dari <br>
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

    <!-- Section Kenapa Gabung Member -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-10 px-4 md:px-32 text-center">

        <h2 class="text-2xl md:text-3xl lg:text-5xl font-bold text-[#151d52] mb-10 md:mb-20">
            Kenapa Harus Gabung Member <span class="text-[#f78a28]"><br>Cakrawala Bahasa?</span>
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 xl:gap-16 max-w-7xl mx-auto">

            <!-- Card 1 -->
            <div class="flex flex-col items-center">
                <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-24 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] flex items-center justify-center mb-4 md:mb-8">
                    <img src="/img/icon-diskon.png" alt="Diskon Spesial" class="w-12 md:w-16">
                </div>
                <h3 class="font-bold text-base md:text-xl lg:text-2xl text-[#151d52] mb-2 md:mb-5 leading-snug">
                    Dapatkan <br> Komisi
                </h3>
                <p class="text-gray-500 text-xs md:text-base lg:text-lg leading-relaxed max-w-sm">
                    Cukup dengan gabung dan ajak teman  kamu, kamu bisa dapat komisi.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center">
                <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-24 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] flex items-center justify-center mb-4 md:mb-8">
                    <img src="/img/icon-premium.png" alt="Konten Premium" class="w-12 md:w-16">
                </div>
                <h3 class="font-bold text-base md:text-xl lg:text-2xl text-[#151d52] mb-2 md:mb-5 leading-snug">
                    Akses Konten <br> Premium
                </h3>
                <p class="text-gray-500 text-xs md:text-base lg:text-lg leading-relaxed max-w-sm">
                    Dapatkan berbagai akses premium untuk kebutuhan pembelajaran
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center">
                <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-24 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-[0_6px_12px_rgba(0,0,0,0.40)] flex items-center justify-center mb-4 md:mb-8">
                    <img src="/img/icon-event.png" alt="Event" class="w-12 md:w-16">
                </div>
                <h3 class="font-bold text-base md:text-xl lg:text-2xl text-[#151d52] mb-2 md:mb-5 leading-snug">
                    Undangan <br> Special Event
                </h3>
                <p class="text-gray-500 text-xs md:text-base lg:text-lg leading-relaxed max-w-sm">
                    Undangan spesial berbagai event yang diadakan oleh Cakrawala Bahasa
                </p>
            </div>

        </div>

    </section>

    <!-- Section Beda Pilihan Beda Keuntungan -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 px-4 md:px-8 xl:px-32 text-center">

        <h2 class="text-3xl md:text-5xl font-bold text-[#151d52] mb-20">
            Beda <span class="text-[#f78a28]">Pilihan</span>, Beda <span class="text-[#f78a28]">Keuntungan</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 xl:gap-10 max-w-7xl mx-auto">

            <!-- Gold Member -->
            <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] relative">
                <div class="bg-gradient-to-t from-[#9c8114] to-[#e4bc1d] py-6 px-8 text-left rounded-t-3xl">
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Gold</h3>
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Member</h3>
                    <div class="absolute top-12 md:top-10 xl:top-12 2xl:top-14 right-14 transform translate-x-1/3 -translate-y-1/3">
                        <img src="/img/medal-gold.png" alt="Gold Medal" class="w-28 md:w-24 xl:w-28 2xl:w-32 h-auto">
                    </div>
                </div>
                <div class="pt-10 px-8 pb-10 text-justify">
                    <h4 class="font-bold mb-3 text-[#151d52]">Keuntungan :</h4>
                    <ul class="list-decimal list-outside pl-5 text-xs xl:text-sm 2xl:text-base text-gray-600 leading-relaxed italic space-y-1">
                        <li>Akses komunitas eksklusif & grup WhatsApp</li>
                        <li>Unlock semua fitur premium CB</li>
                        <li>1x/bulan: Native Speaker Talk</li>
                        <li>1x/bulan: Kelas Bahasa & Soft Skill gratis</li>
                        <li>1x/bulan: Sharing karir & studi luar negeri</li>
                        <li>Mentoring eksklusif (grup kecil)</li>
                        <li>Info lengkap kelas, karir & beasiswa</li>
                        <li>CB Kit (Kaos + ID Card e-money)</li>
                        <li>Referral komisi 20%</li>
                    </ul>
                </div>
            </div>

            <!-- Silver Member -->
            <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] relative">
                <div class="bg-gradient-to-t from-[#a1a1a1] to-[#e5e5e5] py-6 px-8 text-left rounded-t-3xl">
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Silver</h3>
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Member</h3>
                    <div class="absolute top-12 md:top-10 xl:top-12 2xl:top-14 right-14 transform translate-x-1/3 -translate-y-1/3">
                        <img src="/img/medal-silver.png" alt="Silver Medal" class="w-28 md:w-24 xl:w-28 2xl:w-32 h-auto">
                    </div>
                </div>
                <div class="pt-10 px-8 pb-10 text-justify">
                    <h4 class="font-bold mb-3 text-[#151d52]">Keuntungan :</h4>
                    <ul class="list-decimal list-outside pl-5 text-xs xl:text-sm 2xl:text-base text-gray-600 leading-relaxed italic space-y-1">
                        <li>Akses grup WhatsApp membership</li>
                        <li>Unlock fitur komunitas, game & ujian</li>
                        <li>1x/bulan: Native Speaker Talk</li>
                        <li>1x/bulan: Kelas Bahasa & Soft Skill gratis</li>
                        <li>1x/bulan: Sharing karir & studi luar negeri</li>
                        <li>Info kelas, karir & beasiswa</li>
                        <li>CB Kit (Kaos + ID Card)</li>
                        <li>Referral komisi 15%</li>
                        <li>Kesempatan upgrade ke Gold</li>
                    </ul>
                </div>
            </div>

            <!-- Bronze Member -->
            <div class="transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] relative">
                <div class="bg-gradient-to-t from-[#7b450f] to-[#ca7b2b] py-6 px-8 text-left rounded-t-3xl">
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Bronze</h3>
                    <h3 class="text-white text-3xl md:text-2xl xl:text-3xl 2xl:text-5xl font-bold">Member</h3>
                    <div class="absolute top-12 md:top-10 xl:top-12 2xl:top-14 right-14 transform translate-x-1/3 -translate-y-1/3">
                        <img src="/img/medal-bronze.png" alt="Bronze Medal" class="w-28 md:w-24 xl:w-28 2xl:w-32 h-auto">
                    </div>
                </div>
                <div class="pt-10 px-8 pb-10 text-justify">
                    <p class="text-xs xl:text-sm 2xl:text-base list-inside text-gray-600 leading-relaxed italic">(Akses Dasar & Komunitas)</p>
                    <h4 class="font-bold mb-3 text-[#151d52]">Keuntungan :</h4>
                    <ul class="list-decimal list-outside pl-5 text-xs xl:text-sm 2xl:text-base text-gray-600 leading-relaxed italic space-y-1">
                        <li>Akses grup WhatsApp membership</li>
                        <li>Unlock fitur komunitas & game</li>
                        <li>1x/bulan: Native Speaker Talk</li>
                        <li>1x/bulan: Kelas Bahasa gratis</li>
                        <li>Info kelas, karir & beasiswa</li>
                        <li>Upgrade ke Silver/Gold</li>
                        <li>Referral komisi 10%</li>
                        <li>Kesempatan upgrade ke Gold</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Testimoni Membership -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out bg-[#f5f6fa] fade-el px-4 py-20 md:px-20 text-center">
        
        <h2 class="text-2xl md:text-4xl font-bold text-[#151d52] mb-16">
            Testimoni <span class="text-[#f78a28]">Membership</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Melalui komunitas member yang disediakan, saya dapat membangun banyak koneksi serta memperoleh berbagai kesempatan baru.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Azelia Nasywa</p>
                        <p class="text-gray-400 text-sm">Siswa, SMA Muhammadiyah 1 Jombang</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Materi belajarnya mudah dipahami. Dengan membership, saya bisa belajar lebih fokus dan hemat biaya.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Khalisha</p>
                        <p class="text-gray-400 text-sm">Siswa, Homeschooling Primagama</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Materi dan info tambahan yang disediakan  sangat menunjang pemahaman saya.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Devanda Zaskia</p>
                        <p class="text-gray-400 text-sm">Siswa, SMP Sultan Agung 4</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Saya dapat menambah relasi dan saling membantu mengupgrade kemampuan berbahasa asing.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Reza Dysta</p>
                        <p class="text-gray-400 text-sm">Mahasiswa, Kırklareli Üniversitesi</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Dengan menjadi member saya mendapat info lebih banyak tentang bahasa dan budaya Turki.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Salmah</p>
                        <p class="text-gray-400 text-sm">Dosen, Univ. Pakuan</p>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base text-justify">
                    Saya mendapatkan banyak informasi beasiswa yang sangat bermanfaat untuk persiapan studi saya ke depannya.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Siti Komariah</p>
                        <p class="text-gray-400 text-sm">Mahasiswa, UNISBA</p>
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