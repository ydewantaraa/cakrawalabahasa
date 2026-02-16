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
                <!-- Dropdown Domisili -->
                <div class="relative">
                    <select x-model="filters.domisili" 
                        class="bg-white border border-gray-300 text-gray-500 rounded-lg px-3 py-2 pr-10 text-sm appearance-none shadow-sm transition-all duration-200 
                            md:px-4 md:py-3 md:text-lg md:pr-12
                            lg:px-6 lg:py-4 lg:text-xl lg:pr-14
                            hover:border-[#151d52] hover:shadow-md
                            focus:outline-none focus:ring-2 focus:ring-[#151d52] focus:border-transparent">
                        <option value="" disabled selected>Domisili</option>
                        <option>Indonesia</option>
                        <option>Malaysia</option>
                        <option>Singapore</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none md:px-3">
                        <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm"></i>
                    </div>
                </div>

                <!-- Dropdown Tipe Tutor -->
                <div class="relative">
                    <select x-model="filters.tipe" 
                        class="bg-white border border-gray-300 text-gray-500 rounded-lg px-3 py-2 pr-10 text-sm appearance-none shadow-sm transition-all duration-200 
                            md:px-4 md:py-3 md:text-lg md:pr-12
                            lg:px-6 lg:py-4 lg:text-xl lg:pr-14
                            hover:border-[#151d52] hover:shadow-md
                            focus:outline-none focus:ring-2 focus:ring-[#151d52] focus:border-transparent">
                        <option value="" disabled selected>Tipe Tutor</option>
                        <option>Public Speaking</option>
                        <option>Programming</option>
                        <option>Keislaman</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none md:px-3">
                        <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm"></i>
                    </div>
                </div>

                <!-- Dropdown Jenis Kelamin -->
                <div class="relative">
                    <select x-model="filters.gender" 
                        class="bg-white border border-gray-300 text-gray-500 rounded-lg px-3 py-2 pr-10 text-sm appearance-none shadow-sm transition-all duration-200 
                            md:px-4 md:py-3 md:text-lg md:pr-12
                            lg:px-6 lg:py-4 lg:text-xl lg:pr-14
                            hover:border-[#151d52] hover:shadow-md
                            focus:outline-none focus:ring-2 focus:ring-[#151d52] focus:border-transparent">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none md:px-3">
                        <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm"></i>
                    </div>
                </div>

                <!-- Dropdown Keahlian -->
                <div class="relative">
                    <select x-model="filters.keahlian" 
                        class="bg-white border border-gray-300 text-gray-500 rounded-lg px-3 py-2 pr-10 text-sm appearance-none shadow-sm transition-all duration-200 
                            md:px-4 md:py-3 md:text-lg md:pr-12
                            lg:px-6 lg:py-4 lg:text-xl lg:pr-14
                            hover:border-[#151d52] hover:shadow-md
                            focus:outline-none focus:ring-2 focus:ring-[#151d52] focus:border-transparent">
                        <option value="" disabled selected>Keahlian</option>
                        <option>Kids</option>
                        <option>Local</option>
                        <option>Global</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none md:px-3">
                        <i class="fas fa-chevron-down text-gray-400 text-xs md:text-sm"></i>
                    </div>
                </div>
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

        <!-- Grid Container untuk Tutor Cards -->
        <!-- Grid 2 kolom di mobile, 4 kolom di desktop -->
        <!-- PERUBAHAN: gap dikurangi agar card lebih rapat -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 md:gap-5 justify-items-center">
            <template x-for="tutor in paginatedTutors()" :key="tutor.nama">
                <div class="bg-white rounded-2xl shadow-lg p-3 md:p-4 w-full max-w-[200px] flex flex-col items-center relative h-[300px] md:h-[320px]">

                    <!-- Image -->
                    <div class="w-[120px] h-[120px] md:w-[130px] md:h-[130px] rounded-xl overflow-hidden shadow-md mb-3">
                        <img :src="tutor.img" alt="" class="object-cover w-full h-full">
                    </div>

                    <div class="flex flex-col justify-center w-full flex-grow">
                        <div class="text-center">
                            <h3 class="font-bold text-sm md:text-base text-[#151d52]" x-text="tutor.nama"></h3>
                            <!-- PERUBAHAN: margin-bottom diperbesar untuk memberi ruang -->
                            <p class="text-gray-500 text-xs mb-3" x-text="tutor.posisi"></p>
                        </div>

                        <!-- PERUBAHAN: margin-bottom diperbesar -->
                        <div class="flex flex-wrap justify-center gap-1 mb-3">
                            <template x-for="tag in tutor.tags">
                                <span class="bg-gray-200 text-[#151d52] rounded-full px-2 py-0.5 text-[10px]" x-text="tag"></span>
                            </template>
                        </div>

                        <!-- PERUBAHAN: margin-bottom diperbesar -->
                        <div class="flex items-center justify-center mb-3">
                            <template x-for="n in 5">
                                <i :class="n <= tutor.rating ? 'fas fa-star text-yellow-400' : 'far fa-star text-gray-300'" class="text-xs"></i>
                            </template>
                            <span class="ml-1 text-[10px] italic text-gray-500" x-text="'('+tutor.review+')'"></span>
                        </div>

                        <div class="flex justify-center">
                            <a href="#" class="bg-[#151d52] text-white font-semibold px-3 py-1.5 rounded-full text-xs hover:bg-[#0d1236] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                                Book Trial
                            </a>
                        </div>
                    </div>

                    <template x-if="tutor.top">
                        <div class="absolute top-2 right-2 bg-[#f78a28] text-white text-[10px] font-semibold px-2 py-0.5 rounded-full shadow">
                            Top Choice
                        </div>
                    </template>

                </div>
            </template>
        </div>

        <!-- Pagination -->
        <div x-show="totalPages > 1" class="flex justify-center mt-10">
            <nav class="flex items-center space-x-1 md:space-x-2">
                <!-- Previous Button -->
                <button 
                    @click="changePage(currentPage - 1)"
                    :disabled="currentPage === 1"
                    :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'"
                    class="p-2 md:p-3 rounded-full transition">
                    <i class="fas fa-chevron-left text-[#151d52]"></i>
                </button>

                <!-- First Page -->
                <template x-if="currentPage > 3">
                    <button 
                        @click="changePage(1)"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-sm md:text-base hover:bg-gray-100 transition text-[#151d52]">
                        1
                    </button>
                    <span class="text-[#151d52]">...</span>
                </template>

                <!-- Page Numbers -->
                <template x-for="page in visiblePages" :key="page">
                    <button 
                        @click="changePage(page)"
                        :class="page === currentPage ? 'bg-[#151d52] text-white' : 'hover:bg-gray-100 text-[#151d52]'"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-sm md:text-base transition">
                        <span x-text="page"></span>
                    </button>
                </template>

                <!-- Last Page -->
                <template x-if="currentPage < totalPages - 2">
                    <span class="text-[#151d52]">...</span>
                    <button 
                        @click="changePage(totalPages)"
                        class="w-8 h-8 md:w-10 md:h-10 rounded-full flex items-center justify-center text-sm md:text-base hover:bg-gray-100 transition text-[#151d52]">
                        <span x-text="totalPages"></span>
                    </button>
                </template>

                <!-- Next Button -->
                <button 
                    @click="changePage(currentPage + 1)"
                    :disabled="currentPage === totalPages"
                    :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-100'"
                    class="p-2 md:p-3 rounded-full transition">
                    <i class="fas fa-chevron-right text-[#151d52]"></i>
                </button>
            </nav>
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
                        nama: 'Mr. Karim ElMahdy',
                        deskripsi: 'Arabic Native Speaker',
                        img: '/img/native-speaker/Mr. Karim ElMahdy.png',
                        rating: 5,
                        review: 80,
                        tags: ['Native', 'Global'],
                        domisili: 'Luar Negeri',
                        tipe: 'Native',
                        gender: 'Laki-laki',
                        keahlian: 'Native',
                    },
                    {
                        id: 2,
                        nama: 'Ms. Malaka Khalil',
                        deskripsi: 'Arabic Native Speaker',
                        img: '/img/native-speaker/Ms. Malaka Khalil.png',
                        rating: 5,
                        review: 80,
                        tags: ['Native', 'Global'],
                        domisili: 'Luar Negeri',
                        tipe: 'Native',
                        gender: 'Perempuan',
                        keahlian: 'Native',
                    },
                    {
                        id: 3,
                        nama: 'Mr. Islam Kara',
                        deskripsi: 'Turkish Native Speaker',
                        img: '/img/native-speaker/Mr. Islam Kara.png',
                        rating: 5,
                        review: 80,
                        tags: ['Native', 'Global'],
                        domisili: 'Malaysia',
                        tipe: 'Native',
                        gender: 'Laki-laki',
                        keahlian: 'Native',
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
                allTags: ['Public Speaking', 'Programming', 'Keislaman', 'Kids', 'Native', 'Global', 'Local', 'Online', 'Math'],
                selectedTags: [],
                currentSlide: 0,
                currentPage: 1,
                itemsPerPage: 10, // Menampilkan 8 tutor per halaman

                tutors: [
                    { nama: 'Mr. Karim ElMahdy', posisi: 'Arabic Native Speaker', img: '/img/native-speaker/Mr. Karim ElMahdy.png', tags: ['Native','Global'], rating: 5, review: 80, top: true },
                    { nama: 'Ms. Malaka Khalil', posisi: 'Arabic Native Speaker', img: '/img/native-speaker/Ms. Malaka Khalil.png', tags: ['Native','Global'], rating: 5, review: 80, top: true },
                    { nama: 'Mr. Islam Kara', posisi: 'Turkish Native Speaker', img: '/img/native-speaker/Mr. Islam Kara.png', tags: ['Native','Global'], rating: 5, review: 80, top: true },
                    { nama: 'Ms. Rumeysa Yaman', posisi: 'Turkish Native Speaker', img: '/img/native-speaker/Ms. Rumeysa Yaman.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mr. Michael', posisi: 'English (U.S) Native Speaker', img: '/img/native-speaker/Mr. Michael.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Dr. Mrs. Diana Velimetova', posisi: 'Russian Native Speaker', img: '/img/native-speaker/Dr. Mrs. Diana Velimetova.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Dr. Mr. Saf Buxy', posisi: 'British Native Speaker', img: '/img/native-speaker/Dr. Mr. Saf Buxy.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mrs. Safira', posisi: 'Russian Native Speaker', img: '/img/native-speaker/Mrs. Safira.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mr. Bertrand', posisi: 'French Native Speaker', img: '/img/native-speaker/Mr. Bertrand.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mrs. Melek', posisi: 'Native Speaker Belanda', img: '/img/native-speaker/Mrs. Melek.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Ms. Daria', posisi: 'Native Speaker Perancis', img: '/img/native-speaker/Ms. Daria.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mr. Stefano', posisi: 'Italian Native Speaker', img: '/img/native-speaker/Mr. Stefano.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mrs. Diana', posisi: 'Spanish Native Speaker', img: '/img/native-speaker/Mrs. Diana.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Mrs. Haruka', posisi: 'Native Speaker Japan', img: '/img/native-speaker/Mrs. Haruka.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Ms. Eun Ji', posisi: 'Native Speaker Korean', img: '/img/native-speaker/Ms. Eun Ji.png', tags: ['Native','Global'], rating: 5, review: 80 },
                    { nama: 'Ms. Akhofa', posisi: 'Tutor Bahasa Inggris', img: '/img/tutor-local/Ms. Akhofa.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Ms. Intan', posisi: 'Dutch Teacher, Dutch Literature UI', img: '/img/tutor-local/Ms. Intan.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Ms. Esti', posisi: 'Russian Teacher, Russian Literature UI', img: '/img/tutor-local/Ms. Esti.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Ms. Evita', posisi: 'Korean Teacher, Korean Literature UI', img: '/img/tutor-local/Ms. Evita.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Ms. Azura', posisi: 'Japanese Teacher, Japanese Literature UI', img: '/img/tutor-local/Ms. Azura.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Ms. Kinanthi', posisi: 'French Teacher, French Literature UI', img: '/img/tutor-local/Ms. Kinanthi.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Mr. Ariawan Ahmad', posisi: 'Spanish Teacher, Univ. Compultense Madrid', img: '/img/tutor-local/Mr. Ariawan Ahmad.png', tags: ['Local'], rating: 5, review: 80 },
                    { nama: 'Mrs. Rauza', posisi: 'Turkish Teacher, Erciyes University, Turkiye', img: '/img/tutor-local/Mrs. Rauza.png', tags: ['Local'], rating: 5, review: 80 },
                ],

                // Menghitung total halaman berdasarkan tutor yang difilter
                get totalPages() {
                    const filtered = this.filteredTutors();
                    return Math.ceil(filtered.length / this.itemsPerPage);
                },

                // Menghitung halaman yang terlihat di pagination
                get visiblePages() {
                    const pages = [];
                    const start = Math.max(1, this.currentPage - 2);
                    const end = Math.min(this.totalPages, this.currentPage + 2);
                    
                    for (let i = start; i <= end; i++) {
                        pages.push(i);
                    }
                    
                    return pages;
                },

                // Mendapatkan tutor yang difilter
                filteredTutors() {
                    if (this.selectedTags.length === 0) return this.tutors;
                    return this.tutors.filter(tutor =>
                        this.selectedTags.every(tag => tutor.tags.includes(tag))
                    );
                },

                // Mendapatkan tutor untuk halaman saat ini
                paginatedTutors() {
                    const filtered = this.filteredTutors();
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    const end = start + this.itemsPerPage;
                    return filtered.slice(start, end);
                },

                // Mengganti halaman
                changePage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                        this.currentSlide = 0; // Reset slider saat ganti halaman
                        // Scroll ke atas bagian tutor
                        document.querySelector('section[x-data="tutorFilter()"]').scrollIntoView({ behavior: 'smooth' });
                    }
                },

                toggleTag(tag) {
                    if (this.selectedTags.includes(tag)) {
                        this.selectedTags = this.selectedTags.filter(t => t !== tag);
                    } else {
                        this.selectedTags.push(tag);
                    }
                    this.currentPage = 1; // Reset ke halaman pertama saat filter berubah
                    this.currentSlide = 0;
                },

                prevSlide() {
                    if (this.currentSlide > 0) {
                        this.currentSlide--;
                    } else if (this.currentPage > 1) {
                        // Jika di slide pertama, pindah ke halaman sebelumnya
                        this.changePage(this.currentPage - 1);
                        this.currentSlide = this.paginatedTutors().length - 1;
                    }
                },

                nextSlide() {
                    if (this.currentSlide < this.paginatedTutors().length - 1) {
                        this.currentSlide++;
                    } else if (this.currentPage < this.totalPages) {
                        // Jika di slide terakhir, pindah ke halaman berikutnya
                        this.changePage(this.currentPage + 1);
                        this.currentSlide = 0;
                    }
                }
            }
        }
    </script>

    <script src="/js/animationsection.js"></script>
</body>
</html>