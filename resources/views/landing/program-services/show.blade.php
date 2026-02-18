<!DOCTYPE html>
<html lang="id">

<head>
    <x-head />
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />
    <!-- Section CB For Kids -->
    <section
        class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 md:ps-4 pb-0 md:pr-0 2xl:ps-20 
           bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] relative overflow-hidden">

        <!-- Hiasan pattern -->
        <img src="/img/hiasan1.png" alt="Pattern"
            class="absolute right-0 bottom-0 h-[200px] md:h-[300px] xl:h-[400px] 2xl:h-[500px] w-auto z-0 md:bottom-0">

        <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between z-10">

            <!-- Teks Kiri -->
            <div class="md:w-1/2 text-left pl-10 md:pl-8 lg:pl-16 mb-10 md:mb-0 md:-mt-16 xl:-mt-20 2xl:-mt-24">
                <p class="text-[#151d52] font-semibold text-xl md:text-3xl mb-3">{{ $programService->name }}</p>
                <h1
                    class="text-3xl text-white sm:text-4xl md:text-4xl xl:text-5xl 2xl:text-6xl font-bold leading-tight mb-6">
                    {{ $programService->hero_text }}
                </h1>
            </div>

            <!-- Gambar Orang -->
            <div class="md:w-1/2 flex justify-end items-end pb-10 md:pb-16 mt-4 md:mt-8">
                <img src="{{ $programService->hero_image }}"
                    class="w-[350px] sm:w-[280px] md:w-[450px] lg:w-[550px] 2xl:w-[750px] object-contain">
            </div>

        </div>

        <!-- Lengkungan valley -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

            <!-- Mobile -->
            <svg class="block md:hidden w-full h-24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <path d="M0,20 Q720,100 1440,20" fill="none" stroke="#0b1a53" stroke-width="30"
                    stroke-linecap="round" />
            </svg>

            <!-- md ke atas -->
            <svg class="hidden md:block w-full h-32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"
                preserveAspectRatio="none">
                <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <path d="M0,20 Q720,140 1440,20" fill="none" stroke="#0b1a53" stroke-width="30"
                    stroke-linecap="round" />
            </svg>

        </div>
    </section>


    <!-- Section CB For Kids -->
    <template x-for="card in cards" :key="card.id">
        <div class="flex justify-center">
            <div
                class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden
                   min-w-[180px] sm:min-w-[200px] md:min-w-[220px] lg:min-w-[240px]
                   max-w-[240px] flex flex-col h-[350px] sm:h-[370px] md:h-[380px] lg:h-[380px]">

                <!-- Container gambar -->
                <div class="w-full h-[55%] overflow-hidden">
                    <img :src="card.img" :alt="card.title"
                        class="w-full h-full object-cover object-center" />
                </div>

                <!-- Konten card -->
                <div class="p-4 sm:p-6 lg:p-8 flex-1 flex flex-col justify-between text-center">
                    <h3 class="font-bold text-sm lg:text-base text-[#151d52] truncate" x-text="card.title"></h3>

                    <a :href="`/layanan/${card.id}`"
                        class="hover:-translate-y-1 mt-4 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm lg:text-base">
                        Lihat Detail
                    </a>
                </div>

            </div>
        </div>
    </template>


    <!-- Section Apa itu CB For Kids -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-12 lg:py-16 px-4 md:px-20">
        <div class="flex flex-col md:flex-row items-center justify-center gap-10">

            <!-- Gambar -->
            <div class="relative flex-shrink-0">
                <div
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-[200px] h-[200px] md:w-[250px] md:h-[250px] lg:w-[300px] lg:h-[300px] rounded-full overflow-hidden border-4 border-[#151d52]">
                    <img src="{{ $programService->image_service }}" alt="CB For Kids"
                        class="object-cover w-full h-full">
                </div>

                <!-- Lingkaran Orange Dekoratif -->
                <div class="absolute -top-5 -left-5 w-16 h-16 bg-[#f78a28] rounded-full z-10"></div>
            </div>

            <!-- Teks -->
            <div class="max-w-xl text-center md:text-left">
                <h2 class="text-xl md:text-2xl xl:text-3xl font-bold text-[#151d52] mb-4">
                    Apa itu {{ $programService->name }}?
                </h2>
                <p class="text-[#151d52] text-xs md:text-base 2xl:text-lg leading-relaxed text-justify">
                    {{ $programService->description }}
                </p>
            </div>

        </div>
    </section>

    <div x-data="carouselSection()" x-init="sections = [{
        title: 'Courses',
        cards: @js(
    $courses
        ->map(
            fn($course) => [
                'id' => $course->id,
                'title' => $course->name,
                'img' => $course->thumbnail,
                'program_service_slug' => $course->program_service->slug,
            ],
        )
        ->values(),
)
    }];"
        class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el mb-10 md:mb-16 space-y-16 mt-8 px-0 xl:px-20">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#f78a28]">
            Layanan <span class="text-[#151d52]">Kami</span>
        </h2>

        <template x-for="section in sections" :key="section.title">
            <section>
                <div x-data="carousel(section.cards)" x-init="init()" x-ref="wrapper" class="relative overflow-hidden">
                    <div x-ref="inner" class="flex cursor-grab select-none" @mousedown="startDrag"
                        @touchstart="startDrag" @mouseup="endDrag" @mouseleave="endDrag" @touchend="endDrag"
                        @mousemove="drag" @touchmove="drag"
                        :style="`transform: translateX(-${position}px); transition: transform 0.1s linear;`">
                        <template x-for="card in cards" :key="card.id">
                            <div class="flex justify-center">
                                <div
                                    class="shadow-[0_6px_12px_rgba(0,0,0,0.40)] bg-white rounded-[2rem] m-4 overflow-hidden
                   min-w-[200px] sm:min-w-[240px] md:min-w-[260px] lg:min-w-[280px]
                   max-w-[280px] flex flex-col h-[350px] sm:h-[370px] md:h-[380px] lg:h-[380px]">

                                    <!-- Container gambar -->
                                    <div class="w-full h-[55%] overflow-hidden">
                                        <img :src="card.img" :alt="card.title"
                                            class="w-full h-full object-cover object-center" />
                                    </div>

                                    <!-- Konten card -->
                                    <div class="p-4 sm:p-6 lg:p-8 flex-1 flex flex-col justify-between text-center">
                                        <h3 class="font-bold text-sm lg:text-base text-[#151d52] truncate"
                                            x-text="card.title"></h3>
                                        <a :href="`/program/${card.program_service_slug}/service/${card.id}`"
                                            class="hover:-translate-y-1 mt-4 bg-gradient-to-r from-orange-800 to-orange-400 hover:bg-gradient-to-l from-orange-800 to-orange-400 text-white px-3 lg:px-4 py-2 sm:py-3 rounded-full font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl text-xs sm:text-sm lg:text-base">
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
    <section
        class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el pb-10 px-4 md:px-8 xl:px-20 bg-[#f5f6fa]">
        <h2 class="text-3xl md:text-5xl font-bold text-center mb-8 md:mb-16 text-[#151d52]">
            Fitur Utama <span class="text-[#f78a28]">Kami</span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 xl:gap-12">

            @foreach ($programService->feature_program_services as $feature)
                <div
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 bg-white rounded-3xl shadow-lg p-4 md:p-8 flex items-start gap-4 md:gap-6">
                    <img src="{{ $feature->thumbnail }}" alt="{{ $feature->title }}"
                        class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover aspect-square">
                    <div>
                        <h3
                            class="font-bold text-[#151d52] text-sm md:text-base lg:text-lg xl:text-xl 2xl:text-2xl mb-3">
                            {{ $feature->title }}
                        </h3>
                        <p
                            class="text-[#151d52] text-[11px] md:text-xs lg:text-sm xl:text-base 2xl:text-lg text-justify leading-relaxed">
                            {{ $feature->description }}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- Section Keunggulan CB For Kids -->
    <section
        class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-16 pb-24 md:pb-48 mb-10 bg-[#151d52] text-white relative overflow-hidden">

        <h2 class="text-3xl md:text-5xl font-bold text-center mb-16">
            Keunggulan <span class="text-[#f78a28]">CB For Kids</span>
        </h2>

        <div x-data="carouselKeunggulan()" x-init="init()" class="relative">

            <div class="flex cursor-grab select-none" @mousedown="startDrag($event)" @touchstart="startDrag($event)"
                @mouseup="endDrag()" @mouseleave="endDrag()" @touchend="endDrag()" @mousemove="drag($event)"
                @touchmove="drag($event)" :style="`transform: translateX(-${position}px)`"
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

                        <img :src="card.image"
                            class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 rounded-full object-cover mb-3 sm:mb-4 mt-6">

                        <h3 class="font-bold text-sm sm:text-base md:text-lg  text-[#151d52] mb-2 sm:mb-3"
                            x-text="card.title"></h3>

                        <p class="text-[11px] sm:text-sm md:text-base leading-relaxed text-white" x-text="card.desc">
                        </p>
                    </div>
                </template>

            </div>
        </div>
        <!-- Lengkungan valley dengan garis biru tua -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none pointer-events-none z-10">

            <!-- Mobile -->
            <svg class="block md:hidden w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path fill="#f0f5ff" d="M0,20 Q720,100 1440,20 L1440,120 L0,120 Z" />
                <!-- Garis lengkung -->
                <path d="M0,20 Q720,100 1440,20" fill="none" stroke-linecap="round" />
            </svg>

            <!-- md ke atas -->
            <svg class="hidden md:block w-full h-40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160"
                preserveAspectRatio="none">
                <!-- Latar -->
                <path fill="#f0f5ff" d="M0,20 Q720,140 1440,20 L1440,160 L0,160 Z" />
                <!-- Garis lengkung -->
                <path d="M0,20 Q720,140 1440,20" fill="none" stroke-linecap="round" />
            </svg>

        </div>
    </section>
    <!-- Script Section Keunggulan CB For Kids -->
    <script>
        function carouselKeunggulan() {
            return {
                cards: [{
                        icon: '/img/icon-tutor.png',
                        image: '/img/anak-sentris.png',
                        title: 'Anak Sentris & Tutor Berkualitas',
                        desc: 'Layanan khusus anak yang dipandu oleh tutor profesional ramah anak dan berpengalaman.'
                    },
                    {
                        icon: '/img/icon-mentor.png',
                        image: '/img/kak-seto.png',
                        title: 'Dimentori Kak Seto Mulyadi',
                        desc: 'Dimentori langsung oleh Kak Seto untuk kenyamanan anak-anak belajar.'
                    },
                    {
                        icon: '/img/icon-growth.png',
                        image: '/img/tumbuh-kembang.png',
                        title: 'Tumbuh Kembang Maksimal',
                        desc: 'Mengembangkan keterampilan anak dan dipantau orangtua.'
                    },
                    {
                        icon: '/img/icon-class.png',
                        image: '/img/kelas-interaktif.png',
                        title: 'Kelas Kecil dan Interaktif',
                        desc: 'Jumlah siswa terbatas memastikan interaksi optimal dengan tutor.'
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
                        return {
                            ...card,
                            uniqueId: uid++
                        };
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
                sections: [{
                    title: 'CB For Kids',
                    cards: [{
                            id: 'super-kid',
                            img: '/img/Super Kid.png',
                            title: 'Super Kids'
                        },
                        {
                            id: 'language-stars',
                            img: '/img/Fun Language.png',
                            title: 'Language Stars'
                        },
                        {
                            id: 'child-artist',
                            img: '/img/Child Artist.png',
                            title: 'Child Artist'
                        },
                        {
                            id: 'best-parenting',
                            img: '/img/best parenting.png',
                            title: 'Best Parenting'
                        }
                    ]
                }]
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
                    this.dragStartX = e.touches?.[0]?.clientX || e.clientX;
                    this.dragStartPos = this.position;
                },

                drag(e) {
                    if (!this.dragging) return;
                    const clientX = e.touches?.[0]?.clientX || e.clientX;
                    let newPos = this.dragStartPos - (clientX - this.dragStartX);

                    // batas minimum 0, maksimum isi - lebar tampilan
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
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('coursesData', {
                cards: @json($courses->map(fn($course) => ['id' => $course->id, 'title' => $course->name, 'img' => asset('storage/' . $course->thumbnail)]))
            });
        });
    </script>

    <script src="/js/animationsection.js"></script>

    <x-footer />
    <x-floating-wa />
</body>

</html>
