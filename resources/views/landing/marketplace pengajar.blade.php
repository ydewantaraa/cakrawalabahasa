<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    <!-- Hero Section -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el
            py-5 md:py-16 px-4 md:px-20 mt-10 md:mt-20">
        <div class="relative bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] rounded-[50px] shadow-[0_6px_12px_rgba(0,0,0,0.40)]
                overflow-visible
                w-full max-w-[1000px] mx-auto
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
            <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-4">
                Learn <br> Beyond <br> Borders
            </h1>
            <p class="italic text-white text-lg sm:text-xl md:text-2xl lg:text-3xl">
                Belajar darimanapun <br> dengan siapapun
            </p>
            </div>

            {{-- Gambar tutor --}}
            <div
            class="md:w-1/2 flex justify-end relative z-10 mt-0 sm:-mt-10 md:-mt-6 lg:-mt-10">
            <img
                src="/img/asian.png"
                alt="Tutor"
                class="w-[200px] sm:w-[300px] md:w-[500px] lg:w-[550px] xl:w-[650px] h-auto">
            </div>
        </div>
    </section>

    <!-- Search Tutor -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el">
        <div class="max-w-4xl mx-auto mb-8" x-data="tutorSlider()">
            <!-- Search -->
            <div class="w-auto px-2">
                <div class="relative flex items-center bg-white shadow-lg rounded-full py-3 px-0 md:px-4 w-auto">
                    
                    <!-- ICON DI DALAM INPUT (MOBILE ONLY) -->
                    <i class="fas fa-search absolute left-5 text-gray-400 text-base sm:hidden"></i>
                    
                    <!-- INPUT -->
                    <input 
                    type="text" 
                    placeholder="Cari Tutor Favoritmu..." 
                    x-model="filters.search"
                    class="flex-1 text-base sm:text-lg md:text-xl text-gray-700 placeholder-gray-400 bg-transparent focus:outline-none focus:ring-0 focus:border-none pl-10 sm:pl-0"
                    >
                    
                    <!-- ICON DI SEBELAH KANAN (DESKTOP ONLY) -->
                    <button type="submit" class="text-gray-500 transition hover:text-blue-500 hidden sm:block">
                    <i class="fas fa-search text-lg sm:text-xl"></i>
                    </button>

                </div>
            </div>
            <!-- Filter Dropdown -->
            <div class="mt-6 flex flex-wrap gap-3 justify-center">
                <select x-model="filters.domisili" class="bg-white shadow-[0_6px_12px_rgba(0,0,0,0.40)] rounded-lg px-3 py-2 text-sm md:px-4 md:py-3 md:text-lg lg:px-6 lg:py-4 lg:text-xl">
                    <option value="">Domisili</option>
                    <option>Indonesia</option>
                    <option>Malaysia</option>
                    <option>Singapore</option>
                </select>
                <select x-model="filters.tipe" class="bg-white shadow-[0_6px_12px_rgba(0,0,0,0.40)] rounded-lg px-3 py-2 text-sm md:px-4 md:py-3 md:text-lg lg:px-6 lg:py-4 lg:text-xl">
                    <option value="">Tipe Tutor</option>
                    <option>Public Speaking</option>
                    <option>Programming</option>
                    <option>Keislaman</option>
                </select>
                <select x-model="filters.gender" class="bg-white shadow-[0_6px_12px_rgba(0,0,0,0.40)] rounded-lg px-3 py-2 text-sm md:px-4 md:py-3 md:text-lg lg:px-6 lg:py-4 lg:text-xl">
                    <option value="">Jenis Kelamin</option>
                    <option>Perempuan</option>
                    <option>Laki-laki</option>
                </select>
                <select x-model="filters.keahlian" class="bg-white shadow-[0_6px_12px_rgba(0,0,0,0.40)] rounded-lg px-3 py-2 text-sm md:px-4 md:py-3 md:text-lg lg:px-6 lg:py-4 lg:text-xl">
                    <option value="">Keahlian</option>
                    <option>Kids</option>
                    <option>Local</option>
                    <option>Global</option>
                </select>
            </div>

            <!-- Card Display -->
            <div class="mt-12 relative flex items-center justify-center">
                <button @click="prev()" class="absolute left-2 md:left-4 lg:left-6 xl:-left-8 rounded-full text-[#151d52]">
                    <i class="fas fa-chevron-left text-lg md:text-xl lg:text-2xl"></i>
                </button>

                <template x-if="filteredTutors().length > 0">
                    <div class="bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] p-4 md:p-8 lg:p-10 flex flex-col md:flex-row items-center justify-between w-full max-w-[95%] md:max-w-[90%] lg:max-w-5xl">
                        <!-- Left -->
                        <div class="flex flex-col md:flex-row items-center gap-4 md:gap-8 lg:gap-12">
                            <img :src="filteredTutors()[currentIndex].img" class="w-24 h-24 md:w-32 md:h-32 lg:w-40 lg:h-40 rounded-full object-cover">
                            <div class="text-center md:text-left">
                                <h3 class="font-bold text-xl md:text-3xl lg:text-4xl text-[#151d52]" x-text="filteredTutors()[currentIndex].nama"></h3>
                                <p class="text-sm md:text-lg lg:text-xl text-gray-600 mb-2" x-text="filteredTutors()[currentIndex].deskripsi"></p>
                                <div class="flex justify-center md:justify-start items-center mb-2">
                                    <template x-for="n in 5">
                                        <i :class="n <= filteredTutors()[currentIndex].rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'"></i>
                                    </template>
                                    <span class="ml-2 text-xs md:text-sm italic text-gray-500" x-text="'('+filteredTutors()[currentIndex].review+' Reviews)'"></span>
                                </div>
                                <div class="flex flex-wrap justify-center md:justify-start gap-2">
                                    <template x-for="tag in filteredTutors()[currentIndex].tags">
                                        <span class="text-[10px] md:text-xs lg:text-sm bg-gray-200 rounded-full px-3 py-1" x-text="tag"></span>
                                    </template>
                                </div>
                            </div>
                        </div>

                        <!-- Right -->
                        <div class="flex flex-col items-center md:items-end gap-2 mt-4 md:mt-0">
                            <span class="bg-[#f78a28] text-white px-5 py-2 rounded-full text-center text-xs md:text-sm lg:text-base font-semibold">Top Choice</span>
                            <a href="#" class="bg-[#151d52] text-white font-semibold px-4 py-3 text-center w-[125px] rounded-full text-sm md:text-lg hover:bg-[#0d1236] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                Book Trial
                            </a>
                        </div>
                    </div>
                </template>

                <div x-show="filteredTutors().length === 0" class="text-center text-gray-400">
                    Tidak ada tutor yang sesuai dengan filter.
                </div>

                <button @click="next()" class="absolute right-2 md:right-4 lg:right-6 xl:-right-8 rounded-full text-[#151d52]">
                    <i class="fas fa-chevron-right text-lg md:text-xl lg:text-2xl"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Section Filter & Cards -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-5 px-4 md:px-20" x-data="tutorFilter()">
        <h2 class="text-md sm:text-xl md:text-3xl font-bold text-center mb-10 text-[#151d52]">Kenali Tutor Terbaik</h2>

        <!-- Filter Tags -->
        <div class="flex flex-wrap justify-center gap-3 mb-8">
            <template x-for="tag in allTags" :key="tag">
                <button 
                    @click="toggleTag(tag)"
                    :class="selectedTags.includes(tag) ? 'bg-[#151d52] text-white' : 'bg-gray-200 text-[#151d52]'"
                    class="rounded-full px-5 py-2 text-sm md:text-lg font-semibold transition">
                    <span x-text="tag"></span>
                </button>
            </template>
        </div>

        <!-- Mobile View (Slider) -->
        <div class="relative block md:hidden w-full overflow-hidden">
            <div class="flex transition-transform duration-500" :style="`transform: translateX(-${currentSlide * 100}%);`">
                <template x-for="tutor in filteredTutors()" :key="tutor.nama">
                    <div class="flex-shrink-0 w-full flex justify-center">
                        <div class="bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] p-5 w-[250px] flex flex-col items-center relative h-[450px] my-5">

                            <!-- Image -->
                            <div class="w-[180px] h-[180px] rounded-2xl overflow-hidden shadow mb-4">
                                <img :src="tutor.img" alt="" class="object-cover w-full h-full">
                            </div>

                            <div class="flex flex-col justify-between w-full flex-grow">
                                <div class="text-center">
                                    <h3 class="font-bold text-lg text-[#151d52]" x-text="tutor.nama"></h3>
                                    <p class="text-gray-500 text-sm mb-3" x-text="tutor.posisi"></p>
                                </div>

                                <div class="flex flex-wrap justify-center gap-2 mb-3">
                                    <template x-for="tag in tutor.tags">
                                        <span class="bg-gray-200 text-[#151d52] rounded-full px-3 py-1 text-xs" x-text="tag"></span>
                                    </template>
                                </div>

                                <div class="flex items-center justify-center mb-3">
                                    <template x-for="n in 5">
                                        <i :class="n <= tutor.rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'"></i>
                                    </template>
                                    <span class="ml-2 text-xs italic text-gray-500" x-text="'('+tutor.review+' Reviews)'"></span>
                                </div>

                                <div class="flex justify-center">
                                    <a href="#" class="bg-[#151d52] text-white font-semibold px-5 py-2 rounded-full text-sm hover:bg-[#0d1236] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                        Book Trial
                                    </a>
                                </div>
                            </div>

                            <template x-if="tutor.top">
                                <div class="absolute top-3 right-3 bg-[#f78a28] text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                                    Top Choice
                                </div>
                            </template>

                        </div>
                    </div>
                </template>
            </div>

            <!-- Nav Buttons -->
            <button @click="prevSlide()" class="absolute top-1/2 left-2 transform -translate-y-1/2 rounded-full p-2">
                <i class="fas fa-chevron-left text-[#151d52] text-lg"></i>
            </button>
            <button @click="nextSlide()" class="absolute top-1/2 right-2 transform -translate-y-1/2 rounded-full p-2">
                <i class="fas fa-chevron-right text-[#151d52] text-lg"></i>
            </button>
        </div>

        <!-- Desktop & Tablet View -->
        <div class="hidden md:flex flex-wrap justify-center gap-8">
            <template x-for="tutor in filteredTutors()" :key="tutor.nama">
                <div class="bg-white rounded-3xl shadow-[0_6px_12px_rgba(0,0,0,0.40)] p-5 w-[270px] md:w-[240px] lg:w-[300px] flex flex-col items-center relative h-[470px]">

                    <div class="w-[200px] h-[200px] rounded-2xl overflow-hidden shadow mb-4">
                        <img :src="tutor.img" alt="" class="object-cover w-full h-full">
                    </div>

                    <div class="flex flex-col justify-between w-full flex-grow">
                        <div class="text-center">
                            <h3 class="font-bold text-lg text-[#151d52]" x-text="tutor.nama"></h3>
                            <p class="text-gray-500 text-sm mb-3" x-text="tutor.posisi"></p>
                        </div>

                        <div class="flex flex-wrap justify-center gap-2 mb-3">
                            <template x-for="tag in tutor.tags">
                                <span class="bg-gray-200 text-[#151d52] rounded-full px-3 py-1 text-xs" x-text="tag"></span>
                            </template>
                        </div>

                        <div class="flex items-center justify-center mb-3">
                            <template x-for="n in 5">
                                <i :class="n <= tutor.rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'"></i>
                            </template>
                            <span class="ml-2 text-xs italic text-gray-500" x-text="'('+tutor.review+' Reviews)'"></span>
                        </div>

                        <div class="flex justify-center">
                            <a href="#" class="bg-[#151d52] text-white font-semibold px-6 py-2 rounded-full text-sm hover:bg-[#0d1236] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                Book Trial
                            </a>
                        </div>
                    </div>

                    <template x-if="tutor.top">
                        <div class="absolute top-3 right-3 bg-[#f78a28] text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
                            Top Choice
                        </div>
                    </template>
                </div>
            </template>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WA -->
    <x-floating-wa />

    <script>
        function tutorSlider() {
            return {
                filters: {
                    search: '',
                    domisili: '',
                    tipe: '',
                    gender: '',
                    keahlian: ''
                },
                tutors: [
                    {
                        id: 1,
                        nama: 'Ria Enes',
                        deskripsi: 'Halo, saya Ria dari Indonesia, yuk kita belajar bersama',
                        img: '/img/master-teacher/kak ria enes.png',
                        rating: 5,
                        review: 90,
                        tags: ['Public Speaking', 'Local', 'Kids'],
                        domisili: 'Indonesia',
                        tipe: 'Public Speaking',
                        gender: 'Perempuan',
                        keahlian: 'Kids',
                    },
                    {
                        id: 2,
                        nama: 'Yudha Dewantara',
                        deskripsi: 'Spesialis Programming Laravel & IoT',
                        img: '/img/master-teacher/kak yudha dewantara.png',
                        rating: 5,
                        review: 60,
                        tags: ['Programming', 'Local', 'Global'],
                        domisili: 'Indonesia',
                        tipe: 'Programming',
                        gender: 'Laki-laki',
                        keahlian: 'Global',
                    },
                    {
                        id: 3,
                        nama: 'Syamsri Firdaus',
                        deskripsi: 'Pengajar Keislaman & Parenting Islami',
                        img: '/img/master-teacher/kak syamsri firdaus.png',
                        rating: 5,
                        review: 80,
                        tags: ['Keislaman', 'Kids'],
                        domisili: 'Malaysia',
                        tipe: 'Keislaman',
                        gender: 'Laki-laki',
                        keahlian: 'Kids',
                    },
                ],
                currentIndex: 0,

                filteredTutors() {
                    const result = this.tutors.filter(tutor => {
                        const searchMatch = this.filters.search === '' || tutor.nama.toLowerCase().includes(this.filters.search.toLowerCase());
                        const domisiliMatch = this.filters.domisili === '' || tutor.domisili === this.filters.domisili;
                        const tipeMatch = this.filters.tipe === '' || tutor.tipe === this.filters.tipe;
                        const genderMatch = this.filters.gender === '' || tutor.gender === this.filters.gender;
                        const keahlianMatch = this.filters.keahlian === '' || tutor.keahlian === this.filters.keahlian;
                        return searchMatch && domisiliMatch && tipeMatch && genderMatch && keahlianMatch;
                    });
                    if (this.currentIndex >= result.length) {
                        this.currentIndex = 0;
                    }
                    return result;
                },

                next() {
                    const tutors = this.filteredTutors();
                    if (tutors.length === 0) return;
                    this.currentIndex = (this.currentIndex + 1) % tutors.length;
                },

                prev() {
                    const tutors = this.filteredTutors();
                    if (tutors.length === 0) return;
                    this.currentIndex = (this.currentIndex - 1 + tutors.length) % tutors.length;
                }
            }
        }
    </script>

    <!-- Tutor Filter -->
    <script>
        function tutorFilter() {
            return {
                allTags: ['Public Speaking', 'Programming', 'Keislaman', 'Kids', 'Native', 'Global', 'Online', 'Math'],
                selectedTags: [],
                currentSlide: 0,

                tutors: [
                    { nama: 'Ria Enes', posisi: 'Public Speaking Expert', img: '/img/Ria.png', tags: ['Public Speaking','Kids'], rating: 5, review: 90, top: true },
                    { nama: 'Azura', posisi: 'Language Tutor', img: '/img/Azura.png', tags: ['Native','Global','Kids'], rating: 5, review: 80 },
                    { nama: 'Eun Ji', posisi: 'Native Korean Teacher', img: '/img/Eun ji.png', tags: ['Native','Global'], rating: 5, review: 75 },
                    { nama: 'Yudha Dewantara', posisi: 'Programming Mentor', img: '/img/master-teacher/kak yudha dewantara.png', tags: ['Programming','Global'], rating: 5, review: 88},
                    { nama: 'Syamsri Firdaus', posisi: 'Keislaman Expert', img: '/img/master-teacher/kak syamsri firdaus.png', tags: ['Keislaman','Kids'], rating: 5, review: 95, top: true },
                    { nama: 'Banon Gautama', posisi: 'Seni & Budaya', img: '/img/master-teacher/kak banon gautama.png', tags: ['Kids','Global'], rating: 5, review: 70 }
                ],

                filteredTutors() {
                    if (this.selectedTags.length === 0) return this.tutors;
                    return this.tutors.filter(tutor =>
                        this.selectedTags.every(tag => tutor.tags.includes(tag))
                    );
                },

                toggleTag(tag) {
                    if (this.selectedTags.includes(tag)) {
                        this.selectedTags = this.selectedTags.filter(t => t !== tag);
                    } else {
                        this.selectedTags.push(tag);
                    }
                    this.currentSlide = 0;
                },

                prevSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                    }
                },

                nextSlide() {
                    if (this.currentSlide < this.filteredTutors().length - 1) {
                        this.currentSlide++;
                    }
                }
            }
        }
    </script>

    <script src="/js/animationsection.js"></script>
</body>
</html>