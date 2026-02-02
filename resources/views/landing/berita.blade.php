<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <style>
        /* hide native scrollbar */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* scrollbar sidebar posts */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: rgba(0,0,0,0.2);
            border-radius: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background-color: transparent;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: rgba(0,0,0,0.2) transparent;
        }
    </style>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Hero Section: Image Left on Desktop, Image Below Text on Mobile -->
    <section class="translate-y-5 transition-all duration-700 ease-out fade-el
                    py-16 px-4 md:px-10 xl:px-20 md:mt-20">
        <div class="relative bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] rounded-[50px] shadow-[0_6px_12px_rgba(0,0,0,0.40)]
                    overflow-visible h-96 w-full max-w-[1000px] mx-auto
                    flex flex-col-reverse md:flex-row items-center justify-between
                    px-6 md:px-10">

            <!-- decorative pattern -->
            <img
            src="/img/hiasan1.png"
            alt="Pattern"
            class="absolute right-0 bottom-0 h-[220px] sm:h-[260px] md:h-full w-auto z-0 md:top-0 md:bottom-0"
            />

            <!-- Image Block -->
            <div class="flex justify-start relative z-10 -mt-7">
            <img
                src="/img/peoplebaca.png"
                alt="Thinking"
                class="w-[150px] sm:w-[200px] md:w-[350px] h-auto"
            />
            </div>

            <!-- Text Block -->
            <div class="text-white p-6 text-center md:text-left z-10">
            <h1 class="font-bold leading-tight mb-4
                        text-xl sm:text-2xl md:text-4xl lg:text-5xl">
                Apa yang ingin <br/>
                kamu baca hari ini?
            </h1>
            <p class="italic mb-4 md:mb-8
                        text-sm sm:text-base md:text-2xl lg:text-3xl">
                Jangan lewatkan berita terbaru <br/> dan tips menarik lainnya
            </p>
            <a
                href="#"
                class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-xs md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                Selengkapnya
            </a>
            </div>
        </div>
    </section>

    <!-- Section Categories: Icon Left, Text Right -->
    <section class="py-4 md:py-12">
        <div class="max-w-6xl mx-auto px-2 md:px-4">
            <div class="flex flex-wrap justify-center gap-4 md:gap-6">
            <!-- Card 1 -->
            <a href="#" class="bg-white rounded-2xl shadow-lg p-2 md:p-4 flex items-center w-40 md:w-48 lg:w-64 space-x-4">
                <div class="flex-shrink-0 bg-[#f78a28] p-1 md:p-3 rounded-full">
                <img src="/img/icons/cb-updates.png" alt="CB Updates & Tips" class="w-6 h-6 lg:w-8 lg:h-8" />
                </div>
                <p class="text-[#1d2951] font-semibold text-xs md:text-sm lg:text-base">
                CB Updates &amp; Tips
                </p>
            </a>
            <!-- Card 2 -->
            <a href="#" class="bg-white rounded-2xl shadow-lg p-2 md:p-4 flex items-center w-40 md:w-48 lg:w-64 space-x-4">
                <div class="flex-shrink-0 bg-[#f78a28] p-1 md:p-3 rounded-full">
                <img src="/img/icons/bahasa-budaya.png" alt="Bahasa & Budaya" class="w-6 h-6 lg:w-8 lg:h-8" />
                </div>
                <p class="text-[#1d2951] font-semibold text-xs md:text-sm lg:text-base">
                Bahasa &amp; Budaya
                </p>
            </a>
            <!-- Card 3 -->
            <a href="#" class="bg-white rounded-2xl shadow-lg p-2 md:p-4 flex items-center w-40 md:w-48 lg:w-64 space-x-4">
                <div class="flex-shrink-0 bg-[#f78a28] p-1 md:p-3 rounded-full">
                <img src="/img/icons/edukasi-teknologi.png" alt="Edukasi & Teknologi" class="w-6 h-6 lg:w-8 lg:h-8" />
                </div>
                <p class="text-[#1d2951] font-semibold text-xs md:text-sm lg:text-base">
                Edukasi &amp; Teknologi
                </p>
            </a>
            <!-- Card 4 -->
            <a href="#" class="bg-white rounded-2xl shadow-lg p-2 md:p-4 flex items-center w-40 md:w-48 lg:w-64 space-x-4">
                <div class="flex-shrink-0 bg-[#f78a28] p-1 md:p-3 rounded-full">
                <img src="/img/icons/seputar-dunia.png" alt="Seputar Dunia" class="w-6 h-6 lg:w-8 lg:h-8" />
                </div>
                <p class="text-[#1d2951] font-semibold text-xs md:text-sm lg:text-base">
                Seputar Dunia
                </p>
            </a>
            </div>
        </div>
    </section>

    <!-- Section Feature & Sidebar with Adjusted Sizes -->
    <section class="py-16 px-4 md:px-20" x-data="sidebarPosts()" x-init="">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8">
            <!-- Left: Featured Post (shrunk) -->
            <div class="md:w-1/2">
            <img
                src="/img/thumb.png"
                alt="Featured"
                class="w-full h-96 rounded-2xl object-cover"
            />
            <div class="flex items-center gap-2 mt-3">
                <span class="bg-[#f78a28] text-white text-[10px] uppercase px-2 py-1 rounded-full">CB Updates</span>
                <span class="text-gray-500 text-xs">22 March 2025</span>
            </div>
            <h3 class="mt-1 text-xl font-bold text-[#151d52] leading-snug">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </h3>
            <a href="#" class="inline-block mt-1 text-xs italic text-gray-600">Read More..</a>
            </div>

            <!-- Right: Sidebar with enlarged search -->
            <div class="md:w-1/2 bg-[#ebebeb] rounded-2xl p-6 flex flex-col">
            <!-- Search (bigger) -->
            <div class="relative">
                <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input
                x-model="search"
                type="text"
                placeholder="Search"
                class="w-full bg-white pl-14 pr-6 py-3 rounded-full text-base focus:outline-none focus:ring-2 focus:ring-[#f78a28]/50 transition"
                />
            </div>

            <!-- Recent Posts -->
            <ul class="mt-6 space-y-4 overflow-y-auto max-h-[400px] pr-2 custom-scrollbar">
                <template x-for="post in filteredPosts" :key="post.id">
                <li class="flex items-start gap-3">
                    <img :src="post.img" alt="" class="h-20 rounded-lg object-cover flex-shrink-0">
                    <div>
                    <h4 class="text-sm md:text-base font-bold text-[#151d52]" x-text="post.title"></h4>
                    <a :href="post.link" class="text-xs md:text-sm italic text-gray-600">Read More..</a>
                    </div>
                </li>
                </template>
                <template x-if="filteredPosts.length === 0">
                <li class="text-center text-gray-500">No results found.</li>
                </template>
            </ul>
            </div>

        </div>
    </section>

    <!-- Section Category Posts -->
    <section class="py-16 px-4 md:px-20">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- CB Updates & Tips Column -->
            <div>
            <!-- Category Pill -->
            <div class="mb-8">
                <span class="inline-block bg-[#f78a28] text-white text-sm font-semibold px-4 py-1 rounded-full">
                CB Updates &amp; Tips
                </span>
            </div>
            <!-- Post List -->
            <ul class="space-y-8">
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
            </ul>
            </div>

            <!-- Bahasa & Budaya Column -->
            <div>
            <!-- Category Pill -->
            <div class="mb-8">
                <span class="inline-block bg-[#f78a28] text-white text-sm font-semibold px-4 py-1 rounded-full">
                Bahasa &amp; Budaya
                </span>
            </div>
            <!-- Post List -->
            <ul class="space-y-8">
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
                <li class="flex flex-col sm:flex-row items-start gap-4">
                <img src="/img/thumb.png" alt="" class="w-full sm:w-48 h-32 object-cover rounded-xl flex-shrink-0">
                <div class="flex-1">
                    <div class="flex items-center text-sm text-gray-600 mb-2 space-x-2">
                    <img src="/img/avatar-halimah.png" alt="Halimah" class="w-6 h-6 rounded-full">
                    <span>Halimah</span>
                    <span>|</span>
                    <span>22 March 2026</span>
                    </div>
                    <h3 class="text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#151d52] leading-snug mb-1">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </h3>
                    <a href="#" class="text-sm italic text-gray-600">Read More..</a>
                </div>
                </li>
            </ul>
            </div>

        </div>
    </section>

    <!-- CBerita Section (cards semakin kecil di semua layar) -->
    <section class="py-16 -mb-5 bg-gradient-to-tr from-[#061342] to-[#414bb9]">
        <div class="max-w-7xl mx-auto md:pl-8 pr-0 flex flex-col md:flex-row items-center md:space-x-8 space-y-8 md:space-y-0">

            <!-- Header + Favicon -->
            <div class="flex-shrink-0 flex items-center space-x-4 text-white">
            <div class="space-y-2 text-center md:text-left">
                <h2 class="text-6xl font-bold">CBerita</h2>
                <p class="text-2xl">Cakrawala Bahasa <br>News Update</p>
                <a href="#"
                class="inline-block mt-4 shadow-[7px_7px_17px_0px_#000000] bg-gradient-to-r from-orange-800 to-orange-400 text-white font-semibold px-6 py-2 rounded-full
                        hover:bg-gradient-to-l from-orange-800 to-orange-400 transition"
                >Ayo Baca!</a>
            </div>
            <img src="/img/favicon.png" alt="favicon"
                class="w-20 transform rotate-[15deg]" />
            </div>

            <!-- Carousel (drag only, no arrows/dots) -->
            <div
            x-data="dragCarousel()"
            x-init="init()"
            @mousedown.prevent="startDrag($event)"
            @mousemove.prevent="onDrag($event)"
            @mouseup.prevent="stopDrag()"
            @mouseleave="stopDrag()"
            class="no-scrollbar cursor-grab flex-1 overflow-hidden"
            >
            <div
                x-ref="wrapper"
                class="flex space-x-6 overflow-x-auto no-scrollbar py-10 pr-10 snap-x snap-mandatory"
                style="scroll-snap-type: x mandatory; overflow-y: hidden;"
            >
                <template x-for="(card,i) in items" :key="i">
                <!-- Semua layar: fixed width 14rem -->
                <div class="flex-shrink-0 w-2/3 sm:w-44 md:w-48 transform hover:-translate-y-1 hover:scale-105 transition-all duration-300">
                    <div class="relative rounded-3xl overflow-hidden shadow-[7px_7px_17px_0px_#000000] bg-gradient-to-r from-blue-950  to-blue-700">
                    <img :src="card.img" alt="" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <div class="absolute bottom-4">
                        <span class="px-3 py-1 rounded-full text-sm font-semibold text-white"
                            x-text="card.label"></span>
                    </div>
                    </div>
                </div>
                </template>
            </div>
            </div>

        </div>
    </section>

    <script>
        function dragCarousel() {
            return {
            items: [
                { img: '/img/berita/cb-updates.png',       label: 'CB Updates & Tips' },
                { img: '/img/berita/bahasa-budaya.png',     label: 'Bahasa & Budaya' },
                { img: '/img/berita/edukasi-teknologi.png', label: 'Edukasi & Teknologi' },
                { img: '/img/berita/seputar-dunia.png',     label: 'Seputar Dunia' },
            ],
            wrapper: null,
            isDragging: false,
            startX: 0,
            scrollStart: 0,

            init() {
                this.wrapper = this.$refs.wrapper;
            },

            startDrag(e) {
                this.isDragging = true;
                this.startX     = e.clientX;
                this.scrollStart= this.wrapper.scrollLeft;
                this.wrapper.style.cursor = 'grabbing';
            },

            onDrag(e) {
                if (!this.isDragging) return;
                const dx = e.clientX - this.startX;
                this.wrapper.scrollLeft = this.scrollStart - dx;
            },

            stopDrag() {
                this.isDragging = false;
                this.wrapper.style.cursor = 'grab';
            },
            }
        }
    </script>

    {{-- script search berita --}}
    <script>
        function sidebarPosts() {
            return {
            search: '',
            posts: [
                { id: 1, img: '/img/thumb.png', title: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', link: '#' },
                { id: 2, img: '/img/thumb.png', title: 'Vivamus luctus urna sed urna ultricies ac tempor dui sagittis.', link: '#' },
                { id: 3, img: '/img/thumb.png', title: 'In condimentum facilisis porta.', link: '#' },
                { id: 4, img: '/img/thumb.png', title: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', link: '#' },
                { id: 5, img: '/img/thumb.png', title: 'Vivamus luctus urna sed urna ultricies ac tempor dui sagittis.', link: '#' },
                { id: 6, img: '/img/thumb.png', title: 'In condimentum facilisis porta.', link: '#' },
            ],
            get filteredPosts() {
                return this.posts.filter(p =>
                p.title.toLowerCase().includes(this.search.toLowerCase())
                );
            }
            }
        }
    </script>

    <x-footer />
    <x-floating-wa />
</body>
</html>