<?php

namespace App\Services;

class LayananData
{
    public static function all()
    {
        return [
            // CB For Kids
            [
                'id' => 'super-kid',
                'title' => 'Super Kid',
                'shopee_link' => 'https://id.shp.ee/L4LGV3K',
                'img' => '/img/Super Kid.png',
                'deskripsi' => 'Super Kid adalah program untuk mengembangkan potensi anak melalui kegiatan interaktif menyenangkan explore, experience, enrich.',
                'info' => 'Program pendidikan kewirausahaan yang memperkenalkan konsep bisnis dan keuangan sejak dini dengan cara interaktif dan menyenangkan. Program ini membantu anak mengenal angka, berhitung hingga belajar berwirausaha.',
                'harga' => 'Start From Rp 1.750.000 / 10 sesi',
                'hargainfo' => '',
                'kategori' => 'usia 2-6 tahun',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, LMS, AI, etc',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Montessori' => [
                            'img' => '/img/Super Kid.png',
                            'info' => 'Program untuk mendukung perkembangan anak secara holistik termasuk motorik, sosial, dan kognitif melalui kegiatan eksplorasi yang interaktif. Program ini melatih anak hidup mandiri, belajar callistung dan bersosialisasi.'
                        ],
                        'Little Star' => [
                            'img' => '/img/Super Kid.png',
                            'info' => 'Program untuk mengembangkan kreativitas dan keterampilan sosial anak berbasis permainan dan pengalaman. Program ini merangsang imajinasi anak dengan melatih anak percaya diri, berekspresi dan berkomunikasi dengan baik.'
                        ],
                        'Business Kids' => [
                            'img' => '/img/Super Kid.png',
                            'info' => 'Program pendidikan kewirausahaan yang memperkenalkan konsep bisnis dan keuangan sejak dini dengan cara interaktif dan menyenangkan. Program ini membantu anak mengenal angka, berhitung hingga belajar berwirausaha.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Montessori' => ['Practical Life', 'Science Kids'],
                        'Little Star' => ['Public Speaking + Vlog', 'Dramatic Play'],
                        'Business Kids' => ['Learn to Sell', 'Money Recognition'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'language-stars',
                'title' => 'Language Stars',
                'shopee_link' => 'https://id.shp.ee/5zoTQ3B',
                'img' => '/img/Fun Language.png',
                'deskripsi' => 'Language Stars adalah program untuk memperkenalkan anak-anak pada bahasa asing melalui metode yang interaktif dan menyenangkan, seperti lagu, permainan, dan cerita. Program ini berfokus pada pengembangan keterampilan mendengar, berbicara, dan berkomunikasi dengan cara alami, sehingga anak-anak bisa belajar bahasa baru dengan mudah dan percaya diri.',
                'info' => 'Program pendidikan kewirausahaan yang memperkenalkan konsep bisnis dan keuangan sejak dini dengan cara interaktif dan menyenangkan. Program ini membantu anak mengenal angka, berhitung hingga belajar berwirausaha.',
                'harga' => 'Start From Rp 1.750.000 / 10 sesi',
                'hargainfo' => '',
                'kategori' => 'usia 4-8 tahun',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Language Stars' => [
                            'img' => '/img/Fun Language.png',
                            'info' => 'Language Stars adalah program untuk memperkenalkan anak-anak pada bahasa asing melalui metode yang interaktif dan menyenangkan, seperti lagu, permainan, dan cerita.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Language Stars' => ['Arab', 'Inggris', 'Jepang', 'Mandarin'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'child-artist',
                'title' => 'Child Artist',
                'shopee_link' => 'https://id.shp.ee/QPzQhV9',
                'img' => '/img/Child Artist.png',
                'deskripsi' => 'Program Child Artist adalah program kreatif yang bertujuan mengembangkan bakat seni anak melalui pendekatan seni yang menyenangkan dan ekspresif.',
                'info' => 'Program kreatif yang bertujuan mengembangkan bakat seni anak-anak melalui kegiatan menggambar, melukis, dan membuat kerajinan tangan.',
                'harga' => 'Start From Rp 1.750.000 / 10 sesi',
                'hargainfo' => '',
                'kategori' => 'usia 4-8 tahun',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Art & Craft' => [
                            'img' => '/img/art & craft.png',
                            'info' => 'Program kreatif yang bertujuan mengembangkan bakat seni anak-anak melalui kegiatan menggambar, melukis, dan membuat kerajinan tangan.'
                        ],
                        'Music and Movement' => [
                            'img' => '/img/Child Artist.png',
                            'info' => 'Program kreatif untuk mengajak anak berekspresi melalui gerakan dengan pendekatan seni yang menyenangkan dan interaktif, anak dapat mengembangkan keterampilan motorik, koordinasi, dan rasa percaya diri melalui aktivitas menari, musik, dan permainan yang merangsang kreativitas.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Art & Craft' => ['Painting and Drawing', 'Creative Crafting'],
                        'Music and Movement' => ['Rhythm and Beats', 'Dance Movement'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'best-parenting',
                'title' => 'Best Parenting',
                'shopee_link' => 'https://id.shp.ee/Aaf7oNS',
                'img' => '/img/Best Parenting.png',
                'deskripsi' => 'Best Parenting adalah program untuk memperkuat ikatan orang tua dan anak melalui konseling disertai berbagai aktivitas edukatif dan menyenangkan.',
                'info' => 'Program kreatif yang bertujuan mengembangkan bakat seni anak-anak melalui kegiatan menggambar, melukis, dan membuat kerajinan tangan.',
                'harga' => 'Start From Rp2.250.000 Paket 10 Sesi',
                'hargainfo' => '',
                'kategori' => 'Orang tua dan anak usia 3-12 tahun',
                'kuota' => '1-3 peserta',
                'durasi' => '2 Jam/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp2.250.000 Paket 10 Sesi',
                    'Offline' => 'Rp3.500.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp3.500.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Happy Family' => [
                            'img' => '/img/Best Parenting.png',
                            'info' => 'Happy Family adalah program untuk memperkuat ikatan orang tua dan anak melalui konseling disertai berbagai aktivitas edukatif dan menyenangkan.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Happy Family' => ['Anak Hebat', 'Keluarga Sehat'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            // CB For You
            [
                'id' => 'jago-budaya',
                'title' => 'Jagoan Budaya',
                'shopee_link' => 'https://id.shp.ee/QEXDgUj',
                'img' => '/img/Jago Budaya.png',
                'deskripsi' => 'Jagoan Budaya adalah pembelajaran interaktif untuk mengenal dan memahami beragam budaya melalui eksplorasi seni tradisional dan modern. Peserta tidak hanya belajar tetapi memahami dan menghargai budaya yang dipelajari.',
                'info' => 'Program ini mengajarkan semua elemen musik melalui instrumen, vokal, dan teori music tradisonal. Peserta diajak untuk memahami ritme, melodi, dan harmoni, sambil mengembangkan keterampilan musikal dan ekspresi diri.',
                'harga' => 'Start From Rp2.250.000 Paket 10 Sesi',
                'hargainfo' => '',
                'kategori' => 'Semua Umur',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp2.250.000 Paket 10 Sesi',
                    'Offline' => 'Rp3.500.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp3.500.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Musik Tradisional' => [
                            'img' => '/img/musik tradisional.png',
                            'info' => 'Program ini mengajarkan semua elemen musik melalui instrumen, vokal, dan teori music tradisonal. Peserta diajak untuk memahami ritme, melodi, dan harmoni, sambil mengembangkan keterampilan musikal dan ekspresi diri.'
                        ],
                        'Musik Modern' => [
                            'img' => '/img/musik modern.png',
                            'info' => 'Program ini mengajarkan semua elemen musik melalui instrumen, vokal, dan teori music modern. Peserta diajak untuk memahami ritme, melodi, dan harmoni, sambil mengembangkan keterampilan musikal dan ekspresi diri.'
                        ],
                        'Tari Tradisional' => [
                            'img' => '/img/tari tradisional.png',
                            'info' => 'Program ini mengajarkan tari dari berbagai genre tradisional dengan ekspresi, ritme dan cara yang menyenangkan.'
                        ],
                        'Tari Modern' => [
                            'img' => '/img/tari modern.png',
                            'info' => 'Program ini mengajarkan tari dari berbagai genre, termasuk tradisional dan modern dengan ekspresi, ritme dan cara yang menyenangkan.'
                        ],
                        'Seni Rupa' => [
                            'img' => '/img/seni rupa.png',
                            'info' => 'Program ini mengajarkan pelatihan menggambar, melukis, dan seni kerajinan. Peserta diajak mengekspresikan kreativitas melalui berbagai media seni visual, sambil belajar teknik-teknik dasar dan keterampilan seni rupa.'
                        ],
                        'Seni Pertunjukan' => [
                            'img' => '/img/seni pertunjukan.png',
                            'info' => 'Program ini melatih keterampilan akting, ekspresi, dan penampilan di panggung termasuk menyanyi. Peserta mempelajari dasar-dasar olah vocal, teater, termasuk improvisasi dan penggunaan suara serta tubuh untuk berekspresi.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Musik Tradisional' => ['Angklung', 'Gamelan', 'Suling', 'Karinding', 'Ansambel'],
                        'Musik Modern' => ['Gitar', 'Drum', 'Piano', 'Violin', 'Beatbox'],
                        'Tari Tradisional' => ['Jaipong', 'Saman', 'Kreasi Daerah'],
                        'Tari Modern' => ['Hip Hop', 'K-Pop', 'Kreasi Modern'],
                        'Seni Rupa' => ['Drawing', 'Painting', 'Craft'],
                        'Seni Pertunjukan' => ['Akting', 'Pantomim', 'Stand-up Comedy', 'Vocal'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'jago-bahasa',
                'title' => 'Jagoan Bahasa',
                'shopee_link' => 'https://id.shp.ee/7ehKoPT',
                'img' => '/img/Jago Bahasa.png',
                'deskripsi' => 'Jagoan Bahasa adalah pembelajaran interaktif untuk meningkatkan kemampuan berbahasa melalui metode yang menyenangkan dalam berbagai konteks. Peserta akan belajar menyeluruh termasuk aspek bahasa & budaya.',
                'info' => 'Program ini meningkatkan kemampuan berbahasa melalui pendekatan yang interaktif dan menyenangkan serta menyeluruh. Peserta akan diajarkan keterampilan berbicara, mendengarkan, membaca, dan menulis melalui pembelajran berbasis pengalaman dan budaya disertai native speaker.',
                'harga' => 'Start From Rp 1.750.000 / 10 sesi',
                'hargainfo' => '',
                'kategori' => 'Semua Umur',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Pro Bahasa' => [
                            'img' => '/img/Jago Bahasa.png',
                            'info' => 'Program ini meningkatkan kemampuan berbahasa melalui pendekatan yang interaktif dan menyenangkan serta menyeluruh. Peserta akan diajarkan keterampilan berbicara, mendengarkan, membaca, dan menulis melalui pembelajran berbasis pengalaman dan budaya disertai native speaker.'
                        ],
                        'Jago Ngaji' => [
                            'img' => '/img/kalam illahi.png',
                            'info' => 'Pembelajaran bahasa yang berkaitan dengan teks-teks keagamaan khususnya kitab suci Al-Quran. Peserta akan dilatih untuk dapat membaca dengan baik, memahami arti dan konteks untuk mengamalkan Al Quran dalam kehidupan.'
                        ],
                        'Bilingual' => [
                            'img' => '/img/Kursus Bilingual.png',
                            'info' => 'Program ini mengajarkan dua bahasa yaitu bahasa ibu dan bahasa internasional sekaligus mendukung kurikulum internasional seperti Cambridge. Peserta dilatih berkomunikasi dan belajar efektif menggunakan dua bahasa dalam berbagai konteks, termasuk berbagai mata pelajaran akademik.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Pro Bahasa' => [
                        'Inggris Percakapan/Bisnis',
                        'Inggris Akademik',
                        'Indonesia Akademik',
                        'BIPA (Foreigner)',
                        'Arab',
                        'Belanda',
                        'Cina',
                        'Ibrani',
                        'India',
                        'Italia',
                        'Jepang',
                        'Jerman',
                        'Korea',
                        'Perancis',
                        'Persia',
                        'Rusia',
                        'Romania',
                        'Spanyol',
                        'Tagalog',
                        'Thai',
                        'Turki',
                        'Yunani',
                        'Jawa',
                        'Sunda',
                        'Minang',
                        'Hiroglif',
                        'Isyarat'
                        ],
                        'Jago Ngaji' => ['Tahsin', 'Tafsir', 'Tahfiz', 'Qiraat'],
                        'Bilingual' => ['Arab', 'Cina', 'Inggris'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'preparation-test',
                'title' => 'Jagoan Test',
                'shopee_link' => 'https://id.shp.ee/H5w46Er',
                'img' => '/img/Preparation Test.png',
                'deskripsi' => 'Jagoan Test adalah program persiapan komprehensif untuk mempersiapkan peserta menghadapi berbagai tes uji Kemahiran bahasa. Program ini meningkatkan kemampuan berbahasa melalui latihan intensif, strategi soal, dan simulasi tes, sehingga peserta siap dan mendapatkan hasil ujian terbaik.',
                'info' => 'Program kreatif yang bertujuan mengembangkan bakat seni anak-anak melalui kegiatan menggambar, melukis, dan membuat kerajinan tangan.',
                'harga' => 'Start From Rp1.999.000 Paket 10 Sesi',
                'hargainfo' => '',
                'kategori' => 'Semua Umur',
                'kuota' => '1-2 peserta',
                'durasi' => '2 Jam/Sesi (Online), 1 Jam/Sesi (Offline)',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.999.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.999.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.999.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Jagoan Test' => [
                            'img' => '/img/Preparation Test.png',
                            'info' => 'Jagoan Test adalah program persiapan komprehensif untuk mempersiapkan peserta menghadapi berbagai tes uji Kemahiran bahasa.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Jagoan Test' => [
                            'TOEFL',
                            'TOEIC',
                            'IELTS',
                            'GOETHE',
                            'TORFL',
                            'JLPT',
                            'HSK',
                            'TOPIK',
                            'TOAFL',
                            'TOMER',
                            'GMAT',
                            'GRE',
                            'DALF',
                            'DELE',
                            'CNaVT'
                        ],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'jago-nyekill',
                'title' => 'Jagoan Nyekill',
                'shopee_link' => 'https://id.shp.ee/uWrtsLs',
                'img' => '/img/kewirausahaan.png',
                'deskripsi' => 'Jagoan Nyekill adalah program untuk mengembangkan keterampilan praktis dan profesional yang dibutuhkan di abad ke-21. Program ini berfokus pada pelatihan intensif keterampilan yang relevan dengan kebutuhan industri.',
                'info' => 'Program ini membekali peserta dengan pengetahuan dan keterampilan dalam memulai, mengelola, dan mengembangkan usaha. Melalui pemahaman tentang strategi bisnis, inovasi produk, dan manajemen keuangan, peserta akan menjadi pengusaha yang berdaya saing global.',
                'harga' => 'Start From Rp 1.750.000 / 10 sesi',
                'hargainfo' => '',
                'kategori' => 'Semua Umur',
                'kuota' => '1 peserta',
                'durasi' => '90 Menit/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Kewirausahaan' => [
                            'img' => '/img/kewirausahaan.png',
                            'info' => 'Program ini membekali peserta dengan pengetahuan dan keterampilan dalam memulai, mengelola, dan mengembangkan usaha. Melalui pemahaman tentang strategi bisnis, inovasi produk, dan manajemen keuangan, peserta akan menjadi pengusaha yang berdaya saing global.'
                        ],
                        'Komunikasi' => [
                            'img' => '/img/komunikasi.png',
                            'info' => 'Program ini melatih keterampilan komunikasi yang efektif, baik verbal maupun non-verbal. Peserta akan mempelajari Teknik kepemimpinan, berbicara di depan umum, negosiasi, dan komunikasi yang membantu mereka dalam berinteraksi di lingkungan profesional dan personal.'
                        ],
                        'Kreativitas Digital' => [
                            'img' => '/img/kreatifitas digital.png',
                            'info' => 'Program ini mengeksplorasi dunia kreativitas digital, termasuk desain grafis, konten media, dan video editing. Peserta akan mengembangkan ide kreatif mereka dengan bantuan teknologi digital yang relevan untuk berbagai keperluan professional dan personal branding.'
                        ],
                        'Teknologi' => [
                            'img' => '/img/teknologi.png',
                            'info' => 'Program ini melatih dan memberikan pengetahuan teknologi modern, mulai dari cara penggunaan hingga keterampilan pemrograman software dan AI. Peserta akan diperkenalkan dengan teknologi yang relevan untuk kebutuhan peserta dan profesionalisme modern.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Kewirausahaan' => ['Business Management', 'Financial Literacy', 'Marketing and Sales'],
                        'Komunikasi' => ['Public Speaking', 'Diplomasi'],
                        'Kreativitas Digital' => ['Content Creator', 'Graphic Design', 'Video Editor'],
                        'Teknologi' => ['Coding', 'Artificial Intelligence'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            // CB For Extras
            [
                'id' => 'study-buddy',
                'title' => 'Ur Study Buddy',
                'shopee_link' => 'https://id.shp.ee/cfbNuwr',
                'img' => '/img/Ur Study Buddy.png',
                'deskripsi' => 'Ur Study Buddy adalah program sesi pendampingan untuk membantu peserta didik mencapai tujuan belajar sekaligus memantau kemajuan mereka secara berkala dan mempersiapkan kebutuhan studi ke jenjang berikutnya. Program ini disertai sesi konsultasi akademik dan kesehatan mental peserta didik.',
                'harga' => 'Start From Rp999.000/bulan (4 Sesi 2 Jam/Sesi)',
                'kategori' => 'Remaja Sampai Dewasa',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kuota' => '',
                'durasi' => '1 Jam/Sesi',
                'fasilitas' => 'CB Kit, Personalized Study Plan, Mental Health Check-ins, Reward System, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'layanan' => [
                        'Ur Study Buddy' => [
                            'img' => '/img/Ur Study Buddy.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'Ur Study Buddy' => ['SMP', 'SMA', 'Universitas'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Ur Study Buddy' => [
                        'SMP' => 'Rp999.000 Paket 16 Sesi',
                        'SMA' => 'Rp999.000 Paket 16 Sesi',
                        'Universitas' => 'Rp999.000 Paket 16 Sesi',
                    ],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'language-support',
                'title' => 'Language Support',
                'shopee_link' => 'https://id.shp.ee/v4oC4mV',
                'img' => '/img/language support.png',
                'deskripsi' => 'Language Support menyediakan dukungan berbagai layanan bahasa untuk memenuhi semua kebutuhan akademik maupun karir.',
                'info' => 'Layanan penerjemah lisan untuk membantu komunikasi langsung dan pendampingan bahasa secara real-time., baik dalam pertemuan, konferensi, maupun acara lainnya.',
                'harga' => 'Start From Rp100.000',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kategori' => 'Semua Umur',
                'kuota' => '1-2 peserta',
                'durasi' => '2 Jam/Sesi',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp1.750.000 Paket 10 Sesi',
                    'Offline' => 'Rp2.750.000 Paket 10 Sesi',
                    'Hybrid' => 'Rp2.750.000 Paket 10 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Interpreter' => [
                            'img' => '/img/language support.png',
                            'info' => 'Layanan penerjemah lisan untuk membantu komunikasi langsung dan pendampingan bahasa secara real-time., baik dalam pertemuan, konferensi, maupun acara lainnya.'
                        ],
                        'Proofread' => [
                            'img' => '/img/language support.png',
                            'info' => 'Layanan penerjemahan tertulis dari satu bahasa ke bahasa lain dengan akurasi tinggi. Ditujukan untuk berbagai jenis dokumen, seperti artikel, laporan, dsb.'
                        ],
                        'Sworn' => [
                            'img' => '/img/language support.png',
                            'info' => 'Layanan penerjemahan tertulis dari satu bahasa ke bahasa lain dengan akurasi tinggi. Ditujukan untuk berbagai jenis dokumen, seperti artikel, laporan, dan materi pemasaran, dengan mempertahankan konteks dan nuansa asli.'
                        ],
                        'Translation' => [
                            'img' => '/img/language support.png',
                            'info' => 'Layanan penerjemahan tertulis dari satu bahasa ke bahasa lain dengan akurasi tinggi. Ditujukan untuk berbagai jenis dokumen, seperti artikel, laporan, dan materi pemasaran, dengan mempertahankan konteks dan nuansa asli.'
                        ],
                    ],
                    'sub_layanan' => [
                        'Interpreter' => ['Inggris Akademik', 'Indonesia Akademik', 'BIPA (Foreigner)', 'Arab', 'Belanda', 'Cina', 'Ibrani', 'India', 'Italia', 'Jepang', 'Jerman', 'Korea', 'Perancis', 'Persia', 'Rusia', 'Romania', 'Spanyol', 'Tagalog', 'Thai', 'Turki', 'Yunani', 'Jawa', 'Sunda', 'Minang', 'Hiroglif', 'Isyarat', 'Mandarin'],
                        'Proofread' => ['Inggris Akademik', 'Indonesia Akademik', 'BIPA (Foreigner)', 'Arab', 'Belanda', 'Cina', 'Ibrani', 'India', 'Italia', 'Jepang', 'Jerman', 'Korea', 'Perancis', 'Persia', 'Rusia', 'Romania', 'Spanyol', 'Tagalog', 'Thai', 'Turki', 'Yunani', 'Jawa', 'Sunda', 'Minang', 'Hiroglif', 'Isyarat', 'Mandarin'],
                        'Sworn' => ['Inggris Akademik', 'Indonesia Akademik', 'BIPA (Foreigner)', 'Arab', 'Belanda', 'Cina', 'Ibrani', 'India', 'Italia', 'Jepang', 'Jerman', 'Korea', 'Perancis', 'Persia', 'Rusia', 'Romania', 'Spanyol', 'Tagalog', 'Thai', 'Turki', 'Yunani', 'Jawa', 'Sunda', 'Minang', 'Hiroglif', 'Isyarat', 'Mandarin'],
                        'Translation' => ['Inggris Akademik', 'Indonesia Akademik', 'BIPA (Foreigner)', 'Arab', 'Belanda', 'Cina', 'Ibrani', 'India', 'Italia', 'Jepang', 'Jerman', 'Korea', 'Perancis', 'Persia', 'Rusia', 'Romania', 'Spanyol', 'Tagalog', 'Thai', 'Turki', 'Yunani', 'Jawa', 'Sunda', 'Minang', 'Hiroglif', 'Isyarat', 'Mandarin'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Interpreter' => [
                        'Inggris Percakapan/Bisnis' => 'Rp5.000.000 per hari (8 jam kerja)',
                        'Inggris Akademik' => 'Rp5.000.000 per hari (8 jam kerja)',
                        'Indonesia Akademik' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'BIPA (Foreigner)' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Arab' => 'Rp5.000.000 per hari (8 jam kerja)',
                        'Belanda' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Cina' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Ibrani' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'India' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Italia' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Jepang' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Jerman' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Korea' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Perancis' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Persia' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Rusia' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Romania' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Spanyol' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Tagalog' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Thai' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Turki' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Yunani' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Jawa' => 'Rp3.000.000 per hari (8 jam kerja)',
                        'Sunda' => 'Rp3.000.000 per hari (8 jam kerja)',
                        'Minang' => 'Rp3.000.000 per hari (8 jam kerja)',
                        'Hiroglif' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Isyarat' => 'Rp7.000.000 per hari (8 jam kerja)',
                        'Mandarin' => 'Rp7.000.000 per hari (8 jam kerja)',
                    ],
                    'Proofread' => [
                        'Inggris Percakapan/Bisnis' => 'Rp100.000 per halaman',
                        'Inggris Akademik' => 'Rp100.000 per halaman',
                        'Indonesia Akademik' => 'Rp300.000 per halaman',
                        'BIPA (Foreigner)' => 'Rp300.000 per halaman',
                        'Arab' => 'Rp150.000 per halaman',
                        'Belanda' => 'Rp300.000 per halaman',
                        'Cina' => 'Rp300.000 per halaman',
                        'Ibrani' => 'Rp300.000 per halaman',
                        'India' => 'Rp300.000 per halaman',
                        'Italia' => 'Rp300.000 per halaman',
                        'Jepang' => 'Rp300.000 per halaman',
                        'Jerman' => 'Rp300.000 per halaman',
                        'Korea' => 'Rp300.000 per halaman',
                        'Perancis' => 'Rp300.000 per halaman',
                        'Persia' => 'Rp300.000 per halaman',
                        'Rusia' => 'Rp300.000 per halaman',
                        'Romania' => 'Rp300.000 per halaman',
                        'Spanyol' => 'Rp300.000 per halaman',
                        'Tagalog' => 'Rp300.000 per halaman',
                        'Thai' => 'Rp300.000 per halaman',
                        'Turki' => 'Rp300.000 per halaman',
                        'Yunani' => 'Rp300.000 per halaman',
                        'Jawa' => 'Rp300.000 per halaman',
                        'Sunda' => 'Rp300.000 per halaman',
                        'Minang' => 'Rp300.000 per halaman',
                        'Hiroglif' => 'Rp300.000 per halaman',
                        'Isyarat' => 'Rp300.000 per halaman',
                        'Mandarin' => 'Rp300.000 per halaman',
                    ],
                    'Sworn' => [
                        'Inggris Percakapan/Bisnis' => 'Rp350.000 per halaman',
                        'Inggris Akademik' => 'Rp350.000 per halaman',
                        'Indonesia Akademik' => 'Rp750.000 per halaman',
                        'BIPA (Foreigner)' => 'Rp750.000 per halaman',
                        'Arab' => 'Rp500.000 per halaman',
                        'Belanda' => 'Rp750.000 per halaman',
                        'Cina' => 'Rp750.000 per halaman',
                        'Ibrani' => 'Rp750.000 per halaman',
                        'India' => 'Rp750.000 per halaman',
                        'Italia' => 'Rp750.000 per halaman',
                        'Jepang' => 'Rp750.000 per halaman',
                        'Jerman' => 'Rp750.000 per halaman',
                        'Korea' => 'Rp750.000 per halaman',
                        'Perancis' => 'Rp750.000 per halaman',
                        'Persia' => 'Rp750.000 per halaman',
                        'Rusia' => 'Rp750.000 per halaman',
                        'Romania' => 'Rp750.000 per halaman',
                        'Spanyol' => 'Rp750.000 per halaman',
                        'Tagalog' => 'Rp750.000 per halaman',
                        'Thai' => 'Rp750.000 per halaman',
                        'Turki' => 'Rp1.500.000 per halaman',
                        'Yunani' => 'Rp750.000 per halaman',
                        'Jawa' => 'Rp750.000 per halaman',
                        'Sunda' => 'Rp750.000 per halaman',
                        'Minang' => 'Rp750.000 per halaman',
                        'Hiroglif' => 'Rp750.000 per halaman',
                        'Isyarat' => 'Rp750.000 per halaman',
                        'Mandarin' => 'Rp750.000 per halaman',
                    ],
                    'Translation' => [
                        'Inggris Percakapan/Bisnis' => 'Rp100.000 per halaman',
                        'Inggris Akademik' => 'Rp100.000 per halaman',
                        'Indonesia Akademik' => 'Rp300.000 per halaman',
                        'BIPA (Foreigner)' => 'Rp300.000 per halaman',
                        'Arab' => 'Rp300.000 per halaman',
                        'Belanda' => 'Rp300.000 per halaman',
                        'Cina' => 'Rp300.000 per halaman',
                        'Ibrani' => 'Rp300.000 per halaman',
                        'India' => 'Rp300.000 per halaman',
                        'Italia' => 'Rp300.000 per halaman',
                        'Jepang' => 'Rp300.000 per halaman',
                        'Jerman' => 'Rp300.000 per halaman',
                        'Korea' => 'Rp300.000 per halaman',
                        'Perancis' => 'Rp300.000 per halaman',
                        'Persia' => 'Rp300.000 per halaman',
                        'Rusia' => 'Rp300.000 per halaman',
                        'Romania' => 'Rp300.000 per halaman',
                        'Spanyol' => 'Rp300.000 per halaman',
                        'Tagalog' => 'Rp300.000 per halaman',
                        'Thai' => 'Rp300.000 per halaman',
                        'Turki' => 'Rp300.000 per halaman',
                        'Yunani' => 'Rp300.000 per halaman',
                        'Jawa' => 'Rp300.000 per halaman',
                        'Sunda' => 'Rp300.000 per halaman',
                        'Minang' => 'Rp300.000 per halaman',
                        'Hiroglif' => 'Rp300.000 per halaman',
                        'Isyarat' => 'Rp300.000 per halaman',
                        'Mandarin' => 'Rp300.000 per halaman',
                    ],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'language-test',
                'title' => 'Language Test',
                'shopee_link' => 'https://id.shp.ee/BTXzH95',
                'img' => '/img/Language Test.png',
                'deskripsi' => 'Language Test adalah program uji Kemahiran bahasa yang dilakukan secara resmi oleh lembaga dan diakui dunia untuk keperluan akademik dan karir. Program test disertai bonus sesi pra test sehingga peserta dapat lebih siap.',
                'harga' => 'Start From Rp250.000',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kuota' => '',
                'durasi' => '1 Jam/Sesi',
                'fasilitas' => 'CB Kit, Personalized Study Plan, Mental Health Check-ins, Reward System, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'layanan' => [
                        'Language Proficient Test + Sesi Pra Test' => [
                            'img' => '/img/Language Test.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'Language Proficient Test + Sesi Pra Test' => ['CB&apos;s EPT', 'TOEFL ITP', 'TOEIC', 'IELTS', 'JLPT', 'HSK', 'TOAFL', 'TOMER'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Language Proficient Test + Sesi Pra Test' => [
                        'CB&apos;s EPT' => 'Rp250.000',
                        'TOEFL ITP' => 'Rp699.000',
                        'TOEIC' => 'Rp999.000',
                        'IELTS' => 'Rp3.499.000',
                        'JLPT' => 'Start From Rp250.000 s.d. Rp350.000',
                        'HSK' => 'Start From Rp550.000 s.d. Rp999.000',
                        'TOAFL' => 'Rp499.000',
                        'TOMER' => 'Rp2.999.000',
                    ]
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'super-agency',
                'title' => 'Super Agency',
                'img' => '/img/Super Agency.png',
                'deskripsi' => 'Program Super Agency di Cakrawala Bahasa adalah layanan terpadu yang dirancang untuk mendampingi peserta mulai dari persiapan hingga keberangkatan dalam mencapai tujuan studi atau karier internasional.',
                'harga' => 'Start From Rp250.000',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kuota' => '',
                'durasi' => '1 Jam/Sesi',
                'fasilitas' => 'CB Kit, Personalized Study Plan, Mental Health Check-ins, Reward System, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'layanan' => [
                        'Study Agency' => [
                            'img' => '/img/Super Agency.png',
                            'info' => '',
                        ],
                        'Career Agency' => [
                            'img' => '/img/Super Agency.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'Study Agency' => ['Amerika', 'Australia', 'Inggris', 'Jerman', 'Cina', 'Jepang', 'Korea', 'Singapura', 'ASEAN', 'Turki', 'Saudi', 'UAE', 'Mesir'],
                        'Career Agency' => ['Australia', 'Jepang', 'Jerman'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Study Agency' => [
                        'Amerika' => 'Start From Rp150.000.000',
                        'Australia' => 'Start From Rp150.000.000',
                        'Inggris' => 'Start From Rp150.000.000',
                        'Jerman' => 'Start From Rp150.000.000',
                        'Cina' => 'Start From Rp50.000.000',
                        'Jepang' => 'Start From Rp50.000.000',
                        'Korea' => 'Start From Rp50.000.000',
                        'Singapura' => 'Start From Rp20.000.000',
                        'ASEAN' => 'Start From Rp15.000.000',
                        'Turki' => 'Start From Rp30.000.000',
                        'Saudi' => 'Start From Rp30.000.000',
                        'UAE' => 'Start From Rp30.000.000',
                        'Mesir' => 'Start From Rp30.000.000',
                    ],
                    'Career Agency' => [
                        'Australia' => 'Start From Rp80.000.000',
                        'Jepang' => 'Start From Rp30.000.000',
                        'Jerman' => 'Start From Rp50.000.000',
                    ]
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            // Special Class
            [
                'id' => 'icl-mentorship',
                'title' => 'ICL Mentorship',
                'shopee_link' => 'https://id.shp.ee/wqBuJmT',
                'img' => '/img/ICL Mentorship.png',
                'deskripsi' => 'ICL Mentorship adalah program kelas untuk mengenalkan berbagai bahasa kepada peserta sekaligus memperluas wawasan budaya dan bahasa serta kesempatan untuk berkarir melalui event menarik yaitu seminar dan kelas.',
                'harga' => 'Rp250.000 Paket Seminar dan Kelas',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kuota' => '15-20+ peserta per kelas',
                'durasi' => '',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Rp250.000 Paket Seminar dan Kelas',
                    'Offline' => 'Rp250.000 Paket Seminar dan Kelas',
                    'Hybrid' => 'Rp250.000 Paket Seminar dan Kelas',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'ICL Mentorship' => [
                            'img' => '/img/ICL Mentorship.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'ICL Mentorship' => ['ICL Mentorship'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'ICL Mentorship' => [
                        'ICL Mentorship' => 'Rp250.000 Paket Seminar dan Kelas',
                    ]
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'cb-academy',
                'title' => 'CB Academy',
                'shopee_link' => 'https://id.shp.ee/6zaxSXT',
                'img' => '/img/cb-academy.png',
                'deskripsi' => 'CB Academy adalah kelas pembelajaran berbagai Bahasa secara interaktif. Kelas ini tidak hanya menawarkan pembelajaran bahasa dari tutor lokal yang kompeten dan native speaker, juga dilengkapi eksposur budaya dan karir serta pemahaman bahasa yang mendalam bagi peserta.',
                'harga' => 'Start From Rp1.650.000 Paket 20 Sesi',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya berlaku untuk online maupun offline',
                'kuota' => '15-20+ peserta per kelas',
                'durasi' => 'Per Semester',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'harga_variasi' => [
                    'Online' => 'Start From Rp1.650.000 Paket 20 Sesi',
                    'Offline' => 'Start From Rp1.650.000 Paket 20 Sesi',
                    'Hybrid' => 'Start From Rp1.650.000 Paket 20 Sesi',
                ],
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'CB Academy' => [
                            'img' => '/img/cb-academy.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'CB Academy' => ['Inggris Percakapan/Bisnis', 'Inggris Akademik', 'Indonesia Akademik', 'BIPA (Foreigner)', 'Arab', 'Belanda', 'Cina', 'Ibrani', 'India', 'Italia', 'Jepang', 'Jerman', 'Korea', 'Perancis', 'Persia', 'Rusia', 'Romania', 'Spanyol', 'Tagalog', 'Thai', 'Turki', 'Yunani', 'Jawa', 'Sunda', 'Minang', 'Hiroglif', 'Isyarat'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'CB Academy' => [
                        'Inggris Percakapan/Bisnis' => 'Start From Rp1.650.000 Paket 20 Sesi',
                    ]
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'camp-bahasa',
                'title' => 'Camp Bahasa',
                'img' => '/img/camp-bahasa.png',
                'deskripsi' => 'Camp Bahasa adalah kelas pembelajaran bahasa melalui pengalaman langsung di lingkungan yang mendukung. Peserta dapat memilih mengikuti camp dalam negeri atau di negara penutur asli, sehingga mempercepat proses pembelajaran bahasa melalui interaksi budaya dan praktik sehari-hari.',
                'harga' => 'Start From Rp3.500.000',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya untuk pembelajaran dan akomodasi selama camp',
                'kuota' => '15-20+ peserta per kelas',
                'durasi' => 'Paket 10 s.d 15 Hari',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Local' => [
                            'img' => '/img/camp-bahasa.png',
                            'info' => '',
                        ],
                        'International' => [
                            'img' => '/img/camp-bahasa.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'Local' => ['Kampus UI', 'Kampung CB Pare', 'Bali', 'Bandung'],
                        'International' => ['Singapore', 'Australia', 'Saudi Arabia', 'Turkiye'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Local' => [
                        'Kampus UI' => 'Rp3.500.000',
                        'Kampung CB Pare' => 'Rp3.500.000',
                        'Bali' => 'Rp3.500.000',
                        'Bandung' => 'Rp3.500.000',
                    ],
                    'International' => [
                        'Singapore' => 'Rp30.000.000',
                        'Australia' => 'Rp30.000.000',
                        'Saudi Arabia' => 'Rp30.000.000',
                        'Turkiye' => 'Rp30.000.000',
                        'England' => 'Rp30.000.000',
                        'German' => 'Rp30.000.000',
                    ],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'cakrawala-skills',
                'title' => 'Cakrawala Skills',
                'shopee_link' => 'https://id.shp.ee/mNLUWJg',
                'img' => '/img/cakrawala-skills.png',
                'deskripsi' => 'Cakrawala Skills adalah program kelas untuk mengembangkan berbagai soft skills esensial di era modern. Peserta akan belajar dan berlatih keterampilan komunikasi, kreativitas, kewirausahaan, serta teknologi dalam suasana yang interaktif dan mendukung disertai mentor praktisi yang berpengalaman.',
                'harga' => 'Start From Rp1.650.000 Paket 20 Sesi',
                'kategori' => 'Semua Umur',
                'hargainfo' => 'Biaya untuk pembelajaran dan akomodasi selama camp',
                'kuota' => '15-20+ peserta per kelas',
                'durasi' => 'Per Semester',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Cakrawala Skills' => [
                            'img' => '/img/cakrawala-skills.png',
                            'info' => '',
                        ],
                    ],
                    'sub_layanan' => [
                        'Cakrawala Skills' => ['Kewirausahaan', 'Komunikasi', 'Kreativitas', 'Teknologi'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Cakrawala Skills' => [
                        'Kewirausahaan' => 'Rp1.650.000 Paket 20 Sesi',
                        'Komunikasi' => 'Rp1.650.000 Paket 20 Sesi',
                        'Kreativitas' => 'Rp1.650.000 Paket 20 Sesi',
                        'Teknologi' => 'Rp1.650.000 Paket 20 Sesi',
                    ],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
            [
                'id' => 'best-muslim',
                'title' => 'Best Muslim',
                'shopee_link' => 'https://id.shp.ee/mNLUWJg',
                'img' => '/img/best-muslim.png',
                'deskripsi' => 'Best Muslim adalah program pembinaan karakter Islami yang dirancang untuk membentuk generasi muda yang cerdas, santun, dan berakhlak Qurani. Program ini menggabungkan pembelajaran Bahasa Arab, Al-Qur’an, Fiqih Dasar, serta nilai-nilai keislaman lainnya, dikemas secara interaktif dan menyenangkan.',
                'info' => 'Peserta tidak hanya akan memahami dasar-dasar ilmu agama, tetapi juga belajar materi unggulan seperti Bahasa Arab Praktis, Tahfidz dan Tahsin Al-Qur’an, Fiqih Anak Sehari-hari, Adab & Akhlak Mulia, serta Proyek Kreatif Islami, yang semuanya dipandu oleh mentor berpengalaman di bidang pendidikan Islam dan pengembangan diri, guna mencetak Best Muslim yang cakap adaptif dengan ilmu dunia sekaligus teguh dalam iman dan amal.',
                'harga' => 'Start From Rp1.650.000 Paket 20 Sesi',
                'kategori' => 'Semua Umur',
                'kuota' => '15-20+ peserta per kelas',
                'durasi' => 'Per Semester',
                'fasilitas' => 'CB Kit, Bahan Ajar, Sertifikat, Unlock All Features (LMS, AI, etc)',
                'fitur_pilihan' => [
                    'media' => ['Online', 'Offline', 'Hybrid'],
                    'layanan' => [
                        'Best Muslim' => [
                            'img' => '/img/best-muslim.png',
                            'info' => 'Peserta tidak hanya akan memahami dasar-dasar ilmu agama, tetapi juga belajar materi unggulan seperti Bahasa Arab Praktis, Tahfidz dan Tahsin Al-Qur’an, Fiqih Anak Sehari-hari, Adab & Akhlak Mulia, serta Proyek Kreatif Islami, yang semuanya dipandu oleh mentor berpengalaman di bidang pendidikan Islam dan pengembangan diri, guna mencetak Best Muslim yang cakap adaptif dengan ilmu dunia sekaligus teguh dalam iman dan amal.',
                        ],
                    ],
                    'sub_layanan' => [
                        'Best Muslim' => ['Bahasa Arab Praktis', 'Tahfidz', 'Tahsin Al-Quran'],
                    ],
                    'pengajar' => ['Auto-select', 'Pick Your Own'],
                ],
                'sub_layanan_harga' => [
                    'Best Muslim' => [
                        'Bahasa Arab Praktis' => 'Rp1.650.000 Paket 20 Sesi',
                        'Tahfidz' => 'Rp1.650.000 Paket 20 Sesi',
                        'Tahsin Al-Quran' => 'Rp1.650.000 Paket 20 Sesi',
                    ],
                ],
                'referral' => true // tampilkan input referral atau tidak
            ],
        ];
    }

    public static function find($id)
    {
        return collect(self::all())->firstWhere('id', $id);
    }
}
