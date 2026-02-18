<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

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
            // triple-duplicate untuk smooth infinite
            this.itemsLoop = [...this.items, ...this.items, ...this.items];
            this.$nextTick(() => {
            this.wrapper   = this.$refs.wrapper;
            this.loopWidth = this.wrapper.scrollWidth / 3;
            this.wrapper.scrollLeft = this.loopWidth;   // start di buffer tengah
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
</head>
<body class="mx-auto font-sans" perspective-[1000px] x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    {{-- Hero --}}
    <section class="bg-white relative overflow-visible pr-0 py-7 md:py-20 2xl:py-36 px-4 md:px-0 md:pl-12 bg-gradient-to-r from-[#071344] to-blue-500">
        <!-- Background Gedung UI -->
        <div class="absolute inset-0">
            <img src="/img/gedung-ui.jpg" alt="Background Gedung UI dan Karakter" class="w-full h-full object-cover object-right md:object-left opacity-15" />
        </div>

        {{-- Hiasan pattern --}}
        <img
            src="/img/hiasan4.png"
            alt="Pattern"
            class="absolute left-0 top-0 w-auto h-[90%] z-0"
        />

        {{-- Hiasan pattern bulat --}}
        <img
            src="/img/hiasan-bulat.png"
            alt="Pattern"
            class="absolute right-0 bottom-0 top-0 h-full z-0 opacity-40"
        />

        <div class="relative z-10 grid md:grid-cols-2 items-center text-white">
            <!-- Text Section -->
            <div>
            <h2 class="text-md sm:text-lg md:text-4xl xl:text-5xl font-bold mb-2 mt-4 pt-2 pb-2 xl:pt-0 xl:pb-0">About Us</h2>
            <p class="text-xs sm:text-sm md:pt-2 pb-2 mr-4 md:mr-[-4] italic md:text-md xl:text-xl leading-relaxed text-justify">
                Cakrawala Bahasa is an integrated, globally connected center for language, arts, and soft skills, based at Universitas Indonesia. It serves learners from children to adults through diverse, innovative learning programs and services, combining real-life experiences, blended learning, and support international curricula. Led by master tutors and native speakers from various countries, Cakrawala Bahasa is committed to contributing to the Sustainable Development Goals (SDGs), particularly in economic growth, quality education, and accessible, inclusive learning for all.
            </p>
            <div class="mt-4 mb-4 md:mb-0 md:mt-6 inline-block italic bg-gradient-to-r shadow-[5px_5px_8px_2px_#000000] from-orange-800 to-orange-400 text-white font-semibold px-4 py-2 md:px-8 md:py-4 rounded-full text-sm md:text-md xl:text-xl">
                "Bridging The World Through Language"
            </div>
            </div>

            <!-- Image Section -->
            <div class="relative min-h-[200px] md:min-h-[365px]">
            <img src="/img/people-aboutus.png" 
                alt="Karakter dan Balon Bahasa" 
                class="absolute bottom-[-85px] md:bottom-[-170px] xl:bottom-[-245px] 2xl:bottom-[-295px] right-0 w-[300px] md:w-[500px] lg:w-[700px] drop-shadow-2xl" />
            </div>
        </div>
    </section>

    {{-- Traction dan Social Impact --}}
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el bg-white py-20 md:py-36 mt-10 px-4 md:px-20 text-center">
        <h2 class="text-2xl md:text-5xl font-bold text-[#151d52] mb-12">Traction</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-[#151d52]">
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 200) this.count += 1;
                        else {
                        this.count = 200;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-traction/Icon Active Clients.png" alt="Active Clients" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Active Clients</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 1000) this.count += 4;
                        else {
                        this.count = 1000;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-traction/Icon Clients Served.png" alt="Clients Served" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Clients Served</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 30) this.count += 1;
                        else {
                        this.count = 30;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-traction/Icon Partnerships.png" alt="Partnerships" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Partnerships</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 1000) this.count += 4;
                        else {
                        this.count = 1000;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-traction/Icon Global Tutors.png" alt="Tutors" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Global Tutors</p>
            </div>
        </div>

        <h2 class="text-2xl md:text-5xl font-bold text-[#151d52] mt-24 mb-12">Social Impact</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-[#151d52]">
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 100) this.count += 1;
                        else {
                        this.count = 100;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-impact/Icon Lives Impacted.png" alt="Lives Impacted" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Lives Impacted</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 20) this.count += 1;
                        else {
                        this.count = 20;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-impact/Icon Orphanages.png" alt="Orphanages" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Orphanages</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 10) this.count += 1;
                        else {
                        this.count = 10;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-impact/Icon Social Project.png" alt="Social Project" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Social Projects</p>
            </div>
            <div 
                x-data="{
                    count: 0,
                    started: false,
                    observer: null,
                    startCounting() {
                    if (this.started) return;
                    this.started = true;
                    let i = setInterval(() => {
                        if (this.count < 100) this.count += 1;
                        else {
                        this.count = 100;
                        clearInterval(i);
                        }
                    }, 20);
                    }
                }" 
                x-init="observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) startCounting();
                    });
                    observer.observe($el);
                "
                >
            <img src="/img/icon-impact/Icon Global Volunteers.png" alt="Volunteer" class="mx-auto w-20 md:w-28 lg:w-36 mb-3">
            <p class="text-xl md:text-3xl lg:text-4xl font-bold text-orange-500"><span x-text="`+${count}`"></span></p>
            <p class="text-sm md:text-lg lg:text-xl">Global Volunteers</p>
            </div>
        </div>
    </section>

    {{-- Our Team Section --}}
    <section class="relative bg-[#f78a28] py-20 pl-4 pr-0 md:pl-20 overflow-hidden">
        <!-- Hiasan Icon -->
        <img src="/img/hiasan1.png" alt="Hiasan Icon"
            class="absolute bottom-0 right-0 w-64 md:w-1/3 pointer-events-none select-none z-0" />

        <h2 class="text-3xl md:text-5xl font-bold text-center mb-16 text-white">
            Our <span class="text-blue-900">Team</span>
        </h2>

        <!-- Wrapper: flex-col di HP, flex-row di desktop -->
        <div class="flex flex-col md:flex-row gap-4 items-start md:items-end">
            
            <!-- === Card Kak Rizky (statis) === -->
            <div class="relative w-[330px] h-[270px] flex-shrink-0 mx-auto md:mx-0 transform transition-all duration-200 hover:-translate-y-2">
            <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                        bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                <div class="absolute top-6 left-6">
                <p class="text-[#f78a28] font-bold text-2xl md:text-3xl mt-12">Kak Rizky</p>
                <p class="text-white italic text-lg md:text-xl">Founder</p>
                </div>
            </div>
            <img src="/img/kak-rizky.png" alt="Kak Rizky"
                class="absolute right-0 bottom-0 h-[320px] rounded-br-[24px] object-contain pointer-events-none" />
            </div>

            <!-- === Scrollable Cards (mobile: di bawah, tetap bisa digeser) === -->
            <div class="overflow-x-auto no-scrollbar w-full mt-6 md:mt-0 pt-10 pb-4">
                <div class="flex gap-6 w-max px-2 overflow-visible relative">

                    {{-- <!-- Card Kak Azizah -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                        <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                    bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                            <div class="absolute top-6 left-6">
                            <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Azizah</p>
                            <p class="text-white italic text-sm md:text-base">Chief Marketing <br>Officer</p>
                            </div>
                        </div>
                        <img src="/img/kak-azizah.png" alt="Kak Azizah"
                            class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none z-10" />
                    </div> --}}

                    <!-- Card Kak Yudha -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                        <div class="absolute top-6 left-6">
                        <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Yudha</p>
                        <p class="text-white italic text-sm md:text-base">Chief Technology <br>Officer</p>
                        </div>
                    </div>
                    <img src="/img/our-team/kak yudha.png" alt="Kak Yudha"
                        class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none" />
                    </div>

                    <!-- Card Kak Sidiq -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                        <div class="absolute top-6 left-6">
                        <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Rina</p>
                        <p class="text-white italic text-sm md:text-base">Chief Marketing <br>Officer</p>
                        </div>
                    </div>
                    <img src="/img/our-team/kak rina.png" alt="Kak Rina"
                        class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none" />
                    </div>

                    {{-- <!-- Card Kak Azizah -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                        <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                    bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                            <div class="absolute top-6 left-6">
                            <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Azizah</p>
                            <p class="text-white italic text-sm md:text-base">Chief Marketing <br>Officer</p>
                            </div>
                        </div>
                        <img src="/img/kak-azizah.png" alt="Kak Azizah"
                            class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none z-10" />
                    </div> --}}

                    <!-- Card Kak Yudha -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                        <div class="absolute top-6 left-6">
                        <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Sidiq</p>
                        <p class="text-white italic text-sm md:text-base">Chief Program <br>Officer</p>
                        </div>
                    </div>
                    <img src="/img/our-team/kak sidiq.png" alt="Kak Sidiq"
                        class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none" />
                    </div>

                    <!-- Card Kak Sidiq -->
                    <div class="relative w-[260px] h-[220px] shrink-0 cursor-grab transform transition-all duration-200 hover:-translate-y-2">
                    <div class="absolute inset-0 bg-[#142550] rounded-tl-[24px] rounded-tr-[80px] rounded-bl-[80px] rounded-br-[24px]
                                bg-[url('/img/hiasan-our-team.png')] bg-[length:70%] bg-left bg-no-repeat shadow-[0_8px_14px_rgba(0,0,0,0.80)]">
                        <div class="absolute top-6 left-6">
                        <p class="text-[#f78a28] font-bold text-xl md:text-2xl mt-4">Kak Adrian</p>
                        <p class="text-white italic text-sm md:text-sm">Multimedia Designer</p>
                        </div>
                    </div>
                    <img src="/img/our-team/kak adrian.png" alt="Kak Adrian"
                        class="absolute right-0 bottom-0 h-[240px] rounded-br-[24px] object-contain pointer-events-none" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Mentor --}}
    <section class="bg-[#151d52] py-16 text-center text-white">
        <h2 class="text-3xl md:text-5xl font-bold mb-16">
            <span class="text-[#f78a28]">Our</span> Mentor
        </h2>

        <div class="flex space-x-4 py-5 overflow-x-auto scrollbar-hide pb-4 px-4 justify-start md:justify-center">
            
            <!-- Mentor Card -->
            <div class="flex-shrink-0 md:w-[150px] lg:w-[200px] transform transition-all duration-200 hover:-translate-y-2 text-center">
                <img src="/img/our-mentor/Prof. Seto Mulyadi.png" alt="Mentor"
                    class="w-32 h-32 lg:w-44 lg:h-44 rounded-full mx-auto bg-[#f78a28] object-cover" />
                <p class="text-lg md:text-xl lg:text-2xl font-bold mt-4 text-[#f78a28]">Prof. Seto M.</p>
                <p class="text-sm md:text-base lg:text-lg">Mentor</p>
            </div>

            <div class="flex-shrink-0 md:w-[150px] lg:w-[200px] transform transition-all duration-200 hover:-translate-y-2 text-center">
                <img src="/img/our-mentor/Dr. Ade Solihat.png" alt="Mentor"
                    class="w-32 h-32 lg:w-44 lg:h-44 rounded-full mx-auto bg-[#f78a28] object-cover" />
                <p class="text-lg md:text-xl lg:text-2xl font-bold mt-4 text-[#f78a28]">Dr. Ade Solihat</p>
                <p class="text-sm md:text-base lg:text-lg">Mentor</p>
            </div>

            <div class="flex-shrink-0 md:w-[150px] lg:w-[200px] transform transition-all duration-200 hover:-translate-y-2 text-center">
                <img src="/img/our-mentor/Kak Ria Enes.png" alt="Mentor"
                    class="w-32 h-32 lg:w-44 lg:h-44 rounded-full mx-auto bg-[#f78a28] object-cover" />
                <p class="text-lg md:text-xl lg:text-2xl font-bold mt-4 text-[#f78a28]">Kak Ria Enes</p>
                <p class="text-sm md:text-base lg:text-lg">Mentor</p>
            </div>

            <div class="flex-shrink-0 md:w-[150px] lg:w-[200px] transform transition-all duration-200 hover:-translate-y-2 text-center">
                <img src="/img/our-mentor/Edy Fajar Prasetyo.png" alt="Mentor"
                    class="w-32 h-32 lg:w-44 lg:h-44 rounded-full mx-auto bg-[#f78a28] object-cover" />
                <p class="text-lg md:text-xl lg:text-2xl font-bold mt-4 text-[#f78a28]">Edy Fajar P.</p>
                <p class="text-sm md:text-base lg:text-lg">Mentor</p>
            </div>

            <div class="flex-shrink-0 md:w-[150px] lg:w-[200px] transform transition-all duration-200 hover:-translate-y-2 text-center">
                <img src="/img/our-mentor/Panji Aziz.png" alt="Mentor"
                    class="w-32 h-32 lg:w-44 lg:h-44 rounded-full mx-auto bg-[#f78a28] object-cover" />
                <p class="text-lg md:text-xl lg:text-2xl font-bold mt-4 text-[#f78a28]">Panji Aziz</p>
                <p class="text-sm md:text-base lg:text-lg">Mentor</p>
            </div>

        </div>
    </section>

    <!-- Toggle + Carousel Section -->
    <script>
        // Toggle state + reset to "all" after 10s
        function toggleValues() {
            return {
            selected: 'all',
            timer: null,
            select(val) {
                this.selected = val;
                clearTimeout(this.timer);
                this.timer = setTimeout(() => this.selected = 'all', 10000);
            }
            }
        }
    </script>

    {{-- Our Value --}}
    <section x-data="toggleValues()" class="relative py-24">
        <h2 class="text-3xl md:text-5xl text-center font-bold mb-16">
            <span class="text-[#f78a28]">Our</span> Value
        </h2>

        <!-- ALL VALUES -->
        <template x-if="selected === 'all'">
            <section
                x-data="carousel({
                    speed: 1,
                    items: [
                    { img:'/img/value/integrity.png',    letter:'IN',  title:'Integrity',    desc:'Demonstrating consistency, honesty, and commitment in work and fostering trust.',    color:'orange' },
                    { img:'/img/value/collaboration.png', letter:'C',   title:'Collaboration', desc:'Engaging in various collaborations with partners on both national and international levels.', color:'blue'   },
                    { img:'/img/value/responsibility.png',letter:'R',   title:'Responsibility',desc:'Adhering to company regulations and taking responsibility for assigned tasks.',                color:'orange' },
                    { img:'/img/value/engagement.png',    letter:'E',   title:'Engagement',    desc:'Building bonds or engagement with clients based on professional and familial values.',  color:'blue'   },
                    { img:'/img/value/diversity.png',     letter:'D',   title:'Diversity',     desc:'Promoting cultural diversity and perspectives internally to foster team work support.',color:'orange' },
                    { img:'/img/value/innovation.png',    letter:'I',   title:'Innovation',    desc:'Offering a range of unique and innovative services tailored to customer needs.',            color:'blue'   },
                    { img:'/img/value/sustainable.png',   letter:'BLE', title:'Sustainable',   desc:'Managing company resources wisely to support corporate sustainability.',               color:'orange' }
                    ]
                })"
                x-init="init()"
                class="relative overflow-hidden"
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
                    <div class="flex-shrink-0 w-1/2 sm:w-1/3 md:w-1/4 xl:w-1/6 h-full mt-2 mb-5 md:px-2 xl:px-0">
                        <div class="relative rounded-[30px] overflow-hidden shadow-[0_8px_14px_rgba(0,0,0,0.80)] transform transition-all duration-200 hover:-translate-y-2">
                        <img :src="card.img" alt="" class="w-full h-full object-cover">

                        <!-- Overlay grid to keep content inside image -->
                        <div class="absolute inset-0 bg-black/30 text-white px-4 py-6 flex flex-col items-center justify-end text-center">
                            
                            <!-- LETTER -->
                            <div 
                            class="text-[3rem] md:text-[3.5rem] lg:text-[4rem] 2xl:text-[5rem] font-extrabold leading-none"
                            :class="card.color==='orange' ? 'text-[#f78a28]' : 'text-[#1d2951]'"
                            x-text="card.letter"
                            ></div>

                            <!-- TITLE -->
                            <div 
                            class="mt-2 px-4 py-1 rounded-full font-semibold uppercase text-xs sm:text-sm md:text-sm lg:text-base"
                            :class="card.color==='orange' ? 'bg-[#f78a28] text-white' : 'bg-[#1d2951] text-white'"
                            x-text="card.title"
                            ></div>

                            <!-- DESCRIPTION -->
                            <p class="mt-2 italic text-[10px] md:text-xs 2xl:text-sm leading-snug px-2" x-text="card.desc"></p>
                        </div>
                        </div>
                    </div>
                    </template>
                </div>
            </section>
        </template>

        <!-- INTERNAL VALUES -->
        <template x-if="selected === 'internal'">
            <section
                x-data="carousel({
                    speed: 1,
                    items: [
                    { img:'/img/value/integrity.png',    letter:'IN',  title:'Integrity',    desc:'Demonstrating consistency, honesty, and commitment in work and fostering trust.',    color:'orange' },
                    { img:'/img/value/responsibility.png',letter:'R',   title:'Responsibility',desc:'Adhering to company regulations and taking responsibility for assigned tasks.',                color:'orange' },
                    { img:'/img/value/diversity.png',     letter:'D',   title:'Diversity',     desc:'Promoting cultural diversity and perspectives internally to foster team work support.',color:'orange' },
                    { img:'/img/value/sustainable.png',   letter:'BLE', title:'Sustainable',   desc:'Managing company resources wisely to support corporate sustainability.',               color:'orange' }
                    ]
                })"
                x-init="init()"
                class="relative overflow-hidden"
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
                    <div class="flex-shrink-0 w-1/2 sm:w-1/3 md:w-1/4 xl:w-1/6 h-full mb-5">
                        <div class="relative rounded-[30px] overflow-hidden shadow-[0_8px_14px_rgba(0,0,0,0.80)] transform transition-all duration-200 hover:-translate-y-2">
                        <img :src="card.img" alt="" class="w-full h-full object-cover">

                        <!-- Overlay grid to keep content inside image -->
                        <div class="absolute inset-0 bg-black/30 text-white px-4 py-6 flex flex-col items-center justify-end text-center">
                            
                            <!-- LETTER -->
                            <div 
                            class="text-[2.5rem] sm:text-[3rem] md:text-[4rem] lg:text-[4.5rem] xl:text-[5rem] font-extrabold leading-none"
                            :class="card.color==='orange' ? 'text-[#f78a28]' : 'text-[#1d2951]'"
                            x-text="card.letter"
                            ></div>

                            <!-- TITLE -->
                            <div 
                            class="mt-2 px-4 py-1 rounded-full font-semibold uppercase text-xs sm:text-sm md:text-sm lg:text-base"
                            :class="card.color==='orange' ? 'bg-[#f78a28] text-white' : 'bg-[#1d2951] text-white'"
                            x-text="card.title"
                            ></div>

                            <!-- DESCRIPTION -->
                            <p class="mt-2 italic text-[10px] md:text-xs 2xl:text-sm leading-snug px-2" x-text="card.desc"></p>
                        </div>
                        </div>
                    </div>
                    </template>
                </div>
            </section>
        </template>

        <!-- EXTERNAL VALUES (PERBAIKAN LAYOUT & UKURAN) -->
        <template x-if="selected === 'external'">
            <section
                x-data="carousel({
                    speed: 1,
                    items: [
                    { img:'/img/value/collaboration.png', letter:'C', title:'Collaboration', desc:'Engaging in various collaborations with partners on both national and international levels.', color:'blue' },
                    { img:'/img/value/engagement.png',    letter:'E', title:'Engagement',    desc:'Building bonds or engagement with clients based on professional and familial values.', color:'blue' },
                    { img:'/img/value/innovation.png',    letter:'I', title:'Innovation',    desc:'Offering a range of unique and innovative services tailored to customer needs.', color:'blue' }
                    ]
                })"
                x-init="init()"
                class="relative overflow-hidden"
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
                    <!-- Lebar disesuaikan agar tidak terlalu kecil karena itemnya sedikit -->
                    <div class="flex-shrink-0 w-1/2 sm:w-1/3 md:w-1/4 xl:w-1/6 h-full mb-5">
                        <div class="relative rounded-[30px] overflow-hidden shadow-[0_8px_14px_rgba(0,0,0,0.80)] transform transition-all duration-200 hover:-translate-y-2 h-full">
                        <img :src="card.img" alt="" class="w-full h-full object-cover">

                        <!-- Overlay diubah menjadi Flexbox agar rapi (sama seperti Internal) -->
                        <div class="absolute inset-0 bg-black/30 text-white px-4 py-6 flex flex-col items-center justify-end text-center">
                            
                            <!-- LETTER -->
                            <div 
                            class="text-[2.5rem] sm:text-[3rem] md:text-[4rem] lg:text-[4.5rem] xl:text-[5rem] font-extrabold leading-none text-[#1d2951]"
                            x-text="card.letter"
                            ></div>

                            <!-- TITLE -->
                            <div 
                            class="mt-2 px-4 py-1 rounded-full font-semibold uppercase text-xs sm:text-sm md:text-sm lg:text-base bg-[#1d2951] text-white"
                            x-text="card.title"
                            ></div>

                            <!-- DESCRIPTION -->
                            <p class="mt-2 italic text-[10px] md:text-xs 2xl:text-sm leading-snug px-2" x-text="card.desc"></p>
                        </div>
                        </div>
                    </div>
                    </template>
                </div>
            </section>
        </template>

        <!-- Toggle Buttons @ bottom-right -->
        <div class="absolute bottom-4 right-4 flex space-x-4">
            <button
            @click="select('internal')"
            :class="selected==='internal'
                ? 'bg-[#232c5f] text-[#f78a28]'
                : 'bg-[#f78a28] text-[#232c5f]'"
            class="px-6 py-2 rounded-2xl font-bold shadow transition text-xl"
            >
            Internal<br><span class="text-sm font-normal text-white italic">Values</span>
            </button>
            <button
            @click="select('external')"
            :class="selected==='external'
                ? 'bg-[#232c5f] text-[#f78a28]'
                : 'bg-[#f78a28] text-[#232c5f]'"
            class="px-6 py-2 rounded-2xl font-bold shadow transition text-xl"
            >
            External<br><span class="text-sm font-normal text-white italic">Values</span>
            </button>
        </div>
    </section>

    <!-- The CB’s Stories Section -->
    <section x-data="carouselStories()" x-init="init()" class="py-10">
        <h2 class="text-3xl font-bold text-center mb-8"></h2>
        <h2 class="text-3xl md:text-5xl text-center font-bold mb-16">
            The CB’s Stories
        </h2>

        <div class="relative overflow-hidden"
            @mouseenter="paused = true"
            @mouseleave="paused = false"
        >
        <div
            x-ref="wrapper"
            class="flex space-x-8 overflow-x-scroll no-scrollbar cursor-grab select-none"
            @mousedown.prevent="startDrag($event)"
            @mousemove.prevent="onDrag($event)"
            @mouseup.prevent="stopDrag()"
            @mouseleave="stopDrag()"
        >
            <template x-for="(story, i) in itemsLoop" :key="i">
            <div class="relative flex-shrink-0 w-64 mt-16 px-2">
                <!-- month & year above the circles, with extra gap -->
                <div class="absolute -top-14 left-1/2 transform -translate-x-1/2 text-center">
                {{-- <div class="text-sm italic text-gray-600" x-text="story.month"></div> --}}
                <div class="text-2xl font-bold text-[#f78a28]" x-text="story.year"></div>
                </div>

                <!-- blue marker -->
                <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 mt-2">
                <div class="w-5 h-5 border-2 border-[#1d2951] rounded-full flex items-center justify-center">
                    <div class="w-3 h-3 bg-[#1d2951] rounded-full"></div>
                </div>
                </div>
                <!-- grey dots to the right of marker -->
                <div class="absolute mt-2 left-1/2 transform translate-x-4 -translate-y-1/2 flex space-x-2">
                <template x-for="n in 15" :key="n">
                    <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                </template>
                </div>

                <!-- card itself, padded to clear circles -->
                <div class="mt-12 rounded-3xl overflow-hidden shadow-[0_8px_14px_rgba(0,0,0,0.80)] transform transition-all duration-200 hover:-translate-y-2">
                <img :src="story.img" alt="" class="w-full h-full object-cover">
                </div>

                <!-- description below -->
                <p class="mt-4 text-center italic text-sm text-gray-700" x-text="story.desc"></p>
            </div>
            </template>
        </div>
        </div>
    </section>

    <script>
        function carouselStories(){
        return {
            items: [
            { month:'March', year:'2019', img:'/img/stories/2019.png', desc:'Community Roots' },
            { month:'June',  year:'2020', img:'/img/stories/2020.png', desc:'Private Course Initiative' },
            { month:'April', year:'2021', img:'/img/stories/2021.png', desc:'Sociopreneurship Transformation' },
            { month:'April', year:'2022', img:'/img/stories/2022.png', desc:'Program Consolidation and Service Expansion' },
            { month:'April', year:'2024', img:'/img/stories/2024.png', desc:'AI Driven Learning with a Child-Friendly Approach' },
            ],
            itemsLoop: [],
            wrapper: null,
            loopWidth: 0,
            paused: false,
            dragging: false,
            startX: 0,
            scrollStart: 0,
            speed: 1,

            init(){
            // triple-duplicate for infinite buffer
            this.itemsLoop = [...this.items, ...this.items, ...this.items];
            this.$nextTick(() => {
                this.wrapper   = this.$refs.wrapper;
                this.loopWidth = this.wrapper.scrollWidth / 3;
                this.wrapper.scrollLeft = this.loopWidth;  // start in middle
                this.autoScroll();
            });
            },

            autoScroll(){
            if (!this.paused && !this.dragging){
                this.wrapper.scrollLeft += this.speed;
                if (this.wrapper.scrollLeft >= this.loopWidth * 2){
                this.wrapper.scrollLeft -= this.loopWidth;
                }
            }
            requestAnimationFrame(() => this.autoScroll());
            },

            startDrag(e){
            this.dragging    = true;
            this.startX      = e.clientX;
            this.scrollStart = this.wrapper.scrollLeft;
            this.wrapper.style.cursor = 'grabbing';
            },

            onDrag(e){
            if (!this.dragging) return;
            const dx = e.clientX - this.startX;
            this.wrapper.scrollLeft = this.scrollStart - dx;
            },

            stopDrag(){
            this.dragging = false;
            this.wrapper.style.cursor = 'grab';
            }
        }
        }
    </script>

    <!-- ===========================
        SECTION 1: PARTNERS & CLIENTS
        =========================== -->
    <section class="py-20 bg-[#f9f9f9]">
        <h2 class="text-3xl md:text-5xl text-center font-bold mb-12">
            Our Partners &amp; Clients
        </h2>

        <!-- BARIS 1: PARTNERS -->
        <div class="relative overflow-hidden mb-12"
             x-data="carouselPartners(itemsRow1)"
             x-init="init()"
             @mouseenter="paused = true"
             @mouseleave="paused = false"
        >
            <div
                x-ref="wrapper"
                class="flex items-center space-x-8 overflow-x-scroll no-scrollbar cursor-grab select-none"
                @mousedown.prevent="startDrag($event)"
                @mousemove.prevent="onDrag($event)"
                @mouseup.prevent="stopDrag()"
                @mouseleave="stopDrag()"
            >
                <template x-for="(partner, i) in itemsLoop" :key="i">
                    <a 
                    {{-- :href="partner.url" target="_blank"  --}}
                    class="flex-shrink-0 h-20 max-w-[140px] md:h-32 md:max-w-none flex items-center justify-center p-2 rounded-lg">
                        <img :src="partner.img" alt="" class="object-contain w-full h-full" />
                    </a>
                </template>
            </div>
        </div>

        <!-- BARIS 2: CLIENTS -->
        <div class="relative overflow-hidden"
             x-data="carouselPartners(itemsRow2)"
             x-init="init()"
             @mouseenter="paused = true"
             @mouseleave="paused = false"
        >
            <div
                x-ref="wrapper"
                class="flex items-center space-x-8 overflow-x-scroll no-scrollbar cursor-grab select-none"
                @mousedown.prevent="startDrag($event)"
                @mousemove.prevent="onDrag($event)"
                @mouseup.prevent="stopDrag()"
                @mouseleave="stopDrag()"
            >
                <template x-for="(partner, i) in itemsLoop" :key="i">
                    <a 
                    {{-- :href="partner.url" target="_blank" --}}
                    class="flex-shrink-0 h-20 max-w-[140px] md:h-32 md:max-w-none flex items-center justify-center p-2 rounded-lg">
                        <img :src="partner.img" alt="" class="object-contain w-full h-full" />
                    </a>
                </template>
            </div>
        </div>
    </section>

    <!-- ===========================
        SECTION 2: SUPPORTED BY (Baru)
        =========================== -->
    <section class="py-20 bg-[#ededed]">
        <h2 class="text-3xl md:text-5xl text-center font-bold mb-12">
            Supported By
        </h2>

        <!-- BARIS 3: SUPPORTED BY LOGOS -->
        <div class="relative overflow-hidden"
             x-data="carouselPartners(itemsRow3)"
             x-init="init()"
             @mouseenter="paused = true"
             @mouseleave="paused = false"
        >
            <div
                x-ref="wrapper"
                class="flex items-center space-x-8 overflow-x-scroll no-scrollbar cursor-grab select-none"
                @mousedown.prevent="startDrag($event)"
                @mousemove.prevent="onDrag($event)"
                @mouseup.prevent="stopDrag()"
                @mouseleave="stopDrag()"
            >
                <template x-for="(partner, i) in itemsLoop" :key="i">
                    <a 
                    {{-- :href="partner.url" target="_blank"  --}}
                    class="flex-shrink-0 h-20 max-w-[140px] md:h-32 md:max-w-none flex items-center justify-center p-2 rounded-lg">
                        <img :src="partner.img" alt="" class="object-contain w-full h-full" />
                    </a>
                </template>
            </div>
        </div>
    </section>

    {{-- LOGO SCROLL SCRIPT --}}
    <script>
        // --- DATA BARIS 1 (Partners) ---
        const itemsRow1 = [
            { img: '/img/logo/logo1.png', url: '' },
            { img: '/img/logo/logo2.png', url: '' },
            { img: '/img/logo/logo3.png', url: '' },
            { img: '/img/logo/logo4.png', url: '' },
            { img: '/img/logo/logo5.png', url: '' },
            { img: '/img/logo/qonstanta.png', url: '' },
            { img: '/img/logo/smart brain.png', url: '' },
            { img: '/img/logo/natiq institute arabiyyah.png', url: '' },
            { img: '/img/logo/brilliant international education.png', url: '' },
            { img: '/img/logo/cakap.png', url: '' },
            { img: '/img/logo/danone.png', url: '' },
            { img: '/img/logo/huawei.png', url: '' },
            { img: '/img/logo/pt jayatama selaras.png', url: '' },
        ];

        // --- DATA BARIS 2 (Clients) ---
        const itemsRow2 = [
            { img: '/img/logo/logo-yotz-media.webp', url: '#' },
            { img: '/img/logo/logo-glints.webp', url: '#' },
            { img: '/img/logo/logo-teman-karir.webp', url: '#' },
            { img: '/img/logo/logo-sejuta-cita.webp', url: '#' },
            { img: '/img/logo/logo-yot.webp', url: '#' },
            { img: '/img/logo/logo-indo-milenial.webp', url: '#' },
            { img: '/img/logo/logo-youth-ranger.webp', url: '#' },
            { img: '/img/logo/logo-youth-break.webp', url: '#' },
            { img: '/img/logo/logo-aiesec-ui.webp', url: '#' },
            { img: '/img/logo/logo-ppi-dunia.webp', url: '#' },
            { img: '/img/logo/logo-santri-mendunia.webp', url: '#' },
            { img: '/img/logo/logo-humas-dpr.webp', url: '#' },
        ];

        // --- DATA BARIS 3 (Supported By) ---
        const itemsRow3 = [
            { img: '/img/logo/logo-distp-ui.webp', url: '#' },      // DISTP UI
            { img: '/img/logo/logo-adb.webp', url: '#' },            // ADB
            { img: '/img/logo/logo-kemendikti.webp', url: '#' },     // Kemendikti
            { img: '/img/logo/logo-kemenpora.webp', url: '#' },      // Kemenpora RI
            { img: '/img/logo/logo-pemkot-depok.webp', url: '#' },   // Pemkot Depok
        ];

        // --- FUNGSI CAROUSEL ---
        function carouselPartners(items){
            return {
                items: items,
                itemsLoop: [],
                wrapper: null,
                loopWidth: 0,
                paused: false,
                dragging: false,
                startX: 0,
                scrollStart: 0,
                speed: 1,

                init(){
                this.itemsLoop = [...this.items, ...this.items, ...this.items];
                this.$nextTick(()=>{
                    this.wrapper   = this.$refs.wrapper;
                    this.loopWidth = this.wrapper.scrollWidth / 4;
                    this.wrapper.scrollLeft = this.loopWidth;
                    this.autoScroll();
                });
                },

                autoScroll(){
                if (!this.paused && !this.dragging){
                    this.wrapper.scrollLeft += this.speed;
                    if (this.wrapper.scrollLeft >= this.loopWidth * 2){
                    this.wrapper.scrollLeft -= this.loopWidth;
                    }
                }
                requestAnimationFrame(()=> this.autoScroll());
                },

                startDrag(e){
                this.dragging    = true;
                this.startX      = e.clientX;
                this.scrollStart = this.wrapper.scrollLeft;
                this.wrapper.style.cursor = 'grabbing';
                },

                onDrag(e){
                if (!this.dragging) return;
                const dx = e.clientX - this.startX;
                this.wrapper.scrollLeft = this.scrollStart - dx;
                },

                stopDrag(){
                this.dragging = false;
                this.wrapper.style.cursor = 'grab';
                }
            }
        }
    </script>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WA -->
    <x-floating-wa />

    {{-- script logo --}}

    <script src="/js/animationsection.js"></script>
    </body>
</html>