<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Section Jadi Partner -->
    <section class="relative bg-gradient-to-b from-[#1722B0] via-[#3A4FD1] to-[#5F7FF5] overflow-hidden h-[30rem] xl:h-screen">
        {{-- city-bg mobile: lebar penuh, tinggi otomatis --}}
        <img
            src="{{ asset('/img/city-bg.png') }}"
            alt="kota"
            class="md:hidden pointer-events-none select-none absolute right-0 bottom-0
                w-full h-[20rem] opacity-80 z-0"
        />

        {{-- city-bg tablet+desktop --}}
        <img
            src="{{ asset('/img/city-bg.png') }}"
            alt="kota"
            class="hidden md:block pointer-events-none select-none absolute right-0 bottom-0
                md:h-[30rem] lg:h-[40rem] 2xl:h-[50rem] opacity-80 z-0"
        />

        {{-- partner desktop --}}
        <img
            src="{{ asset('/img/person-left.png') }}"
            alt="partner kiri"
            class="hidden md:block pointer-events-none select-none absolute left-0 bottom-0
                md:h-[25rem] xl:h-[35rem] 2xl:h-[40rem] z-0"
        />
        <img
            src="{{ asset('/img/person-right.png') }}"
            alt="partner kanan"
            class="hidden md:block pointer-events-none select-none absolute right-0 bottom-0
                md:h-[25rem] xl:h-[35rem] 2xl:h-[40rem] z-0"
        />

        {{-- konten: always center --}}
        <div class="-mt-24 md:mt-0 absolute inset-0 z-10 flex flex-col items-center justify-center text-center px-6">
            <h1 class="text-white font-bold leading-tight
                    text-3xl md:text-4xl xl:text-6xl 2xl:text-7xl">
            Jadi Partner Global<br>
            Cakrawala Bahasa
            </h1>
            <p class="mt-4 text-white leading-relaxed
                    text-xs md:text-sm lg:text-lg">
            Nikmati berbagai macam manfaat dengan<br>
            bergabung menjadi mitra di Cakrawala Bahasa.<br>
            Mulai dari fasilitas, serta pelayanan yang<br>
            mudah tak terbatas
            </p>
            <a
            href="#"
            class="mt-2 md:mt-6 inline-block transform transition-all duration-200 hover:-translate-y-2 bg-gradient-to-r shadow-[7px_7px_17px_0px_#000000] from-orange-800 to-orange-400 font-semibold
                    text-xs md:text-sm lg:text-lg
                    px-2 md:px-5 py-2 md:py-2 rounded-full text-white"
            >
            Jadi Partner Sekarang &rarr;
            </a>
        </div>

        {{-- partner mobile: di bawah, proporsional --}}
        <div class="md:hidden absolute bottom-0 w-full flex justify-center z-10">
            <img
            src="{{ asset('/img/person-left.png') }}"
            alt="partner kiri"
            class="h-44 w-auto"
            />
            <img
            src="{{ asset('/img/person-right.png') }}"
            alt="partner kanan"
            class="h-44 w-auto"
            />
        </div>
    </section>

    <!-- Section Form Pendaftaran Mitra -->
    <section class="py-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10">

            <!-- Text Kiri -->
            <div class="md:w-auto text-center md:text-left">
                <h2 class="text-3xl xl:text-5xl 2xl:text-6xl font-bold text-[#151d52] mb-4 leading-snug">
                    Daftarkan dirimu <br>untuk jadi mitra <br>
                    <span class="text-[#f78a28]">Cakrawala Bahasa</span>
                </h2>
            </div>

            <!-- Form Kanan -->
            <div
            class="md:w-1/2 bg-white p-6 sm:p-8 xl:p-12 rounded-2xl shadow-[0_6px_12px_rgba(0,0,0,0.40)]
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

                <!-- Nama Perusahaan -->
                <div class="flex flex-col">
                <label for="nama_perusahaan" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Nama Perusahaan
                </label>
                <input
                    id="nama_perusahaan"
                    name="nama_perusahaan"
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

                <!-- Tujuan Kerjasama -->
                <div class="flex flex-col">
                <label for="tujuan" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Tujuan Kerjasama
                </label>
                <input
                    id="tujuan"
                    name="tujuan"
                    type="text"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 transition"
                />
                </div>

                <!-- Jenis Kerjasama -->
                <div class="flex flex-col">
                <label for="jenis" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Jenis Kerjasama
                </label>
                <input
                    id="jenis"
                    name="jenis"
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

                <!-- Pesan (textarea full width) -->
                <div class="sm:col-span-2 flex flex-col">
                <label for="pesan" class="text-xs md:text-sm xl:text-base text-[#151d52] mb-2">
                    Pesan yang ingin disampaikan
                </label>
                <textarea
                    id="pesan"
                    name="pesan"
                    rows="4"
                    class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-xs md:text-sm xl:text-base
                        focus:bg-white focus:border-[#f78a28] focus:ring-2 focus:ring-[#f78a28]/30 resize-none transition"
                ></textarea>
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

    <!-- Section Kenapa Jadi Partner -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-10 lg:py-16 px-4 md:px-8 xl:px-32 text-center">

        <h2 class="text-xl md:text-4xl xl:text-5xl font-bold text-[#151d52] mb-20">
            Kenapa Harus Jadi Partner <span class="text-[#f78a28]"><br>Cakrawala Bahasa?</span>
        </h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 xl:gap-16 max-w-7xl mx-auto">

            <!-- Card 1 -->
            <div class="flex flex-col items-center">
                <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-lg flex items-center justify-center mb-8">
                    <img src="/img/icon-akses.png" alt="Akses" class="w-[90px] p-2 md:w-auto">
                </div>
                <h3 class="font-bold text-sm md:text-lg lg:text-xl xl:text-2xl text-[#151d52] mb-5 leading-snug">Akses Sumber <br> Daya Pendidikan</h3>
                <p class="text-gray-500 text-xs md:text-sm xl:text-lg leading-relaxed max-w-sm">
                    Anda akan mendapatkan akses sumber pendidikan yang terlengkap, dan mudah untuk diakses kapanpun jika dibutuhkan
                </p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center">
                <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-lg flex items-center justify-center mb-8">
                    <img src="/img/icon-jaringan.png" alt="Jaringan" class="w-[90px] p-2 md:w-auto">
                </div>
                <h3 class="font-bold text-sm md:text-lg lg:text-xl xl:text-2xl text-[#151d52] mb-5 leading-snug">Jaringan <br> Profesional</h3>
                <p class="text-gray-500 text-xs md:text-sm xl:text-lg leading-relaxed max-w-sm">
                    Dapatkan akses, peluang, dan dukungan yang lebih luas dan terpercaya untuk kebutuhan pendidikan maupun bisnis
                </p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center">
                <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 h-24 md:w-32 md:h-32 rounded-full bg-[#f78a28] shadow-lg flex items-center justify-center mb-8">
                    <img src="/img/icon-kolaborasi.png" alt="Kolaborasi" class="w-[90px] p-2 md:w-auto">
                </div>
                <h3 class="font-bold text-sm md:text-lg lg:text-xl xl:text-2xl text-[#151d52] mb-5 leading-snug">Kolaborasi <br> Proyek</h3>
                <p class="text-gray-500 text-xs md:text-sm xl:text-lg leading-relaxed max-w-sm">
                    Satukan beragam keahlian, efesiensi waktu dan tenaga dengan bekerjasama dalam setiap proyek
                </p>
            </div>

        </div>

    </section>

    <!-- Section Testimoni Partnership -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 bg-[#ededed] ease-out fade-el px-4 py-20 md:px-20 text-center">
        
        <h2 class="text-2xl md:text-4xl font-bold text-[#151d52] mb-16">
            Testimoni <span class="text-[#f78a28]">Partnership</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Kolaborasi ini mendukung penyelenggaraan berbagai kelas bahasa yang didampingi oleh pengajar kompeten dari Cakrawala Bahasa.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Arsyah Nanda</p>
                        <p class="text-gray-400 text-sm">Founder - Diaspora Mengajar</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Kerja sama telah berjalan lancar secara berkelanjutan dengan sangat baik dan kooperatif, diharapkan dapat semakin baik dan berkelanjutan.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Yuanita Susana</p>
                        <p class="text-gray-400 text-sm">Head Master-Sekolah Kak Seto</p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Kerja sama ini membantu berbagai kebutuhan  program kami. Tim sangat kooperatif dan solutif.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Anissa Sammy</p>
                        <p class="text-gray-400 text-sm">Project Team - Cakap</p>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Melalui kerja sama sebagai media partner. Kolaborasi ini berjalan efektif dan mendukung kebutuhan program secara optimal.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Victoria</p>
                        <p class="text-gray-400 text-sm">Partnership Team - Sejuta Cita</p>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Kerja sama ini berjalan sangat baik, dengan tim Cakrawala Bahasa yang responsif dan terbuka dalam menyampaikan informasi rekrutmen.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Hikmah</p>
                        <p class="text-gray-400 text-sm">Partnership Team - Glints.id</p>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6 text-sm xl:text-base">
                    Kemitraan berjalan sangat baik, dengan dukungan tim Cakrawala Bahasa yang komunikatif.
                </p>
                <div class="flex items-center">
                    <div>
                        <p class="font-bold text-[#151d52]">Devi</p>
                        <p class="text-gray-400 text-sm">Partnership Team - Aiesec Univ. Indonesia</p>
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