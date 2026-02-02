<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <!-- Header -->
    <x-header />

    <!-- Section Grammar & Translate -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-10 px-4 md:px-20 mt-10 md:mt-20">
        <div class="relative bg-[radial-gradient(ellipse_at_bottom_left,_var(--tw-gradient-stops))] from-[#ea580c] via-[#fb923c] to-[#fed7aa] rounded-[50px] shadow-lg overflow-hidden w-full max-w-[1000px] mx-auto px-6 md:px-10 lg:px-16 py-16">

            <!-- Hiasan pattern -->
            <img src="/img/hiasan1.png" alt="Pattern" 
                class="absolute right-0 bottom-0 h-[220px] sm:h-[260px] md:h-full w-auto z-0 md:top-0">

            <!-- Teks Konten -->
            <div class="relative z-10 text-[#151d52]">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight mb-6">
                    Cek Grammar &<br> Terjemahkan Otomatis, <br>Tanpa Ribet!
                </h1>

                <p class="text-white text-sm sm:text-base md:text-lg lg:text-xl mb-6 max-w-3xl">
                    Gunakan fitur alih bahasa cepat & pengecekan grammar berbasis AI.
                    Cocok untuk pelajar, profesional, dan content creator.
                </p>

                <a href="#" class="inline-block shadow-[7px_7px_17px_0px_#000000] text-white px-8 py-3 rounded-full text-xs md:text-base font-semibold hover:bg-gradient-to-l from-blue-950 via-blue-700 to-blue-500 bg-gradient-to-r from-blue-950 via-blue-700 to-blue-500 hover:shadow-[0_6px_12px_rgba(0,0,0,0.40)] transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
                    Cek Sekarang !
                </a>
            </div>

        </div>
    </section>

    <!-- Section Terjemah Mudah -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-20" x-data="translator()">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-[#151d52] mb-16">
            Terjemah Mudah
        </h2>

        <div class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el relative flex flex-col items-center justify-center space-y-16">

            <!-- Box Bahasa Indonesia -->
            <div 
                class="bg-white rounded-3xl shadow-lg p-6 w-full max-w-xl text-left
                    md:translate-x-[-80px] lg:translate-x-[-100px]">
                <span class="text-gray-400 font-semibold text-sm mb-2 block">Bahasa Indonesia</span>
                <textarea 
                    x-model="indonesiaText" 
                    class="w-full h-32 bg-transparent text-[#151d52] text-lg focus:outline-none resize-none" 
                    placeholder="Ketik kalimat..."></textarea>
            </div>

            <!-- Tombol tengah -->
            <div class="absolute top-[47%] md:top-[44%] z-10">
                <button @click="translate()" class="bg-[#f78a28] p-4 rounded-full shadow-lg text-white text-3xl">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>

            <!-- Box English -->
            <div 
                class="bg-[#151d52] rounded-3xl shadow-lg p-6 w-full max-w-xl text-left text-white
                    md:translate-x-[80px] lg:translate-x-[100px]">
                <span class="text-[#f78a28] font-semibold text-sm mb-2 block">English</span>
                <p class="text-lg" x-text="englishText"></p>
            </div>

        </div>
    </section>

    <!-- Section Auto Correct -->
    <section class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el py-20 px-4 md:px-20" x-data="autoCorrect()">
        <!-- Judul -->
        <h2 class="text-3xl md:text-4xl font-bold text-center text-[#151d52] mb-12">
            <span class="text-[#151d52]">Auto</span>
            <span class="bg-[#f78a28] text-white px-2 rounded">Correct</span>
        </h2>

        <div class="opacity-0 translate-y-5 transition-all duration-700 ease-out fade-el max-w-5xl mx-auto bg-white p-8 rounded-3xl shadow-lg">
            <label class="block text-left font-semibold text-[#151d52] mb-3 text-lg">Your Text:</label>
            <textarea x-model="inputText"
                placeholder="Type your sentence here..."
                class="w-full h-48 rounded-xl border border-gray-300 p-4 text-[#151d52] text-base focus:outline-none resize-none shadow-sm"></textarea>

            <div class="mt-6 flex justify-center">
                <button @click="correct()" 
                    class="bg-[#f78a28] text-white font-semibold px-8 py-3 rounded-full text-lg hover:bg-[#e3701b] transition shadow-lg">
                    Correct My Text
                </button>
            </div>

            <template x-if="correctedText">
                <div class="mt-10 bg-[#151d52] text-white p-6 rounded-2xl shadow-lg">
                    <h3 class="font-semibold text-lg mb-3">Corrected:</h3>
                    <p x-text="correctedText" class="text-base"></p>
                </div>
            </template>
        </div>
    </section>

    <!-- Footer -->
    <x-footer />

    <!-- Floating WA -->
    <x-floating-wa />

    <!-- Terjemah Mudah -->
    <script>
        function translator() {
            return {
                indonesiaText: '',
                englishText: '',
                translate() {
                    if (this.indonesiaText.trim() === '') {
                        this.englishText = 'Please enter a sentence to translate';
                        return;
                    }
                    if (this.indonesiaText.includes("berbahasa asing")) {
                        this.englishText = "I really want to be proficient in foreign languages, and want to be able to learn from anywhere and everywhere";
                    } else {
                        this.englishText = this.indonesiaText.split(' ').map(word => word + ' (EN)').join(' ');
                    }
                }
            }
        }
    </script>

    <!-- Auto Correct -->
    <script>
        function autoCorrect() {
            return {
                inputText: '',
                correctedText: '',

                correct() {
                    // Simulasi auto correct sederhana
                    let text = this.inputText;

                    const corrections = {
                        'wouldalso': 'would also',
                        'chanceto': 'chance to',
                        'personalised,and': 'personalized and',
                        'beimpressed': 'be impressed',
                        'langauge': 'language',
                        'lear': 'learn',
                        'grwo': 'grow',
                        'teh': 'the'
                    };

                    for (const [wrong, correct] of Object.entries(corrections)) {
                        const regex = new RegExp(wrong, 'gi');
                        text = text.replace(regex, correct);
                    }

                    this.correctedText = text;
                }
            }
        }
    </script>

    <script src="/js/animationsection.js"></script>
</body>
</html>