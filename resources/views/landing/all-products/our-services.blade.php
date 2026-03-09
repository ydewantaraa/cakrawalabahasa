<!-- Section Layanan Kami -->
<?php
$cards = [
    [
        'title' => 'CB For Kids',
        'img' => 'img/Super Kid.png',
        'url' => '/cb-for-kids',
        'buttonText' => 'Lihat! Ini seru!',
    ],
    [
        'title' => 'CB For You',
        'img' => '/img/Jago Bahasa.png',
        'url' => '/cb-for-you',
        'buttonText' => 'Yuk! Cari Tahu',
    ],
    [
        'title' => 'CB Extras',
        'img' => '/img/language support.png',
        'url' => '/cb-extras',
        'buttonText' => 'Cek Di Sini!',
    ],
];
?>
<section
    class="opacity-0 translate-y-5 transition-all duration-1000 ease-out fade-el md:mt-5 xl:mt-8 py-16 pb-10 px-4 lg:px-20 text-center">
    <h2 class="text-3xl md:text-4xl font-bold text-[#151d52] mb-5">Layanan Kami</h2>
    <div
        class="max-w-[95%] xl:max-w-[90%] 2xl:max-w-[80%] mx-auto flex flex-col md:flex-row overflow-hidden rounded-2xl shadow-lg">
        <?php foreach($cards as $card): ?>
        <div class="group relative flex-1 flex flex-col bg-white">
            <!-- Gambar dengan zoom on hover -->
            <div class="relative overflow-hidden">
                <img src="<?= htmlspecialchars($card['img']) ?>" alt="<?= htmlspecialchars($card['title']) ?>"
                    class="w-full h-auto object-cover transition-transform duration-300 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-transparent pointer-events-none"></div>
            </div>
            <!-- Judul & Tombol -->
            <div class="p-6 flex flex-col flex-1">
                <h3 class="text-2xl font-bold text-[#151d52] mb-4">
                    <?= htmlspecialchars($card['title']) ?>
                </h3>
                <div class="flex justify-center">
                    <a href="<?= htmlspecialchars($card['url']) ?>"
                        class="mt-auto px-26 inline-block bg-gradient-to-r from-[#fd5243] to-[#f1877e] 
                            text-white font-semibold px-8 py-3 rounded-full shadow-lg
                            transition-transform duration-300 hover:-translate-y-1">
                        <?= htmlspecialchars($card['buttonText']) ?>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
