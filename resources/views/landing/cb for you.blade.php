<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <!-- Tambahkan Swiper CSS -->
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
        .swiper-slide > div {
            height: 100%;
        }
    </style>
</head>
<!-- Tambahkan overflow-x-hidden di body untuk mencegah scroll global ke samping -->
<body class="mx-auto font-sans bg-[#f0f5ff] overflow-x-hidden" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Section CB For You -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 md:py-24 md:ps-4 pb-0 md:pr-0 2xl:ps-20 bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">
        
        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern" 
            class="absolute right-0 bottom-0 h-[350px] md:h-[550px] xl:h-[630px] 2xl:h-[730px] w-auto z-0 md:bottom-0">

        <div class="relative flex flex-col md:flex-row items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left md:pl-8 lg:pl-16 mb-10 md:mb-0 md:-mt-28 xl:-mt-32 2xl:-mt-36 px-4 md:px-0">
                <p class="text-[#151d52] font-semibold text-lg md:text-3xl mb-3">CB For You</p>
                <h1 class="text-2xl text-[#151d52] sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                    Bikin Kamu<br>Makin Keren!
                </h1>
                <h2 class="text-lg text-white sm:text-2xl md:text-2xl xl:text-2xl 2xl:text-3xl font-bold leading-tight mb-6">Jago bahasa, seni budaya <br>dan segudang kemampuan</h2>
                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-6 py-3 md:px-8 rounded-full text-sm md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Cek Sekarang
                </a>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end pb-10 md:pb-0">
                <img src="/img/CBForYou.png" alt="Tutor Tes" 
                    class="w-[300px] md:w-[450px] lg:w-[550px] 2xl:w-[650px] object-contain">
            </div>

        </div>
        <!-- Lengkungan valley -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">
            <svg class="block md:hidden w-full h-16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <path d="M0,20 Q720,100 1440,20" fill="none" stroke="#0b1a53" stroke-width="30" stroke-linecap="round" />
            </svg>
            <svg class="hidden md:block w-full h-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160" preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <path d="M0,20 Q720,140 1440,20" fill="none" stroke="#0b1a53" stroke-width="30" stroke-linecap="round" />
            </svg>
        </div>

    </section>

    <!-- Section Apa itu CB For You -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-12 lg:py-16 px-4 md:px-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-10">

            <!-- Gambar -->
            <div class="relative flex-shrink-0">
                <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-[180px] h-[180px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden border-4 border-[#151d52]">
                    <img src="/img/apa-itu-cbforyou.png" alt="CB For You" class="object-cover w-full h-full">
                </div>
                <div class="absolute -top-5 -left-5 w-12 h-12 md:w-16 md:h-16 bg-[#f78a28] rounded-full z-10"></div>
            </div>

            <!-- Teks -->
            <div class="max-w-xl text-center md:text-left">
                <h2 class="text-xl md:text-2xl xl:text-3xl font-bold text-[#151d52] mb-4">
                    Apa itu CB For You?
                </h2>
                <p class="text-[#151d52] text-xs md:text-base 2xl:text-lg leading-relaxed text-justify">
                    CB For You adalah program belajar yang dirancang khusus buat kamu yang ingin berkembang dalam bahasa dan softskill dengan kreativitas tanpa batas. Di sini kamu belajar dengan pendekatan modern yang menyenangkan, dukungan tutor ahli, serta pengalaman belajar yang tak terlupakan.
                </p>
            </div>

        </div>
    </section>

    <!-- Section Layanan Kami -->
    <div x-data="carouselSection()" class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el mb-10 md:mb-16 space-y-8 md:space-y-16 mt-4 md:mt-8 px-0 xl:px-20">
        <h2 class="text-2xl md:text-5xl font-bold text-center mb-4 md:mb-16 text-[#f78a28]">
            Layanan <span class="text-[#151d52]">Kami</span>
        </h2>

        <!-- Section 1: CB For You (Alpine Drag Biasa - Jangan Dihilangkan) -->
        <template x-for="section in regularSections" :key="section.title">
            <section>
                <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
                    <span class="text-yellow-400 text-base mr-3">★</span>
                    <span class="text-base" x-text="section.title"></span>
                </h2>
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
                                <!-- Card Mobile Optimization -->
                                <div class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[1.5rem] md:rounded-[2rem] m-2 md:m-4 overflow-hidden min-w-[220px] sm:min-w-[240px] md:min-w-[280px] lg:min-w-[300px]">
                                    <img :src="card.img" :alt="card.title" class="w-full object-cover h-[150px] sm:h-[180px] md:h-[200px] lg:h-[250px]" />
                                    <div class="p-4 md:p-6 lg:p-8 text-center">
                                        <h3 class="font-bold text-xs md:text-sm lg:text-base text-[#151d52] mb-3 md:mb-5" x-text="card.title"></h3>
                                        <a :href="`/layanan/${card.id}`" class="hover:-translate-y-2 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 lg:py-3 xl:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-[10px] sm:text-xs lg:text-base">
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

        <!-- Section 2: Special Class (Swiper.js) -->
        <section x-data="specialClassSwiper()" x-init="initSwiper()">
            <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 flex items-center px-4 lg:px-20 xl:px-0">
                <span class="text-yellow-400 text-base mr-3">★</span>
                <span class="text-base">Special Class</span>
            </h2>
            
            <!-- Swiper Container -->
            <div class="swiper specialClassSwiper px-2 md:px-4">
                <div class="swiper-wrapper">
                    <template x-for="card in specialCards" :key="card.id">
                        <div class="swiper-slide">
                            <!-- Card Mobile Optimization -->
                            <div class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[1.5rem] md:rounded-[2rem] m-2 md:m-3 overflow-hidden min-w-[230px] md:min-w-[280px] lg:min-w-[300px] h-full">
                                <img :src="card.img" :alt="card.title" class="w-full object-cover h-[150px] sm:h-[180px] md:h-[200px] lg:h-[250px]" />
                                <div class="p-4 md:p-6 lg:p-8 text-center">
                                    <h3 class="font-bold text-xs md:text-sm lg:text-base text-[#151d52] mb-3 md:mb-5" x-text="card.title"></h3>
                                    <a :href="`/layanan/${card.id}`" class="hover:-translate-y-2 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 lg:py-3 xl:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-[10px] sm:text-xs lg:text-base">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </section>

    </div>

    <!-- Section Fitur Utama Kami -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el pb-10 px-4 md:px-8 xl:px-20 bg-[#f5f6fa]">
        <h2 class="text-2xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#151d52]">
            Fitur Utama <span class="text-[#f78a28]">Kami</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 xl:gap-12">
            <!-- Card 1 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/bermain.png" alt="Bermain" class="w-12 h-12 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-2 md:mb-3">Metode Real-life Experience</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Pembelajaran dirancang berbasis <strong>real-life experience</strong>. Kamu tidak hanya memahami konsep, tetapi langsung <strong>menggunakannya dalam situasi nyata</strong>.
                    </p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/kelas.png" alt="Kelas Kecil" class="w-12 h-12 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-2 md:mb-3">Kurikulum Multibahasa</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Kamu bebas memilih beragam layanan softskill, seni budaya dan puluhan bahasa yang tersedia.
                    </p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/multibahasa.png" alt="Multibahasa" class="w-12 h-12 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-2 md:mb-3">Pilihan Kelas Fleksibel</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Tersedia kelas privat, tutor visit maupun kelas kelompok yang dapat disesuaikan dengan kebutuhan.
                    </p>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                <img src="/img/blended.png" alt="Blended Learning" class="w-12 h-12 md:w-24 md:h-24">
                <div>
                    <h3 class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-2 md:mb-3">Terintegrasi Digital</h3>
                    <p class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                        Mendukung metode blended learning offline maupun online dengan progres terpantau digital dan terintegrasi AI.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Keunggulan CB For You -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 pb-24 md:pb-48 mb-10 bg-[#151d52] text-white relative overflow-hidden">
        <h2 class="text-2xl md:text-5xl font-bold text-center mb-10 md:mb-16">
            Keunggulan <span class="text-[#f78a28]">CB For You</span>
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
                    <div class="bg-[#f78a28] rounded-[20px] md:rounded-[30px] mx-2 sm:mx-3 
                                min-w-[220px] sm:min-w-[240px] md:min-w-[300px] 
                                p-3 sm:p-4 md:p-6 flex flex-col items-center text-center relative
                                hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300"
                        @mouseenter="pause()" @mouseleave="play()">
                        <div class="absolute -top-5 sm:-top-6 bg-[#151d52] rounded-full p-2 sm:p-2.5 md:p-3">
                            <img :src="card.icon" class="w-5 h-5 sm:w-7 sm:h-7 md:w-10 md:h-10">
                        </div>
                        <img :src="card.image" class="w-16 h-16 sm:w-20 sm:h-20 md:w-28 md:h-28 rounded-full object-cover mb-3 sm:mb-4 mt-4">
                        <h3 class="font-bold text-xs sm:text-sm md:text-lg text-[#151d52] mb-1 sm:mb-2" x-text="card.title"></h3>
                        <p class="text-[9px] sm:text-[11px] md:text-base leading-relaxed text-white" x-text="card.desc"></p>
                    </div>
                </template>
            </div>
        </div>
        <!-- Lengkungan valley -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">
            <svg class="block md:hidden w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <path d="M0,20 Q720,100 1440,20" fill="none" stroke-linecap="round" />
            </svg>
            <svg class="hidden md:block w-full h-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160" preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <path d="M0,20 Q720,140 1440,20" fill="none" stroke-linecap="round" />
            </svg>
        </div>
    </section>

    <!-- Script Section Keunggulan CB For You -->
    <script>
        function carouselKeunggulan() {
            return {
                cards: [
                    { icon: '/img/icon-tutor.png', image: '/img/icon-tutor.png', title: 'Belajar Nyata, Bukan Sekadar Teori', desc: 'Peserta langsung praktik melalui simulasi, proyek, dan real-life experience sehingga skill benar-benar terpakai.' },
                    { icon: '/img/icon-mentor.png', image: '/img/icon-mentor.png', title: 'Progres dan Hasil Belajar Terukur', desc: 'Setiap progres dipantau dan dilaporkan secara berkala dan terukur.' },
                    { icon: '/img/icon-growth.png', image: '/img/icon-growth.png', title: 'Pendampingan Personal & Berkelanjutan (tambahan)', desc: 'Sistem pembelajaran disesuaikan dengan gaya belajar, tantangan, dan tujuan individu, sehingga proses belajar lebih efektif dan berkelanjutan.' },
                    { icon: '/img/icon-class.png', image: '/img/icon-class.png', title: 'Jaringan dan Eksposur Global', desc: 'Peserta tidak hanya belajar bahasa, tetapi juga mendapatkan eksposur budaya, koneksi dan wawasan internasional yang relevan untuk kebutuhan akademik, karier, maupun profesional.' }
                ],
                loopedCards: [],
                position: 0, cardWidth: 232, speed: 0.5, interval: null, dragging: false, dragStartX: 0, dragStartPos: 0,
                init() { let uid = 0; this.loopedCards = [...this.cards, ...this.cards, ...this.cards].map(card => ({ ...card, uniqueId: uid++ })); this.play(); },
                play() { if (this.interval) return; this.interval = setInterval(() => { if (!this.dragging) { this.position += this.speed; const totalWidth = this.loopedCards.length * this.cardWidth; if (this.position >= totalWidth / 3) { this.position = 0; } } }, 16); },
                pause() { clearInterval(this.interval); this.interval = null; },
                startDrag(event) { this.pause(); this.dragging = true; this.dragStartX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX; this.dragStartPos = this.position; },
                drag(event) { if (!this.dragging) return; const clientX = event.type.includes('touch') ? event.touches[0].clientX : event.clientX; const deltaX = clientX - this.dragStartX; this.position = this.dragStartPos - deltaX; const totalWidth = this.loopedCards.length * this.cardWidth; if (this.position >= totalWidth / 3) { this.position = 0; } else if (this.position < 0) { this.position = totalWidth / 3 + this.position; } },
                endDrag() { this.dragging = false; this.play(); }
            }
        }
    </script>

    <!-- SCRIPT UTAMA -->
    <script>
        // Data untuk Section CB For You (Pastikan ada isinya)
        function carouselSection() {
            return {
                regularSections: [
                    {
                        title: 'CB For You',
                        cards: [
                            { id: 'jago-budaya', img: '/img/Jago Budaya.png', title: 'Jagoan Budaya' },
                            { id: 'jago-bahasa', img: '/img/Jago Bahasa.png', title: 'Jagoan Bahasa' },
                            { id: 'preparation-test', img: '/img/Preparation Test.png', title: 'Jagoan Test' },
                            { id: 'jago-nyekill', img: '/img/Jagoan Nyekill.png', title: 'Jagoan Nyekill' }
                        ],
                    }
                ]
            }
        }

        // Data untuk Special Class (Swiper)
        function specialClassSwiper() {
            return {
                specialCards: [
                    { id: 'icl-mentorship', img: '/img/ICL Mentorship.png', title: 'ICL Mentorship' },
                    { id: 'cb-academy', img: '/img/cb-academy.png', title: 'CB Academy' },
                    { id: 'camp-bahasa', img: '/img/camp-bahasa.png', title: 'Camp Bahasa' },
                    { id: 'cakrawala-skills', img: '/img/cakrawala-skills.png', title: 'Cakrawala Skills' },
                    { id: 'best-muslim', img: '/img/best-muslim.png', title: 'Best Muslim' }
                ],
                initSwiper() {
                    new Swiper(".specialClassSwiper", {
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                        loop: true,
                        autoplay: {
                            delay: 0,
                            disableOnInteraction: false,
                        },
                        speed: 4000, 
                        freeMode: true,
                        grabCursor: true,
                        allowTouchMove: true,
                    });
                }
            }
        }

        // Fungsi Carousel Biasa
        function carousel(cards) {
            return {
                cards,
                position: 0,
                dragging: false,
                init() {},
                startDrag(e) {
                    this.dragging = true;
                    this.dragStartX = e.touches?.[0]?.clientX || e.clientX;
                    this.dragStartPos = this.position;
                },
                drag(e) {
                    if (!this.dragging) return;
                    const clientX = e.touches?.[0]?.clientX || e.clientX;
                    let newPos = this.dragStartPos - (clientX - this.dragStartX);
                    const wrap = this.$refs.wrapper;
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
    
    <!-- Tambahkan Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="/js/animationsection.js"></script>

    <x-footer />
    <x-floating-wa />
</body>
</html>