<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <style>
        /* Sembunyikan scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    <!-- Hero Section Video & Modul -->
    <section class="relative opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el
            bg-[#232c5f] py-10 md:py-24 px-4 md:px-20 mt-8">
        <div class="relative bg-[#f78a28] rounded-[50px] shadow-[0_6px_12px_rgba(0,0,0,0.40)]
                bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa]
                overflow-visible
                w-full xl:max-w-[850px] 2xl:max-w-[950px] mx-auto
                flex flex-col md:flex-row items-center justify-between
                px-6 md:px-10 lg:px-16">

            {{-- Hiasan pattern --}}
            <img
            src="/img/hiasan1.png"
            alt="Pattern"
            class="absolute right-0 bottom-2 h-[220px] sm:h-[260px] md:h-full w-auto z-0 md:top-0 md:bottom-0"
            />

            {{-- Teks kiri --}}
            <div class="md:w-1/2 text-[#151d52] p-6 text-center md:text-left z-10">
            <h1 class="text-2xl sm:text-2xl md:text-3xl xl:text-3xl 2xl:text-4xl font-bold leading-tight mb-6">
                Belajar Interaktif <br> Bersama Video & <br> Modul Terbaik
            </h1>
            <a
                href="#"
                class="inline-flex items-center gap-2 bg-[#151d52] text-[#ffffff]
                    font-semibold text-xs sm:text-base xl:text-base 2xl:text-lg
                    px-6 py-3 rounded-full shadow hover:bg-gradient-to-r hover:from-[#1f3585] hover:to-[#7e9df1]
                    transition z-10"
            >
                <i class="fas fa-play-circle text-[#ffffff]"></i>
                Tonton Sekarang
            </a>
            </div>

            {{-- Gambar tutor --}}
            <div
            class="md:w-1/2 flex justify-end relative z-10 mt-0 sm:-mt-10 md:-mt-10">
            <img
                src="/img/master-teacher/tutor-videomodul.png"
                alt="Tutor"
                class="w-[200px] sm:w-[300px] md:w-[450px] lg:w-[550px] xl:w-[670px] h-auto">
            </div>
        </div>

        <!-- Text Penjelasan Bawah -->
        <div
            class="mt-5 md:mt-10 max-w-[800px] mx-auto text-center text-white
                text-xs sm:text-base xl:text-base 2xl:text-xl leading-relaxed"
        >
            Akses ratusan video interaktif dan modul eksklusif yang dirancang oleh tutor profesional & native speakers,
            mendukung pembelajaran bahasa yang fleksibel, menyenangkan, dan terarah.
        </div>

        <!-- Curve concave down -->
        <div class="absolute bottom-0 md:-bottom-6 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">
            <svg
                class="relative block w-full h-24 sm:h-32 md:h-60"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1440 320"
                preserveAspectRatio="none"
            >
                <path
                fill="#f0f5ff"
                d="
                    M0,0 
                    Q720,240 1440,0 
                    L1440,320 
                    L0,320 
                    Z
                "
                />
            </svg>
        </div>

        <!-- Panah Bawah (di atas curve) -->
        <div class="relative z-20 flex justify-center mt-10">
            <div class="bg-[#f78a28] rounded-full p-4 shadow-lg">
            <i class="fas fa-chevron-down text-white text-2xl"></i>
            </div>
        </div>
    </section>

    <!-- Generic carousel factory -->
    <script>
        function carousel(config) {
        return {
            items: config.items,
            itemsLoop: [],
            wrapper: null,
            loopWidth: 0,
            paused: false,
            dragging: false,
            startX: 0,
            scrollStart: 0,
            speed: config.speed || 1,

            init() {
            // build YouTube URLs & thumbnails if item.id provided
            this.items = this.items.map(item => {
                if (item.id) {
                return {
                    url: `https://youtu.be/${item.id}`,
                    img: `https://img.youtube.com/vi/${item.id}/hqdefault.jpg`,
                    title: item.title,
                    subtitle: item.subtitle,
                };
                }
                return item;
            });

            // triple duplicate for smooth infinite loop
            this.itemsLoop = [...this.items, ...this.items, ...this.items];

            this.$nextTick(() => {
                this.wrapper   = this.$refs.wrapper;
                this.loopWidth = this.wrapper.scrollWidth / 4;
                this.wrapper.scrollLeft = this.loopWidth;
                this.autoScroll();
            });
            },

            autoScroll() {
            if (!this.paused && !this.dragging) {
                this.wrapper.scrollLeft += this.speed;
                if (this.wrapper.scrollLeft >= this.loopWidth * 2) {
                this.wrapper.scrollLeft -= this.loopWidth;
                }
            }
            requestAnimationFrame(() => this.autoScroll());
            },

            startDrag(e) {
            this.dragging    = true;
            this.startX      = e.clientX;
            this.scrollStart = this.wrapper.scrollLeft;
            this.wrapper.style.cursor = 'grabbing';
            },

            onDrag(e) {
            if (!this.dragging) return;
            const dx = e.clientX - this.startX;
            this.wrapper.scrollLeft = this.scrollStart - dx;
            },

            stopDrag() {
            this.dragging = false;
            this.wrapper.style.cursor = 'grab';
            }
        }
        }
    </script>

    <!-- Video Pembelajaran -->
    <section x-data="carousel({ 
                        items: [
                        { id: '9sFgj6cVIN0', title: 'Course 1', subtitle: 'Kosa Kata' },
                        { id: 'Y5BHCL-Pi30', title: 'Course 2', subtitle: 'Kata Kerja' },
                        { id: 'xkQmua9KQ4k', title: 'Course 3', subtitle: 'Listening' },
                        { id: 'YkU0pS-P__E', title: 'Course 4', subtitle: 'Speaking' }
                        ] 
                    })" 
            x-init="init()" 
            class="py-10 bg-gray-100">
        <h2 class="text-3xl text-center md:text-4xl font-bold text-[#151d52] mb-16">
            Video <span class="text-[#f78a28]">Pembelajaran</span>
        </h2>
        <div class="relative overflow-hidden"
            @mouseenter="paused = true"
            @mouseleave="paused = false"
        >
        <div
            x-ref="wrapper"
            class="flex space-x-6 overflow-x-scroll no-scrollbar cursor-grab select-none"
            @mousedown.prevent="startDrag($event)"
            @mousemove.prevent="onDrag($event)"
            @mouseup.prevent="stopDrag()"
            @mouseleave="stopDrag()"
        >
            <template x-for="(card, idx) in itemsLoop" :key="idx">
            <a 
                :href="card.url" 
                target="_blank"
                class="relative block min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden flex-shrink-0"
            >
                <img :src="card.img" alt="" class="w-full h-40 object-cover" />
                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white/90" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
                </div>
                <div class="p-4 bg-gradient-to-t from-gray-800 to-transparent text-white">
                <h3 x-text="card.title" class="font-semibold"></h3>
                <p x-text="card.subtitle" class="text-sm"></p>
                </div>
            </a>
            </template>
        </div>
        </div>
    </section>

    <!-- Modul Pembelajaran (Tema: Bahasa Inggris) -->
    <section x-data="carousel({ 
                        items: [
                        { url: '/modul/english.pdf', img: '/img/modul.jpeg', title: 'Modul 1', subtitle: 'Alfabet & Pelafalan' },
                        { url: '/modul/english.pdf', img: '/img/modul.jpeg', title: 'Modul 2', subtitle: 'Kosa Kata Dasar' },
                        { url: '/modul/english.pdf', img: '/img/modul.jpeg', title: 'Modul 3', subtitle: 'Tenses Dasar' },
                        { url: '/modul/english.pdf', img: '/img/modul.jpeg', title: 'Modul 4', subtitle: 'Percakapan Sehari-hari' }
                        ] 
                    })" 
            x-init="init()" 
            class="py-10 bg-gray-100">
        <h2 class="text-3xl text-center md:text-4xl font-bold text-[#151d52] mb-16">
            Modul <span class="text-[#f78a28]">Pembelajaran</span>
        </h2>
        <div class="relative overflow-hidden"
            @mouseenter="paused = true"
            @mouseleave="paused = false"
        >
        <div
            x-ref="wrapper"
            class="flex space-x-6 overflow-x-scroll no-scrollbar cursor-grab select-none"
            @mousedown.prevent="startDrag($event)"
            @mousemove.prevent="onDrag($event)"
            @mouseup.prevent="stopDrag()"
            @mouseleave="stopDrag()"
        >
            <template x-for="(card, idx) in itemsLoop" :key="idx">
            <a 
                :href="card.url" 
                target="_blank"
                class="block min-w-[280px] bg-white rounded-xl shadow-lg overflow-hidden flex-shrink-0"
            >
                <img :src="card.img" alt="" class="w-full h-40 object-cover" />
                <div class="p-4">
                <h3 x-text="card.title" class="font-semibold text-gray-800"></h3>
                <p x-text="card.subtitle" class="text-sm text-gray-600"></p>
                </div>
            </a>
            </template>
        </div>
        </div>
    </section>

    <!-- Section Testimoni Mitra -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 bg-[#ededed] ease-out fade-el px-4 py-20 md:px-20 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-[#151d52] mb-16">
            Apa Kata <span class="text-[#f78a28]">Mereka?</span>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Card Testimoni -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
                    </div>
                </div>
            </div>

            <!-- Ulangi card -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
                    </div>
                </div>
            </div>

            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
                    </div>
                </div>
            </div>

            <!-- Tambah 3 lagi -->
            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
                    </div>
                </div>
            </div>

            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
                    </div>
                </div>
            </div>

            <div class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-2xl shadow-lg p-8 text-left">
                <i class="fas fa-quote-left text-2xl text-[#151d52] mb-2 block"></i>
                <p class="text-gray-700 mb-6">
                    saya merasa terbantu sekali dengan adanya fitur ini, karena saya bisa mengulang kembali pelajaran yang telah dipelajari sebelumnya
                </p>
                <div class="flex items-center">
                    <img src="/img/Mask group3.png" alt="Andita Putri" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <p class="font-bold text-[#151d52]">Andita Putri</p>
                        <p class="text-gray-400 text-sm">@andita_putri68</p>
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
                    Mau Lebih banyak <br> akses video <br> 
                    <span class="text-[#f78a28]">atau mau unduh modul?</span>
                </h1>

                <div class="flex justify-center items-center md:justify-start gap-4">
                    <a href="#" class="bg-[#f78a28] border-2 border-white text-white font-semibold px-4 md:px-8 py-3 rounded-full text-sm md:text-base lg:text-lg hover:bg-orange-500 transition">
                        Langganan
                    </a>
                    <a href="#" class="border-2 border-white text-white font-semibold px-4 md:px-8 py-3 rounded-full text-sm md:text-base lg:text-lg hover:bg-white hover:text-[#0b1a53] transition">
                        Unduh Modul
                    </a>
                </div>
            </div>

            <!-- Gambar orang -->
            <div class="md:w-1/2 flex justify-end items-end relative z-10 md:pr-8 lg:pr-16">
                <img src="/img/berfikir2.png" alt="Pria" class="w-[200px] sm:w-[260px] md:w-[320px]">
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