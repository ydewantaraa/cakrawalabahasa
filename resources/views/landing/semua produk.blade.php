<?php
// data cards
$cards = [
    [
        'title'      => 'CB For Kids',
        'img'        => 'img/Super Kid.png',
        'url'        => '/cb for kids',
        'buttonText' => 'Lihat! Ini seru!'
    ],
    [
        'title'      => 'CB For You',
        'img'        => '/img/Jago Bahasa.png',
        'url'        => '/cb for you',
        'buttonText' => 'Yuk! Cari Tahu'
    ],
    [
        'title'      => 'CB Extras',
        'img'        => '/img/language support.png',
        'url'        => '/cb extras',
        'buttonText' => 'Cek Di Sini!'
    ],
];

// DATA KELAS: gunakan tanggal tetap di masa depan
$classes = [
    [
        'title'     => 'CB Academy',
        'img'       => '/img/cb-academy.png',
        'end_date'  => '2025-07-10T14:00:00',  // contoh: 10 Juli 2025 jam 14:00
        'headline'  => 'Siap?! Kuasai Dunia dengan Bahasa?!',
        'desc'      => 'Gabung dan Jadilah Avatar Penguasa Bahasa!',
        'link'      => '#'
    ],
    [
        'title'     => 'ICL Mentorship',
        'img'       => '/img/ICL Mentorship.png',
        'end_date'  => '2025-07-20T09:00:00',  // contoh: 20 Juli 2025 jam 09:00
        'headline'  => 'Mentorship Intensif untuk Kamu!',
        'desc'      => 'Dapatkan bimbingan langsung dari ahlinya.',
        'link'      => '#'
    ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <link rel="stylesheet" href="/css/incoming-class.css" />
</head>
<body
    class="mx-auto font-sans bg-[#f0f5ff]"
    x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }"
    >
    <x-header />

    <!-- Section Layanan Kami -->
    <section class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el md:mt-5 xl:mt-8 py-16 pb-10 px-4 lg:px-20 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-[#151d52] mb-5">Layanan Kami</h2>
        <div class="max-w-[95%] xl:max-w-[90%] 2xl:max-w-[80%] mx-auto flex flex-col md:flex-row overflow-hidden rounded-2xl shadow-lg">
        <?php foreach($cards as $card): ?>
            <div class="group relative flex-1 flex flex-col bg-white">
            <!-- Gambar dengan zoom on hover -->
            <div class="relative overflow-hidden">
                <img
                src="<?= htmlspecialchars($card['img'])?>"
                alt="<?= htmlspecialchars($card['title'])?>"
                class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105"
                >
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-transparent pointer-events-none"></div>
            </div>
            <!-- Judul & Tombol -->
            <div class="p-6 flex flex-col flex-1">
                <h3 class="text-2xl font-bold text-[#151d52] mb-4">
                <?= htmlspecialchars($card['title'])?>
                </h3>
                <div class="flex justify-center">
                    <a
                    href="<?= htmlspecialchars($card['url'])?>"
                    class="mt-auto px-26 inline-block bg-gradient-to-r from-[#fd5243] to-[#f1877e] 
                            text-white font-semibold px-8 py-3 rounded-full shadow-lg
                            transition-transform duration-300 hover:-translate-y-1"
                    >
                    <?= htmlspecialchars($card['buttonText'])?>
                    </a>
                </div>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>

    <!-- Pintasan Layanan -->
    <h1 class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500 fade-el text-3xl md:text-4xl font-bold text-[#151d52] text-center mt-12 md:mt-16">Pintasan Layanan</h1>
    <div x-data="carouselSection()" class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500 fade-el space-y-8 px-0 xl:px-20">
        <template x-for="section in sections" :key="section.title">
        <section>
            <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-6 flex items-center px-4 lg:px-20 xl:px-0">
            <span class="text-yellow-400 text-base mr-3">★</span>
            <span class="text-base" x-text="section.title"></span>
            </h2>

            <div
            x-data="carousel(section.cards)"
            x-init="init()"
            x-ref="wrapper"
            class="relative overflow-hidden pb-4"
            >
            <div
                x-ref="inner"
                class="flex cursor-grab select-none px-4"
                @mousedown="startDrag" @touchstart="startDrag"
                @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag"
                @mousemove="drag" @touchmove="drag"
                :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`"
            >
                <template x-for="card in cards" :key="card.id">
                    <div>
                        <div
                            class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-2 md:m-4 overflow-hidden min-w-[200px] sm:min-w-[210px] md:min-w-[180px] xl:min-w-[240px]">
                            <img :src="card.img" :alt="card.title"
                                class="w-full object-cover h-[200px] sm:h-[220px] md:h-[190px] lg:h-[250px]" />
                            <div class="p-6 md:p-8 text-center">
                                <h3 class="font-bold text-sm sm:text-sm md:text-sm lg:text-base xl:text-lg text-[#151d52] mb-5 md:mb-8"
                                    x-text="card.title"></h3>
                                <a :href="`/layanan/${card.id}`"
                                    class="hover:-translate-y-2 bg-gradient-to-r from-[#f6422e] to-orange-400 hover:bg-gradient-to-l from-[#f6422e] to-orange-400 text-white px-3 sm:px-5 md:px-4 py-3 sm:py-3 md:py-3 lg:px-6 lg:py-4 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm md:text-sm xl:text-base">
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

    <!-- Incoming Class Section -->
    <div x-data="carouselSection()" class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el space-y-16 mt-8 px-0 md:px-4 lg:px-6">
        <div
            x-data="incoming(<?= htmlspecialchars(json_encode($classes), ENT_QUOTES) ?>)"
            x-init="init()"
            class="pt-10"
            >
            <!-- Header -->
            <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-6 flex items-center px-4 md:px-0 lg:px-10 xl:px-12">
                <span class="text-yellow-400 mr-3">★</span>
                <span>Incoming Class</span>
            </h2>

            <!-- Layout utama: flex-col di mobile, row di md+ -->
            <div class="container-countdown flex justify-center">
                <!-- Countdown Section -->
                <div class="countdown">
                <div class="countdown-card">
                </div>
                <div class="calendar-image">
                    <span class="days-left" id="days">30</span>
                    <p class="days-label">Days Left</p>
                </div>
                <div class="countdown-timer" id="countdownTimer">⏳ 29d 23h 34m 23s</div>
                </div>

                <!-- Course Carousel Section -->
                <div class="course-carousel">
                <!-- Dynamic Title -->
                <h2 id="carouselTitle" class="course-title font-bold">CB Academy</h2> <!-- This text will change on the next slide -->
                <div class="carousel">
                    <div class="slide-course card-incoming" data-title="CB Academy" data-end-date="2025-11-25T00:00:00">
                    <img src="/img/cb-academy.png" alt="Course Image">
                    <div class="course-info">
                        <h1 class="font-semibold">Siap?! Kuasai <span>Dunia</span> dengan <span>Bahasa</span>?!</h1>
                        <p class="text-center">Gabung dan Jadilah Avatar Penguasa Bahasa!</p>
                        <a href="#" class="shadow-xl bg-gradient-to-r from-[#f6422e] to-orange-400 hover:bg-gradient-to-l from-[#f6422e] to-orange-400">Join Now!</a>
                    </div>
                    </div>
                    <div class="slide-course card-incoming" data-title="ICL Mentorship" data-end-date="2025-12-15T00:00:00">
                    <img src="/img/ICL Mentorship.png" alt="Course Image">
                    <div class="course-info">
                        <h1 class="font-semibold">Siap?! Kuasai <span>Dunia</span> dengan <span>Bahasa</span>?!</h1>
                        <p class="text-center">Gabung dan Jadilah Avatar Penguasa Bahasa!</p>
                        <a href="#" class="shadow-xl bg-gradient-to-r from-[#f6422e] to-orange-400 hover:bg-gradient-to-l from-[#f6422e] to-orange-400">Join Now!</a>
                    </div>
                    </div>
                </div>
                <!-- Carousel Navigation -->
                <div class="carousel-nav">
                    <span class="dot active" onclick="showSlide(0)"></span>
                    <span class="dot" onclick="showSlide(1)"></span>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Chat Semua Produk -->
    <section class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el py-6 px-4 lg:px-20 mt-12">
        <h2 class="text-sm sm:text-xl md:text-2xl font-bold mb-8 flex items-center">
        <span class="text-yellow-500 mr-2">★</span> Kami Siap Melayani!
        </h2>
        <div class="opacity-0 translate-y-5 ease-out fade-el transform bg-blue-900 transition-all duration-700 hover:-translate-y-2 relative bg-cover bg-center rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] overflow-hidden w-full max-w-[800px] lg:max-w-[1000px] mx-auto pl-4 pr-4 pt-2 md:pb-0"
            style="background-image: url('/img/layer konsultan 2.png'); background-size: cover; background-repeat: no-repeat;">
            <!-- Gambar untuk desktop menggunakan kelas responsif -->
            <div class="hidden md:block" style="background-image: url('/img/layer konsultan 1.png'); background-size: cover; background-repeat: no-repeat;"></div>
                    
            <!-- Flex desktop & tablet -->
            <div class="hidden md:flex flex-row items-center justify-center gap-4">

                <!-- Gambar orang -->
                <div class="flex items-end flex-shrink-0">
                    <img src="/img/figure-hero2.png" alt="Gambar Orang" class="md:w-[220px] lg:w-[300px]">
                </div>

                <!-- Teks & Tombol -->
                <div class="flex-1 text-white text-left flex flex-row items-center justify-center">

                    <div class="mr-10">
                        <p class="text-base lg:text-lg text-center">Butuh bantuan seputar layanan?</p>
                        <p class="font-bold text-xl lg:text-3xl text-center">Sampaikan sekarang!</p>
                    </div>

                    <div>
                        <a href="#"
                        class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-20 inline-flex items-center border-2 border-white rounded-full px-6 py-2 text-base lg:px-8 lg:py-3 lg:text-lg font-semibold hover:bg-white hover:text-blue-900">
                        Chat Kami
                        <i class="fas fa-comment-dots ml-2"></i>
                        </a>
                    </div>

                </div>

            </div>

            <!-- Mobile Layout -->
            <div class="md:hidden flex items-end justify-start">
                <!-- Gambar orang mobile -->
                <div class="flex-shrink-0 pt-4">
                    <img src="/img/figure-hero2.png" alt="Gambar Orang" class="w-[140px]">
                </div>

                <!-- Teks & Tombol mobile (absolute pojok kanan atas) -->
                <div class="absolute top-4 right-4 pb-2 text-right text-white">
                    <p class="text-[10px] text-end">Butuh bantuan seputar layanan?</p>
                    <p class="font-bold text-[11px] mb-2 text-end">Sampaikan sekarang!</p>
                    <a href="#"
                    class="inline-flex items-center border-2 border-white rounded-full px-3 py-1 text-xs font-semibold hover:bg-white hover:text-blue-900 transition">
                    Chat Kami
                    <i class="fas fa-comment-dots ml-2"></i>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <script>
        function carouselSection() {
        return {
            sections: [
            {
                title: 'CB For Kids',
                cards: [
                { id: 'super-kid', img: '/img/Super Kid.png', title: 'Super Kids' },
                { id: 'language-stars', img: '/img/Fun Language.png', title: 'Language Stars' },
                { id: 'child-artist', img: '/img/Child Artist.png', title: 'Child Artist' },
                { id: 'best-parenting', img: '/img/best parenting.png', title: 'Best Parenting' }
                ]
            },
            {
                title: 'CB For You',
                cards: [
                { id: 'jago-budaya', img: '/img/Jago Budaya.png', title: 'Jagoan Budaya' },
                { id: 'jago-bahasa', img: '/img/Jago Bahasa.png', title: 'Jagoan Bahasa' },
                { id: 'preparation-test', img: '/img/Preparation Test.png', title: 'Jagoan Test' },
                { id: 'jago-nyekill', img: '/img/Jagoan Nyekill.png', title: 'Jagoan Nyekill' }
                ]
            },
            {
                title: 'CB For Extras',
                cards: [
                { id: 'study-buddy', img: '/img/Ur Study Buddy.png', title: 'Ur Study Buddy' },
                { id: 'language-support', img: '/img/language support.png', title: 'Language Support' },
                { id: 'language-test', img: '/img/Language Test.png', title: 'Language Test' },
                { id: 'super-agency', img: '/img/Super Agency.png', title: 'Super Agency' }
                ]
            },
            {
                title: 'Special Class',
                cards: [
                { id: 'icl-mentorship', img: '/img/ICL Mentorship.png', title: 'ICL Mentorship' },
                { id: 'cb-academy', img: '/img/cb-academy.png', title: 'CB Academy' },
                { id: 'camp-bahasa', img: '/img/camp-bahasa.png', title: 'Camp Bahasa' },
                { id: 'cakrawala-skills', img: '/img/cakrawala-skills.png', title: 'Cakrawala Skills' },
                { id: 'best-muslim', img: '/img/best-muslim.png', title: 'Best Muslim' }
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

    <script src="/js/countdown.js"></script>
    <script src="/js/incoming-class.js"></script>
    <x-footer />
    <x-floating-wa />
</body>
</html>
