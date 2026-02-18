<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Section CB Extras -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-24 md:ps-4 pb-0 md:pr-0 2xl:ps-20 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">
        
        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[330px] md:h-[500px] xl:h-[600px] 2xl:h-[720px] w-auto z-0 md:bottom-0">

        <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left md:pl-8 lg:pl-16 mb-10 md:mb-0 md:-mt-28 xl:-mt-32 2xl:-mt-36">
                <p class="text-[#151d52] font-semibold text-xl md:text-3xl mb-3">CB Extras</p>
                <h1 class="text-3xl text-white sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                    Support Extra<br>Untuk Impian<br>& kebutuhanmu!
                </h1>
                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Cek Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end pb-14 md:pb-24">
                <img src="/img/CBExtras.png" alt="Tutor Tes" 
                    class="w-[300px] sm:w-[300px] md:w-[500px] lg:w-[600px] 2xl:w-[750px] object-contain">
            </div>

        </div>
        <!-- Lengkungan valley dengan garis biru tua -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

            <!-- Mobile -->
            <svg class="block md:hidden w-full h-24"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path
                fill="#f0f5ff"
                d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <!-- Garis lengkung -->
                <path
                d="M0,20 Q720,100 1440,20"
                fill="none"
                stroke="#0b1a53"
                stroke-width="30"
                stroke-linecap="round" />
            </svg>

            <!-- md ke atas -->
            <svg class="hidden md:block w-full h-40"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 160"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path
                fill="#f0f5ff"
                d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <!-- Garis lengkung -->
                <path
                d="M0,20 Q720,140 1440,20"
                fill="none"
                stroke="#0b1a53"
                stroke-width="30"
                stroke-linecap="round" />
            </svg>

        </div>

    </section>

    <!-- Section Apa itu CB Extras -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-12 lg:py-16 px-4 md:px-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10">

            <!-- Gambar -->
            <div class="relative flex-shrink-0">
                <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-[200px] h-[200px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden border-4 border-[#151d52]">
                    <img src="/img/apa-itu-cbextras.png" alt="CB Extras" class="object-cover w-full h-full">
                </div>

                <!-- Lingkaran Orange Dekoratif -->
                <div class="absolute -top-5 -left-5 w-16 h-16 bg-[#f78a28] rounded-full z-10"></div>
            </div>

            <!-- Teks -->
            <div class="max-w-xl text-center md:text-left">
                <h2 class="text-xl md:text-2xl xl:text-3xl font-bold text-[#151d52] mb-4">
                    Apa itu CB Extras?
                </h2>
                <p class="text-[#151d52] text-xs md:text-base 2xl:text-lg leading-relaxed text-justify">
                    CB Extras adalah layanan pendampingan ekstra dari Cakrawala Bahasa yang dipersonalisasi agar fleksibel dan setia menemani perjalanan studi dan karirmu mulai dari mentoring eksklusif untuk persiapan studi maupun karir, tes hingga layanan professional berbagai kebutuhan bahasa. Semua didukung oleh tim profesional dengan standar internasional.
                </p>
            </div>

        </div>
    </section>

    <!-- Section Layanan Kami -->
    <div x-data="carouselSection()" class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el mb-10 md:mb-16 space-y-16 mt-8 px-0 xl:px-20">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#f78a28]">
            Layanan <span class="text-[#151d52]">Kami</span>
        </h2>
        <template x-for="section in sections" :key="section.title">
        <section>
            <div
            x-data="carousel(section.cards)"
            x-init="init()"
            x-ref="wrapper"
            class="relative overflow-hidden"
            >
            <div
                x-ref="inner"
                class="flex cursor-grab select-none"
                @mousedown="startDrag" @touchstart="startDrag"
                @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag"
                @mousemove="drag" @touchmove="drag"
                :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`"
            >
                <template x-for="card in cards" :key="card.id">
                    <div>
                        <div
                            class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden min-w-[200px] sm:min-w-[240px] md:min-w-[210px] lg:min-w-[250px]">
                            <img :src="card.img" :alt="card.title"
                                class="w-full object-cover h-[200px] sm:h-[220px] md:h-[180px] lg:h-[250px]" />
                            <div class="p-6 lg:p-8 text-center">
                                <h3 class="font-bold text-sm lg:text-base text-[#151d52] mb-5 md:mb-8"
                                    x-text="card.title"></h3>
                                <a :href="`/layanan/${card.id}`"
                                    class="hover:-translate-y-2 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-3 sm:py-3 lg:py-3 xl:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm lg:text-base xl:text-base">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            </div>
        </section>
        </template>
    </div>

    <!-- Section Fitur Utama Kami -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el pb-10 px-4 md:px-8 xl:px-20 bg-[#f5f6fa]">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#151d52]">
            Fitur Utama <span class="text-[#f78a28]">Kami</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 xl:gap-12">

            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/bermain.png" alt="Bermain" class="w-16 h-16 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">Personal & Tailor-Made</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Setiap sesi mentoring hingga keberangkatan dipersonalisasi secara eksklusif sesuai kebutuhan dan tujuanmu.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/kelas.png" alt="Kelas Kecil" class="w-16 h-16 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">Tim ahli dan profesional</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Kebutuhan bahasa dan layanan pendukung studimu ditangani oleh tim berpengalaman dan bersertifikasi untuk hasil maksimal.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/multibahasa.png" alt="Multibahasa" class="w-16 h-16 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">Solusi Lengkap Tes Bahasa</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Beragam pilihan tes bahasa untuk memudahkan pemenuhan persyaratan stud maupun kariri.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/blended.png" alt="Blended Learning" class="w-16 h-16 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">Penempatan Global</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Fasilitasi penyaluran ke universitas, program internasional, dan peluang karier global melalui sistem pendampingan terintegrasi online–offline, didukung teknologi AI. Proses fleksibel, terarah, dan disesuaikan dengan tujuan peserta.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Keunggulan CB Extras -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 pb-24 md:pb-48 mb-10 bg-[#151d52] text-white relative overflow-hidden">

        <h2 class="text-3xl md:text-5xl font-bold text-center mb-16">
            Keunggulan <span class="text-[#f78a28]">CB Extras</span>
        </h2>

        <div x-data="carouselKeunggulan()" x-init="init()" class="relative">

            <div class="flex cursor-grab select-none" 
                @mousedown="startDrag($event)"
                @touchstart="startDrag($event)"
                @mouseup="endDrag()"
                @mouseleave="endDrag()"
                @touchend="endDrag()"
                @mousemove="drag($event)"
                @touchmove="drag($event)"
                :style="`transform: translateX(-${position}px)`" 
                style="transition: transform 0.1s linear;">

                <template x-for="card in loopedCards" :key="card.uniqueId">
                    <div class="bg-[#f78a28] rounded-[30px] mx-2 sm:mx-3 
                                min-w-[200px] sm:min-w-[240px] md:min-w-[300px] 
                                p-3 sm:p-4 md:p-6 flex flex-col items-center text-center relative
                                hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300"
                        @mouseenter="pause()" @mouseleave="play()">

                        <div class="absolute -top-6 sm:-top-8 bg-[#151d52] rounded-full p-2 sm:p-3">
                            <img :src="card.icon" class="w-7 h-7 sm:w-10 sm:h-10">
                        </div>

                        <img :src="card.image" class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 rounded-full object-cover mb-3 sm:mb-4 mt-6">

                        <h3 class="font-bold text-sm sm:text-base md:text-lg  text-[#151d52] mb-2 sm:mb-3" x-text="card.title"></h3>
                        
                        <p class="text-[11px] sm:text-sm md:text-base leading-relaxed text-white" x-text="card.desc"></p>
                    </div>
                </template>

            </div>
        </div>
        <!-- Lengkungan valley dengan garis biru tua -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

            <!-- Mobile -->
            <svg class="block md:hidden w-full"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path
                fill="#f0f5ff"
                d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <!-- Garis lengkung -->
                <path
                d="M0,20 Q720,100 1440,20"
                fill="none"
                stroke-linecap="round" />
            </svg>

            <!-- md ke atas -->
            <svg class="hidden md:block w-full h-40"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 160"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path
                fill="#f0f5ff"
                d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <!-- Garis lengkung -->
                <path
                d="M0,20 Q720,140 1440,20"
                fill="none"
                stroke-linecap="round" />
            </svg>

        </div>
    </section>

    <!-- Script Section Keunggulan CB Extras -->
    <script>
        function carouselKeunggulan() {
            return {
                cards: [
                    {
                        icon: '/img/icon-tutor.png',
                        image: '/img/icon-tutor.png',
                        title: 'Praktis dan Terintegrasi',
                        desc: 'Semua kebutuhan pembelajaran dan layanan tambahan terintegrasi. Lebih praktis, hemat waktu, dan efisien.'
                    },
                    {
                        icon: '/img/icon-mentor.png',
                        image: '/img/icon-mentor.png',
                        title: 'Hasil Terjamin',
                        desc: 'Layanan pendukung kebutuhanmu ditangani sepenuhnya oleh tim berpengalaman dan profesional sehingga proses lebih cepat dengan hasil yang terjamin.'
                    },
                    {
                        icon: '/img/icon-growth.png',
                        image: '/img/icon-growth.png',
                        title: 'Privasi & Kerahasiaan Terjaga',
                        desc: 'Setiap dokumenditangani dengan penuh tangggungjawab atas privasi. Aman untuk mahasiswa, profesional, maupun korporat.'
                    },
                    {
                        icon: '/img/icon-class.png',
                        image: '/img/icon-class.png',
                        title: 'Jalan Wujudkan Tujuan',
                        desc: 'Akses ke berbagai universitas, perusahaan, dan komunitas internasional untuk memperbesar peluang studi dan karir di luar negeri.'
                    }
                ],
                loopedCards: [],
                position: 0,
                cardWidth: 240 + 16, // card width + margin (khusus mobile default width kecil)
                speed: 0.5,
                interval: null,
                dragging: false,
                dragStartX: 0,
                dragStartPos: 0,

                init() {
                    let uid = 0;
                    this.loopedCards = [...this.cards, ...this.cards, ...this.cards].map(card => {
                        return { ...card, uniqueId: uid++ };
                    });
                    this.play();
                },

                play() {
                    if (this.interval) return;
                    this.interval = setInterval(() => {
                        this.position += this.speed;
                        const totalWidth = this.loopedCards.length * this.cardWidth;
                        if (this.position >= totalWidth / 3) {
                            this.position = 0;
                        }
                    }, 16);
                },

                pause() {
                    clearInterval(this.interval);
                    this.interval = null;
                },

                startDrag(event) {
                    this.pause();
                    this.dragging = true;
                    this.dragStartX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
                    this.dragStartPos = this.position;
                },

                drag(event) {
                    if (!this.dragging) return;
                    const clientX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX;
                    const deltaX = clientX - this.dragStartX;
                    this.position = this.dragStartPos - deltaX;
                    const totalWidth = this.loopedCards.length * this.cardWidth;
                    if (this.position >= totalWidth / 3) {
                        this.position = 0;
                    } else if (this.position < 0) {
                        this.position = totalWidth / 3 + this.position;
                    }
                },

                endDrag() {
                    this.dragging = false;
                    this.play();
                }
            }
        }
    </script>

    <script>
        function carouselSection() {
        return {
            sections: [
            {
                title: 'CB For Extras',
                cards: [
                { id: 'study-buddy', img: '/img/Ur Study Buddy.png', title: 'Ur Study Buddy' },
                { id: 'language-support', img: '/img/language support.png', title: 'Language Support' },
                { id: 'language-test', img: '/img/Language Test.png', title: 'Language Test' },
                { id: 'super-agency', img: '/img/Super Agency.png', title: 'Super Agency' }
                ]
            }
            ]
        }
        }

        function carousel(cards) {
        return {
            cards,
            position: 0,
            dragging: false,

            init() {
            // nothing to duplicate
            },

            startDrag(e) {
            this.dragging = true;
            this.dragStartX   = e.touches?.[0]?.clientX || e.clientX;
            this.dragStartPos = this.position;
            },

            drag(e) {
            if (!this.dragging) return;
            const clientX = e.touches?.[0]?.clientX || e.clientX;
            let newPos = this.dragStartPos - (clientX - this.dragStartX);

            // batas minimum 0, maksimum isi - lebar tampilan
            const wrap  = this.$refs.wrapper;
            const inner = this.$refs.inner;
            const maxPos = inner.scrollWidth - wrap.clientWidth;
            if (newPos < 0) newPos = 0;
            if (newPos > maxPos) newPos = maxPos;

            this.position = newPos;
            },

            endDrag() {
            this.dragging = false;
            }
        }
        }
    </script>

    <script src="/js/animationsection.js"></script>

    <x-footer />
    <x-floating-wa />
</body>
</html>