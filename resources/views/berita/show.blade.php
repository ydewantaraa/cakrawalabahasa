<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .custom-scrollbar::-webkit-scrollbar { width: 8px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background-color: rgba(0,0,0,0.2); border-radius: 8px; }
        .custom-scrollbar::-webkit-scrollbar-track { background-color: transparent; }
        .custom-scrollbar { scrollbar-width: thin; scrollbar-color: rgba(0,0,0,0.2) transparent; }

        .hero-overlay {
            background: linear-gradient(to top, rgba(6,19,66,0.95) 0%, rgba(6,19,66,0.6) 35%, rgba(6,19,66,0.15) 65%, transparent 100%);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.7s cubic-bezier(0.16,1,0.3,1) forwards; }
        .fade-up-d1 { animation: fadeUp 0.7s 0.15s cubic-bezier(0.16,1,0.3,1) forwards; opacity: 0; }
        .fade-up-d2 { animation: fadeUp 0.7s 0.3s cubic-bezier(0.16,1,0.3,1) forwards; opacity: 0; }

        .article-body p { margin-bottom: 1.25rem; line-height: 1.9; color: #4b5563; font-size: 0.95rem; }
        .article-body h2 {
            font-size: 1.35rem; font-weight: 700; color: #151d52;
            margin: 2.25rem 0 0.75rem; position: relative; padding-left: 1rem;
        }
        .article-body h2::before {
            content: ''; position: absolute; left: 0; top: 4px; bottom: 4px;
            width: 4px; background: linear-gradient(to bottom, #f78a28, #ea580c); border-radius: 4px;
        }
        .article-body blockquote {
            border-left: 5px solid #f78a28; padding: 1rem 1.5rem; margin: 2rem 0;
            background: linear-gradient(135deg, #fff7ed, #ffedd5); border-radius: 0 20px 20px 0;
            font-style: italic; color: #9a3412; font-weight: 500;
        }
        .article-body img { border-radius: 20px; margin: 2rem 0; box-shadow: 0 8px 28px rgba(0,0,0,0.08); }
        .article-body ul, .article-body ol { margin: 1rem 0 1.5rem 1.5rem; color: #4b5563; }
        .article-body li { margin-bottom: 0.5rem; line-height: 1.8; }
        .article-body .press-label {
            display: inline-block; background: #f78a28; color: white; font-size: 0.7rem;
            font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em;
            padding: 0.25rem 0.75rem; border-radius: 9999px; margin-bottom: 1rem;
        }

        .read-more-link { position: relative; display: inline-block; transition: all 0.25s ease; }
        .read-more-link::after {
            content: ''; position: absolute; bottom: -2px; left: 0;
            width: 0; height: 2px; background: #f78a28; border-radius: 2px; transition: width 0.3s ease;
        }
        .read-more-link:hover { color: #f78a28 !important; }
        .read-more-link:hover::after { width: 100%; }

        .back-btn { transition: all 0.25s ease; }
        .back-btn:hover { transform: translateX(-4px); }

        .share-btn { transition: all 0.2s ease; }
        .share-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(0,0,0,0.15); }

        .tag-pill { transition: all 0.2s ease; }
        .tag-pill:hover { transform: scale(1.05); }

        .related-card { transition: all 0.3s cubic-bezier(0.16,1,0.3,1); }
        .related-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.1); }

        #reading-progress {
            position: fixed; top: 0; left: 0; height: 3px; z-index: 9999;
            background: linear-gradient(to right, #ea580c, #f78a28, #fb923c);
            width: 0%; transition: width 0.1s linear;
        }

        .toast-in { animation: toastIn 0.4s cubic-bezier(0.16,1,0.3,1) forwards; }
        .toast-out { animation: toastOut 0.3s ease forwards; }
        @keyframes toastIn {
            from { opacity: 0; transform: translateX(-50%) translateY(20px); }
            to   { opacity: 1; transform: translateX(-50%) translateY(0); }
        }
        @keyframes toastOut {
            from { opacity: 1; transform: translateX(-50%) translateY(0); }
            to   { opacity: 0; transform: translateX(-50%) translateY(20px); }
        }

        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="detailPage()" x-init="init()">

    <div id="reading-progress"></div>

    <x-header />

    <!-- ============================================================ -->
    <!--  DATA BERITA MANUAL — Hanya 2 berita                         -->
    <!-- ============================================================ -->
    @php
        $semuaBerita = [
            1 => [
                'title'     => 'Cakrawala Bahasa: Mengubah Wajah Pendidikan Indonesia!',
                'image'     => '/img/berita/berita1.png',
                'category'  => 'CB Updates & Tips',
                'author'    => 'Cakrawala Bahasa',
                'avatar'    => '/img/berita/berita1.png',
                'date'      => 'Oktober 2024',
                'readTime'  => '5 menit baca',
                'tags'      => ['CakrawalaBahasa', 'Pendidikan', 'Sociopreneurship', 'SDGs', 'Startup'],
                'body'      => '
                    <span class="press-label">Siaran Pers — Untuk Segera Diterbitkan</span>

                    <p>Jakarta, Oktober 2024 – Cakrawala Bahasa, startup pendidikan bahasa dan budaya inovatif, didirikan pasca COVID-19 oleh Rizqy Maulana H, S.Hum, C.NLP, a.k.a Rizky Yildiz (26), alumni Universitas Indonesia.</p>

                    <blockquote>"Kami ingin Cakrawala Bahasa menjembatani siswa dengan dunia melalui berbagai inovasi layanan yang terkoneksi global tanpa batasan sosial, budaya, dan finansial sehingga kami mengintegrasikan model sociopreneurship sekaligus mendukung SDGs."</blockquote>

                    <p>Sejak berdirinya, Cakrawala Bahasa telah menghadirkan inovasi dalam pembelajaran bahasa dengan menawarkan berbagai pilihan bahasa yang diajarkan oleh native speaker.</p>

                    <blockquote>"Pada saat itu, masih jarang kursus bahasa yang menyediakan pengajaran langsung dari penutur asli. Momentum ini semakin berkembang ketika pandemi memaksa banyak orang beralih belajar bahasa secara online."</blockquote>

                    <p>Oleh karena itu, Cakrawala Bahasa berkomitmen untuk menyediakan pendidikan yang berkualitas dan inklusif bagi semua kalangan.</p>

                    <h2>Memperluas Cakupan Layanan</h2>

                    <p>Cakrawala Bahasa memperluas cakupan layanannya secara lebih komprehensif di bidang bahasa, dengan menambahkan program budaya dan berbagai soft skills. Startup ini telah melayani ratusan hingga ribuan orang melalui berbagai layanan dan keanggotaan yang inovatif dan terkoneksi global, mulai dari:</p>

                    <ul>
                        <li>Kursus bahasa</li>
                        <li>Program budaya</li>
                        <li>Beragam soft-skill</li>
                        <li>Persiapan studi</li>
                        <li>Edu-tourism</li>
                        <li>Hingga beasiswa</li>
                    </ul>

                    <p>Program Cakrawala Bahasa melibatkan pelajar Indonesia yang menempuh studi di dalam dan luar negeri, serta peran pemuda dari berbagai negara, sehingga meningkatkan jangkauan dan kredibilitas di tingkat global.</p>

                    <h2>Mengubah Wajah Pendidikan Indonesia</h2>

                    <p>Cakrawala Bahasa mengubah wajah pendidikan Indonesia yang selama ini penuh kesenjangan dan cenderung membosankan. Dengan mengadopsi model sociopreneurship, Cakrawala Bahasa memiliki keunggulan melalui perpaduan pendidikan, kewirausahaan, dan tanggung jawab sosial.</p>

                    <p>Meskipun menargetkan kalangan menengah ke atas sebagai pelanggan utama, Cakrawala Bahasa tetap merangkul semua lapisan masyarakat dengan mendukung Tujuan Pembangunan Berkelanjutan (SDGs), khususnya dalam penyediaan pendidikan berkualitas (SDG 4) dan pengurangan ketimpangan (SDG 10) melalui program beasiswa untuk individu kurang mampu.</p>

                    <p>Cakrawala Bahasa bertujuan menciptakan peserta didik sebagai warga dunia (global citizen) yang berpikiran terbuka, dengan fokus pada pembelajaran yang dirancang untuk menghadapi tantangan abad ke-21, serta penekanan pada praktik dan pengalaman global sekaligus melibatkan praktisi dalam pembelajaran.</p>

                    <p>Cakrawala Bahasa berencana mengintegrasikan teknologi AI, VR, dan AR dalam proses pembelajaran yang lebih interaktif dan inovatif.</p>

                    <h2>Penghargaan dan Prestasi</h2>

                    <p>Cakrawala Bahasa merupakan salah satu startup binaan dari DISTP Universitas Indonesia yang memeroleh pendanaan dari ADB dan Kemendikbud juga telah menerima berbagai penghargaan, termasuk dari KEMENPORA RI sebagai salah satu juara Wirausaha Muda Prestasi Tingkat Nasional Tahun 2022.</p>

                    <p>Startup ini memiliki pengikut setia dari kalangan pendidik, siswa, dan profesional yang ingin meningkatkan keterampilan dan memperluas wawasan mereka. Cakrawala Bahasa berencana memperluas layanannya dan menjalin lebih banyak kemitraan dengan komunitas, sekolah dan institusi di seluruh Indonesia dan mancanegara.</p>

                    <p>Informasi lebih lanjut silakan kunjungi <strong>www.cakrawalabahasa.com</strong>.</p>

                    <div style="margin-top:2.5rem; padding:1.5rem; background:#f0f5ff; border-radius:20px; border:1px solid #e0e7ff;">
                        <p style="font-weight:700; color:#151d52; margin-bottom:0.5rem; font-size:0.85rem;">Kontak Media:</p>
                        <p style="margin-bottom:0.25rem; font-size:0.85rem;"><strong>CakrawalaBahasa</strong></p>
                        <p style="margin-bottom:0.25rem; font-size:0.85rem;">Email: office@cakrawalabahasa.com</p>
                        <p style="margin-bottom:0; font-size:0.85rem;">Telepon: +62 856-1481-109</p>
                    </div>
                ',
            ],
            2 => [
                'title'     => 'Kembalinya Ria Enes Susan: Mengabdikan Diri di Dunia Pendidikan Anak Bersama Cakrawala Bahasa',
                'image'     => '/img/berita/berita2.jpg',
                'category'  => 'Bahasa & Budaya',
                'author'    => 'Cakrawala Bahasa',
                'avatar'    => '/img/berita/berita2.jpg',
                'date'      => 'Oktober 2024',
                'readTime'  => '4 menit baca',
                'tags'      => ['PendidikanAnak', 'PublicSpeaking', 'Bahasa', 'SoftSkill', 'CakrawalaBahasa'],
                'body'      => '
                    <span class="press-label">Siaran Pers — Untuk Segera Diterbitkan</span>

                    <p>Jakarta, Oktober 2024 – Ria Enes Susan, sosok yang pernah dikenal luas melalui program televisi anak-anak dengan boneka legendaris "Susan", kini kembali hadir bukan di layar kaca, melainkan di dunia pendidikan.</p>

                    <p>Setelah sekian lama tidak tampil di media, Ria Enes kini mengabdikan diri sebagai pengajar di Cakrawala Bahasa, sebuah startup pendidikan inovatif yang berfokus pada Pendidikan bahasa, budaya, dan softskill.</p>

                    <p>Sebagai salah satu ikon masa kecil generasi 90-an, kehadiran Ria Enes Susan di dunia pendidikan membawa angin segar bagi para orang tua dan siswa. Dedikasinya untuk memberikan pengajaran berkualitas kini diwujudkan melalui perannya di Cakrawala Bahasa, tempat ia berbagi ilmu kepada anak-anak Indonesia.</p>

                    <h2>Pengalaman dan Dedikasi untuk Anak-anak</h2>

                    <p>Setelah dikenal melalui acara anak-anak yang edukatif, Ria Enes tidak pernah berhenti peduli pada perkembangan anak-anak. Selama bertahun-tahun, ia memperdalam pengetahuannya di bidang pendidikan dan pengembangan anak, hingga akhirnya memutuskan untuk mengajar di Cakrawala Bahasa.</p>

                    <p>Dengan pendekatan yang menggabungkan pengalaman luasnya di dunia hiburan dan pendidikan, Ria Enes berusaha menciptakan lingkungan belajar yang interaktif, menyenangkan, dan mendidik.</p>

                    <p>Dalam perannya sebagai pengajar, Ria Enes memberikan materi pembelajaran yang tidak hanya fokus pada penguasaan bahasa, tetapi juga pada pengembangan karakter dan keterampilan sosial anak-anak. Program yang ia ajar di Cakrawala Bahasa sangat berfokus pada soft skills dan komunikasi, dua aspek penting yang akan membantu anak-anak tumbuh menjadi individu yang percaya diri dan kompetitif di kancah global.</p>

                    <h2>Berkolaborasi dengan Cakrawala Bahasa</h2>

                    <p>Cakrawala Bahasa adalah startup binaan Universitas Indonesia yang fokus pada pendidikan inovatif dengan berbagai layanan bahasa, budaya, dan soft skills. Melalui kolaborasi dengan publik figur dan praktisi pendidikan anak seperti Ria Enes, Cakrawala Bahasa mampu menjadi layanan edukasi yang inovatif dan terdepan.</p>

                    <p>Saat ini, Ria Enes ditugaskan Cakrawala Bahasa mengajar Ekstrakulikuler Public Speaking di TKIA 1 Kebayoran Baru, salah satu mitra sekolah dari Cakrawala Bahasa.</p>

                    <blockquote>"Bergabung di Cakrawala Bahasa mengajar anak-anak public speaking membantu mereka mengenali emosi dan berkomunikasi dengan baik, bukan sekadar tampil di depan publik."</blockquote>

                    <blockquote>"Jujur, tidak mudah, tapi bagi anak-anak ini akan jauh lebih mudah di masa depan, karena mereka sudah memiliki dasar-dasar yang benar dalam berkomunikasi."</blockquote>

                    <p>Ria Enes berharap dapat memberikan dampak positif bagi pendidikan anak. Informasi lebih lanjut tentang Cakrawala Bahasa dan program yang diajarkan oleh Ria Enes, silakan kunjungi website dan ikuti media sosial kami.</p>

                    <div style="margin-top:2.5rem; padding:1.5rem; background:#f0f5ff; border-radius:20px; border:1px solid #e0e7ff;">
                        <p style="font-weight:700; color:#151d52; margin-bottom:0.5rem; font-size:0.85rem;">Kontak Media:</p>
                        <p style="margin-bottom:0.25rem; font-size:0.85rem;"><strong>CakrawalaBahasa</strong></p>
                        <p style="margin-bottom:0.25rem; font-size:0.85rem;">Email: office@cakrawalabahasa.com</p>
                        <p style="margin-bottom:0; font-size:0.85rem;">Telepon: +62 856-1481-109</p>
                    </div>
                ',
            ],
        ];

        $id = request()->route('id', 1);
        $berita = $semuaBerita[$id] ?? $semuaBerita[1];

        // Berita terkait (berita lain selain yang sedang dibaca)
        $terkait = array_filter($semuaBerita, function($key) use ($id) {
            return $key != $id;
        }, ARRAY_FILTER_USE_KEY);
    @endphp

    <!-- ==================== -->
    <!-- HERO BANNER          -->
    <!-- ==================== -->
    <section class="relative pt-16 md:pt-20">
        <div class="relative w-full h-[45vh] sm:h-[50vh] md:h-[62vh] overflow-hidden">
            <img src="{{ $berita['image'] }}" alt="{{ $berita['title'] }}" class="w-full h-full object-cover">
            <div class="hero-overlay absolute inset-0"></div>

            <div class="absolute bottom-0 left-0 right-0 pb-8 md:pb-14 px-4 md:px-10 xl:px-20">
                <div class="max-w-4xl fade-up">
                    <a href="/" class="back-btn inline-flex items-center gap-2 text-white/80 hover:text-white text-sm font-medium mb-5 bg-white/10 backdrop-blur-md px-5 py-2.5 rounded-full border border-white/20">
                        <i class="fas fa-arrow-left text-xs"></i>
                        Kembali ke Beranda
                    </a>

                    <div class="flex flex-wrap items-center gap-3 mb-4">
                        <span class="bg-[#f78a28] text-white text-[10px] md:text-xs uppercase px-3 py-1 rounded-full font-semibold tracking-wide">{{ $berita['category'] }}</span>
                        <span class="text-white/60 text-xs md:text-sm"><i class="far fa-calendar-alt mr-1"></i> {{ $berita['date'] }}</span>
                        <span class="text-white/40">•</span>
                        <span class="text-white/60 text-xs md:text-sm"><i class="far fa-clock mr-1"></i> {{ $berita['readTime'] }}</span>
                    </div>

                    <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-white leading-tight">
                        {{ $berita['title'] }}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== -->
    <!-- CONTENT + SIDEBAR    -->
    <!-- ==================== -->
    <section class="py-10 md:py-16 px-4 md:px-10 xl:px-20">
        <div class="max-w-6xl mx-auto flex flex-col lg:flex-row gap-10">

            <!-- ====== MAIN ====== -->
            <div class="lg:w-2/3">

                <!-- Author Bar -->
                <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-8 pb-8 border-b border-gray-200 fade-up-d1">
                    <div class="flex items-center gap-3 flex-1">
                        <img src="{{ $berita['avatar'] }}" alt="{{ $berita['author'] }}" class="w-12 h-12 rounded-full object-cover ring-2 ring-[#f78a28]/30">
                        <div>
                            <p class="font-semibold text-[#151d52] text-sm">{{ $berita['author'] }}</p>
                            <p class="text-xs text-gray-400">Siaran Pers</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button @click="shareWa()" class="share-btn w-9 h-9 rounded-full bg-green-500 text-white flex items-center justify-center text-sm hover:bg-green-600"><i class="fab fa-whatsapp"></i></button>
                        <button @click="shareFb()" class="share-btn w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center text-sm hover:bg-blue-700"><i class="fab fa-facebook-f"></i></button>
                        <button @click="shareTw()" class="share-btn w-9 h-9 rounded-full bg-sky-500 text-white flex items-center justify-center text-sm hover:bg-sky-600"><i class="fab fa-twitter"></i></button>
                        <button @click="copyLink()" class="share-btn w-9 h-9 rounded-full bg-[#151d52] text-white flex items-center justify-center text-sm hover:bg-[#0f1442]"><i class="fas fa-link"></i></button>
                        <button @click="bookmark()" class="share-btn w-9 h-9 rounded-full border-2 border-[#f78a28] text-[#f78a28] flex items-center justify-center text-sm hover:bg-[#f78a28] hover:text-white"><i class="far fa-bookmark"></i></button>
                    </div>
                </div>

                <!-- Article Body -->
                <div class="article-body fade-up-d2">
                    {!! $berita['body'] !!}
                </div>

                <!-- Tags -->
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3"><i class="fas fa-tags mr-1"></i> Tags</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($berita['tags'] as $tag)
                            <span class="tag-pill px-3 py-1.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full cursor-pointer hover:bg-[#f78a28] hover:text-white transition-all">#{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Share Box -->
                <div class="mt-8 p-6 bg-gradient-to-r from-orange-50 to-amber-50 rounded-2xl border border-orange-100">
                    <p class="font-semibold text-[#151d52] mb-3"><i class="fas fa-share-alt mr-2 text-[#f78a28]"></i>Bagikan artikel ini</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <button @click="shareWa()" class="flex items-center gap-2 px-4 py-2.5 bg-green-500 text-white text-sm font-medium rounded-full hover:bg-green-600 transition shadow-md"><i class="fab fa-whatsapp"></i> WhatsApp</button>
                        <button @click="shareFb()" class="flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-full hover:bg-blue-700 transition shadow-md"><i class="fab fa-facebook-f"></i> Facebook</button>
                        <button @click="shareTw()" class="flex items-center gap-2 px-4 py-2.5 bg-sky-500 text-white text-sm font-medium rounded-full hover:bg-sky-600 transition shadow-md"><i class="fab fa-twitter"></i> Twitter</button>
                        <button @click="copyLink()" class="flex items-center gap-2 px-4 py-2.5 bg-[#151d52] text-white text-sm font-medium rounded-full hover:bg-[#0f1442] transition shadow-md"><i class="fas fa-link"></i> Salin Link</button>
                    </div>
                </div>

                <!-- Related Articles -->
                @if(count($terkait) > 0)
                <div class="mt-14">
                    <h3 class="text-lg md:text-xl font-bold text-[#151d52] mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-7 bg-gradient-to-b from-[#f78a28] to-[#ea580c] rounded-full"></span>
                        Artikel Terkait
                    </h3>
                    <div class="grid sm:grid-cols-1 gap-6">
                        @foreach($terkait as $key => $item)
                        <a href="/berita/{{ $key }}" class="related-card bg-white rounded-2xl overflow-hidden shadow-md group block">
                            <div class="flex flex-col sm:flex-row">
                                <div class="relative overflow-hidden sm:w-56 flex-shrink-0">
                                    <img src="{{ $item['image'] }}" alt="" class="w-full h-48 sm:h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    <span class="absolute top-3 left-3 bg-[#f78a28] text-white text-[10px] uppercase px-2 py-0.5 rounded-full font-semibold">{{ $item['category'] }}</span>
                                </div>
                                <div class="p-5 flex flex-col justify-center">
                                    <h4 class="font-bold text-[#151d52] text-sm md:text-base line-clamp-2 group-hover:text-[#f78a28] transition-colors">{{ $item['title'] }}</h4>
                                    <div class="flex items-center gap-2 mt-3 text-xs text-gray-400">
                                        <img src="{{ $item['avatar'] }}" class="w-5 h-5 rounded-full" alt="">
                                        <span>{{ $item['author'] }}</span>
                                        <span>•</span>
                                        <span>{{ $item['date'] }}</span>
                                    </div>
                                    <span class="read-more-link text-sm italic text-gray-600 mt-2">Read More..</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>

            <!-- ====== SIDEBAR ====== -->
            <aside class="lg:w-1/3">
                <div class="sticky top-24 space-y-6">

                    <!-- Search -->
                    <div class="bg-white rounded-2xl shadow-md p-5">
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" placeholder="Cari artikel..." class="w-full bg-gray-50 pl-12 pr-4 py-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#f78a28]/50 transition border border-gray-100">
                        </div>
                    </div>

                    <!-- Popular Posts -->
                    <div class="bg-[#ebebeb] rounded-2xl p-5">
                        <h4 class="font-semibold text-[#151d52] text-sm mb-4 flex items-center gap-2">
                            <i class="fas fa-fire text-[#f78a28]"></i> Berita Lainnya
                        </h4>
                        <ul class="space-y-4">
                            @foreach($semuaBerita as $key => $pop)
                            <li class="flex items-start gap-3 cursor-pointer group">
                                <span class="text-2xl font-bold text-gray-300 group-hover:text-[#f78a28] transition-colors flex-shrink-0 w-8">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <div>
                                    <a href="/berita/{{ $key }}" class="text-xs font-semibold text-[#151d52] line-clamp-2 group-hover:text-[#f78a28] transition-colors">{{ $pop['title'] }}</a>
                                    <p class="text-[10px] text-gray-400 mt-1">{{ $pop['date'] }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Categories -->
                    <div class="bg-white rounded-2xl shadow-md p-5">
                        <h4 class="font-semibold text-[#151d52] text-sm mb-4 flex items-center gap-2">
                            <i class="fas fa-folder-open text-[#f78a28]"></i> Kategori
                        </h4>
                        <div class="space-y-2">
                            <a href="#" class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-orange-50 transition group">
                                <span class="text-xs text-gray-600 group-hover:text-[#f78a28] font-medium">CB Updates & Tips</span>
                                <span class="text-[10px] bg-orange-100 text-[#f78a28] px-2 py-0.5 rounded-full font-semibold">1</span>
                            </a>
                            <a href="#" class="flex items-center justify-between py-2 px-3 rounded-lg hover:bg-orange-50 transition group">
                                <span class="text-xs text-gray-600 group-hover:text-[#f78a28] font-medium">Bahasa & Budaya</span>
                                <span class="text-[10px] bg-orange-100 text-[#f78a28] px-2 py-0.5 rounded-full font-semibold">1</span>
                            </a>
                        </div>
                    </div>

                </div>
            </aside>

        </div>
    </section>

    <!-- CBerita CTA -->
    <section class="py-16 -mb-5 bg-gradient-to-tr from-[#061342] to-[#414bb9]">
        <div class="max-w-7xl mx-auto md:pl-8 pr-0 flex flex-col md:flex-row items-center md:space-x-8 space-y-8 md:space-y-0">
            <div class="flex-shrink-0 flex items-center space-x-4 text-white">
                <div class="space-y-2 text-center md:text-left">
                    <h2 class="text-4xl md:text-6xl font-bold">CBerita</h2>
                    <p class="text-lg md:text-2xl">Cakrawala Bahasa <br>News Update</p>
                    <a href="/" class="inline-block mt-4 shadow-[7px_7px_17px_0px_#000000] bg-gradient-to-r from-orange-800 to-orange-400 text-white font-semibold px-6 py-2 rounded-full hover:bg-gradient-to-l from-orange-800 to-orange-400 transition">Ayo Baca!</a>
                </div>
                <img src="/img/favicon.png" alt="favicon" class="w-16 md:w-20 transform rotate-[15deg]">
            </div>
        </div>
    </section>

    <x-footer />
    <x-floating-wa />

    <!-- Toast -->
    <div x-show="toast.show" x-transition:enter="toast-in" x-transition:leave="toast-out" x-cloak
         class="fixed bottom-8 left-1/2 -translate-x-1/2 z-[9999] bg-[#151d52] text-white px-6 py-3 rounded-full text-sm font-medium shadow-xl flex items-center gap-2 whitespace-nowrap">
        <span x-text="toast.icon"></span>
        <span x-text="toast.msg"></span>
    </div>

    <script>
        function detailPage() {
            return {
                email: '',
                toast: { show: false, msg: '', icon: '' },

                open: false,
                openProgram: false,
                openLayanan: false,
                mobileProgram: false,
                mobileLayanan: false,

                
                init() {
                    window.addEventListener('scroll', () => {
                        const bar = document.getElementById('reading-progress');
                        const h = document.documentElement.scrollHeight - window.innerHeight;
                        bar.style.width = (window.scrollY / h * 100) + '%';
                    });
                },

                showToast(icon, msg) {
                    this.toast = { show: true, icon, msg };
                    setTimeout(() => { this.toast.show = false; }, 3000);
                },

                shareWa() {
                    window.open('https://wa.me/?text=' + encodeURIComponent(document.title + ' ' + window.location.href), '_blank');
                    this.showToast('📤', 'Membagikan ke WhatsApp...');
                },
                shareFb() {
                    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href), '_blank');
                    this.showToast('📤', 'Membagikan ke Facebook...');
                },
                shareTw() {
                    window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + '&url=' + encodeURIComponent(window.location.href), '_blank');
                    this.showToast('🐦', 'Membagikan ke Twitter...');
                },
                copyLink() {
                    navigator.clipboard.writeText(window.location.href);
                    this.showToast('🔗', 'Link berhasil disalin!');
                },
                bookmark() {
                    this.showToast('🔖', 'Artikel disimpan ke bookmark!');
                },
                subscribe() {
                    if (this.email && this.email.includes('@')) {
                        this.showToast('✅', 'Berhasil berlangganan!');
                        this.email = '';
                    } else {
                        this.showToast('⚠️', 'Masukkan email yang valid');
                    }
                }
            }
        }
    </script>

</body>
</html>