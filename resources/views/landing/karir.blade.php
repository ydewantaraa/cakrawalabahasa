<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- WRAPPER UNTUK SEARCH & JOBS -->
    <div x-data="jobSection()">
        <!-- Section Temukan Karir -->
        <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 ps-4 pb-0 md:pr-0 2xl:ps-20 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">
            
            <!-- Hiasan pattern -->
            <img src="/img/hiasan1.png" alt="Pattern" 
                class="absolute right-0 bottom-0 h-[300px] md:h-[380px] xl:h-[500px] 2xl:h-[600px] w-auto z-0 md:bottom-0">

            <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

                <!-- Teks Kiri -->
                <div class="md:w-1/2 text-left text-[#151d52] md:pl-8 lg:pl-16 mb-10 md:mb-0">
                    <h1 class="text-3xl sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                        Temukan Karir <br> Impianmu disini
                    </h1>
                    <p class="text-white text-sm sm:text-base xl:text-lg 2xl:text-xl leading-relaxed mb-8 xl:max-w-lg 2xl:max-w-xl">
                        Nikmati bekerja sesuai minat & bakat kamu, dengan lingkungan yang kondusif lagi asik.
                    </p>

                    <!-- Search Bar -->
                    <div class="flex bg-white rounded-full overflow-hidden w-full max-w-xs md:max-w-sm xl:max-w-md shadow-[7px_7px_17px_0px_#000000] transform transition-all duration-200 hover:-translate-y-1">
                        <input
                            x-model="searchQuery"
                            type="text"
                            class="flex-grow px-4 py-2 sm:py-3 text-[#151d52] text-xs md:text-sm lg:text-lg focus:outline-none"
                            placeholder="Mau cari Posisi apa?"
                        >
                        <button
                            @click="selectedCategory = null"
                            class="bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 px-4 flex items-center justify-center"
                        >
                            <svg class="w-5 sm:w-6 h-5 sm:h-6 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                <path d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Gambar Orang -->
                <div class="md:w-1/2 flex justify-end items-end">
                    <img src="/img/karir-hero.png" alt="Tutor Tes" 
                        class="w-[400px] sm:w-[400px] md:w-[500px] lg:w-[900px] object-contain">
                </div>

            </div>
        </section>

        <!-- Section Lowongan Tersedia -->
        <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-10 xl:px-20">

            <h2 class="text-3xl md:text-5xl font-bold text-[#151d52] text-center mb-16">
                Lowongan <span class="text-[#f78a28]">Tersedia</span>
            </h2>

            <div class="flex flex-col md:flex-row gap-10">

                <!-- Sidebar Kategori -->
                <div class="md:w-1/4 flex flex-col justify-start">
                    <div class="relative pl-6">
                        <!-- Garis vertical -->
                        <div class="absolute top-0 left-2 w-0.5 bg-gray-300 h-full"></div>

                        <template x-for="(cat, idx) in categories" :key="idx">
                            <div class="flex items-center">
                                <!-- Slider aktif -->
                                <div class="w-3 h-12 flex items-center justify-center">
                                    <div :class="selectedCategory === cat ? 'w-2 h-10 rounded-full bg-[#151d52]' : 'w-2 h-2 rounded-full bg-gray-300 transition-all duration-300'"></div>
                                </div>
                                <!-- Text filter -->
                                <button @click="selectedCategory = cat"
                                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 text-left pl-4 text-sm lg:text-base xl:text-lg 2xl:text-xl font-semibold"
                                    :class="selectedCategory === cat ? 'text-[#151d52]' : 'text-gray-400'">
                                    <span x-text="cat"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Daftar Lowongan -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-10">
                    <template x-for="(job, idx) in filteredJobs" :key="idx">
                        <div :class="selectedJob === job ? 'bg-[#151d52] text-white' : 'bg-white text-[#151d52]'" 
                            class="p-6 rounded-3xl shadow-lg transition-all duration-300 relative cursor-pointer"
                            @click="selectedJob = job">

                            <h3 class="font-bold text-lg lg:text-xl xl:text-2xl mb-4" x-text="job.title"></h3>

                            <div class="flex flex-wrap gap-2 mb-4">
                                <template x-for="tag in job.tags">
                                    <span :class="selectedJob === job ? 'bg-white text-[#151d52]' : 'bg-[#e5e7eb] text-[#6b7280]'"
                                        class="px-3 py-1 rounded-full text-xs xl:text-sm font-medium">
                                        <span x-text="tag"></span>
                                    </span>
                                </template>
                            </div>

                            <div>
                                <h4 class="font-semibold text-sm xl:text-base mb-2">Persyaratan :</h4>
                                <ul class="list-disc list-inside text-sm leading-relaxed">
                                    <template x-for="req in job.requirements">
                                        <li x-text="req"></li>
                                    </template>
                                </ul>
                            </div>

                            <div class="flex justify-center">
                                <button class="hover:shadow-[7px_7px_17px_0px_#000000] transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 mt-6 px-5 py-2 rounded-full bg-gradient-to-r from-orange-800 to-orange-400 text-white font-semibold text-xs lg:text-sm">
                                    Baca Lebih Lanjut
                                </button>
                            </div>

                        </div>
                    </template>
                </div>

            </div>
        </section>
    </div>

    <!-- Section Form Pendaftaran Karir -->
    <section class="py-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10 2xl:gap-24">

            <!-- Text Kiri -->
            <div class="md:w-auto text-center md:text-left md:ml-8 lg:mx-0">
                <h2 class="text-3xl xl:text-4xl 2xl:text-5xl font-bold text-[#151d52] mb-4 leading-snug">
                    Daftarkan dirimu <br>jadi bagian <br>dari kami, <br>
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

    <!-- Section Manfaat Jadi Team -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-10 2xl:px-32 text-center">
        <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-[#151d52] mb-16 leading-snug">
            Manfaat Jadi Team <br><span class="text-[#f78a28]">Cakrawala Bahasa</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-6xl mx-auto">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 flex items-start bg-[#f5f5f5] p-5 sm:p-8 rounded-3xl shadow-md text-left">
                <div class="w-14 h-14 rounded-full bg-[#f78a28] flex items-center justify-center mr-4 sm:mr-6 flex-shrink-0">
                    <img src="/img/icon-flexibel.png" alt="icon" class="w-6 h-6 sm:w-8 sm:h-8">
                </div>
                <div>
                    <h3 class="font-bold text-base md:text-lg xl:text-2xl text-[#151d52] mb-2 sm:mb-3">Lingkungan Kerja<br>Fleksibel dan Adaptif</h3>
                    <p class="text-[#555] leading-relaxed text-xs md:text-sm lg:text-base text-justify">
                        Sebagai platform online, Cakrawala Bahasa menawarkan fleksibilitas kerja jarak jauh (remote),
                        waktu kerja yang adaptif, dan budaya kerja yang menghargai kemandirian serta keseimbangan hidup.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 flex items-start bg-[#f5f5f5] p-5 sm:p-8 rounded-3xl shadow-md text-left">
                <div class="w-14 h-14 rounded-full bg-[#f78a28] flex items-center justify-center mr-4 sm:mr-6 flex-shrink-0">
                    <img src="/img/icon-pengembangan.png" alt="icon" class="w-6 h-6 sm:w-8 sm:h-8">
                </div>
                <div>
                    <h3 class="font-bold text-base md:text-lg xl:text-2xl text-[#151d52] mb-2 sm:mb-3">Peluang Pengembangan</h3>
                    <p class="text-[#555] leading-relaxed text-xs md:text-sm lg:text-base text-justify">
                        Di Cakrawala Bahasa, setiap anggota tim didorong untuk terus belajar dan berkembang—baik dalam keterampilan mengajar, teknologi edukasi, maupun pengembangan soft skills.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 flex items-start bg-[#f5f5f5] p-5 sm:p-8 rounded-3xl shadow-md text-left">
                <div class="w-14 h-14 rounded-full bg-[#f78a28] flex items-center justify-center mr-4 sm:mr-6 flex-shrink-0">
                    <img src="/img/icon-team.png" alt="icon" class="w-6 h-6 sm:w-8 sm:h-8">
                </div>
                <div>
                    <h3 class="font-bold text-base md:text-lg xl:text-2xl text-[#151d52] mb-2 sm:mb-3">Diri dan Karier</h3>
                    <p class="text-[#555] leading-relaxed text-xs md:text-sm lg:text-base text-justify">
                        Kamu akan bergabung dalam tim yang suportif, terbuka, dan saling mendorong untuk berkembang. Perbedaan dihargai, ide-ide baru didengarkan, dan semua anggota tim dianggap berperan penting.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 flex items-start bg-[#f5f5f5] p-5 sm:p-8 rounded-3xl shadow-md text-left">
                <div class="w-14 h-14 rounded-full bg-[#f78a28] flex items-center justify-center mr-4 sm:mr-6 flex-shrink-0">
                    <img src="/img/icon-inovasi.png" alt="icon" class="w-6 h-6 sm:w-8 sm:h-8">
                </div>
                <div>
                    <h3 class="font-bold text-base md:text-lg xl:text-2xl text-[#151d52] mb-2 sm:mb-3">Koneksi Luas,<br>Peluang Tanpa Batas</h3>
                    <p class="text-[#555] leading-relaxed text-xs md:text-sm lg:text-base text-justify">
                        Kami memiliki jaringan relasi yang kuat baik di tingkat nasional maupun internasional. Bergabung bersama kami berarti menjadi bagian dari komunitas yang terhubung dengan berbagai tim dan institusi di dalam dan luar negeri untuk membuka berbagai peluang.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- Section Testimoni Karier & Internship -->
    <section class="opacity-0 bg-[#ededed] translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-10 2xl:px-32 text-center">

        <!-- Testimoni CB’s Team -->
        <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-[#151d52] mb-16">
            Testimoni <span class="text-[#f78a28]">CB’s Team</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-10 mb-24">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Selama di Cakrawala Bahasa, aku belajar bahwa setiap karakter itu unik dan setiap manusia itu setara. Aku juga belajar bagaimana cara berkomunikasi yang baik, pendekatan karakter individu, dan membentuk team building yang kuat.
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">Hanifah Ellia Guvranny</div>
                        <div class="text-xs text-gray-500">Vice Manager of HR</div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Banyak hal baru yang aku temukan di Cakrawala Bahasa salah satunya relasi, semua anggota cakrawala Bahasa family friendly banget bahkan ga hanya di Indonesia, aku dapat teman baru dari berbagai negara dan aku banyak belajar di Cakrawala Bahasa.
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">Nura</div>
                        <div class="text-xs text-gray-500">Manager of Operator</div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Saya merasa dihargai sebagai bagian dari tim. Setiap ide didengarkan dan ada banyak kesempatan untuk belajar hal baru.
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">M. Ilham Bismo</div>
                        <div class="text-xs text-gray-500">Staff Program</div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Testimoni Internship -->
        <h2 class="text-2xl sm:text-3xl md:text-5xl font-bold text-[#151d52] mb-16">
            Testimoni <span class="text-[#f78a28]">Internship</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-10">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Aku menikmati banget tugas-tugas yang diberikan selama magang di CB dan emang suka banget sama bidang HR yang aku jalani disini. Lingkungan kerjanya asik banget bukan cuma mengedepankan profesionalitas tapi kekeluargaannya juga kuat. Dari sesama anak magang maupun atasan juga baik semua dan saling suportif. Sejauh ini aku ngerasa cocok banget sama culture company dan visi CB.
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">Tami</div>
                        <div class="text-xs text-gray-500">Magangers HR</div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Magang di CB seru banget, senior-seniornya ramah dan mau membimbing anak magangnya. Sesama anak magang juga berasa deket banget walaupun belom pernah ketemu secara langsung. kerasa feel kekeluargaannya namun tetap menjaga profesionalitas. Selama jadi graphic designer di CB, aku juga bisa mengembangkan skill ku dalam mendesain dan mengeksplor berbagai gaya desain yang baru. Pokoknya seneng banget deh magang di CB!
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">Indah</div>
                        <div class="text-xs text-gray-500">Magangers Graphic Design</div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white p-6 sm:p-8 rounded-3xl shadow-md text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-xs md:text-sm lg:text-base 2xl:text-lg text-[#333] leading-relaxed mb-5 text-justify">
                    Sebagai fresh graduate, tentunya aku memerlukan pengalaman yang mumpuni sebelum benar benar terjun ke dunia pekerjaan. Pengalaman ini aku dapatkan selama menjadi Magangers di Cakrawala Bahasa sebagai Social Media Specialist. Aku mendapatkan banyak ilmu di bidang sosial media, tidak hanya mengelola akun tetapi juga mendapatkan kemampuan untuk menganalisis audiens di tiap sosial media tersebut dan content management.
                </p>
                <div class="flex items-center gap-3">
                    <div>
                        <div class="font-bold text-sm sm:text-base text-[#151d52]">Restu Kusuma S.</div>
                        <div class="text-xs text-gray-500">Magangers Social Media Specialist</div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <x-footer />
    <x-floating-wa />

    <!-- Alpine.js Component -->
    <script>
        function jobSection() {
            return {
                // tambahkan:
                searchQuery: '',

                categories: [
                    'General Management',
                    'Program Management',
                    'Marketing Management',
                    'Finance & Accounting',
                    'IT & Programming',
                    'Media & Socials',
                    'Tutor & Native Speaker',
                    'Internship',
                ],
                selectedCategory: 'General Management',
                selectedJob: null,
                jobs: [
                    { category: 'Program Management', title: 'Product Manager', tags: ['Full Time', 'Senior'], requirements: ['Pengalaman 3 tahun', 'Analisa pasar', 'Leadership', 'Problem solving'] },
                    { category: 'Marketing Management', title: 'Sales Executive', tags: ['Full Time'], requirements: ['Negosiasi', 'Target-oriented', 'Komunikasi', 'Mobile'] },
                    { category: 'Marketing Management', title: 'Digital Marketing Specialist', tags: ['Part Time', 'Remote'], requirements: ['FB Ads, Google Ads', 'SEO/SEM', 'Analisa data', 'Kreatif campaign'] },
                    { 
                    category: 'Marketing Management', 
                    title: 'Freelance Marketing', 
                    tags: ['Freelance', 'Remote'], 
                    requirements: ['Strategi pemasaran', 'Lead generation', 'Komunikasi & negosiasi', 'Target-oriented'] 
                    },
                    { 
                    category: 'Marketing Management', 
                    title: 'Partnership Specialist', 
                    tags: ['Full Time'], 
                    requirements: ['Membangun relasi bisnis', 'Business development', 'Negosiasi kerjasama', 'Analisa peluang pasar'] 
                    },
                    { category: 'Finance & Accounting', title: 'Finance Officer', tags: ['Full Time'], requirements: ['Laporan keuangan', 'Accounting', 'Teliti', 'Perpajakan'] },
                    { category: 'Finance & Accounting', title: 'Payroll Staff', tags: ['Full Time'], requirements: ['Payroll sistem', 'Administrasi', 'Rekap absensi', 'Detail oriented'] },
                    { category: 'General Management', title: 'HR Officer', tags: ['Full Time'], requirements: ['Rekrutmen', 'Training', 'HRIS', 'Interpersonal'] },
                    { category: 'General Management', title: 'Office Manager', tags: ['Full Time'], requirements: ['Operasional kantor', 'Logistik', 'Koordinasi divisi', 'Organisasi'] },
                    { category: 'IT & Programming', title: 'UI/UX Designer', tags: ['Full Time'], requirements: ['Menguasai Figma', 'Design thinking', 'Kolaborasi tim produk', 'Portfolio design'] },
                    { category: 'Media & Socials', title: 'Copywriter', tags: ['Full Time', 'Social Media Specialist'], requirements: ['Menulis Kreatif', 'Media Sosial', 'Tren Konten Digital', 'Deadline'] },
                    { category: 'Media & Socials', title: 'Video Editor', tags: ['Freelance'], requirements: ['Editing storytelling', 'Software editing', 'Kreatif', 'Deadline'] },
                ],
                // ubah menjadi:
                get filteredJobs() {
                    const q = this.searchQuery.trim().toLowerCase();
                    if (q) {
                    return this.jobs.filter(job =>
                        job.title.toLowerCase().includes(q)
                    );
                    }
                    return this.jobs.filter(job =>
                    job.category === this.selectedCategory
                    );
                }
            }
        }
    </script>

    <script src="/js/animationsection.js"></script>
</body>
</html>