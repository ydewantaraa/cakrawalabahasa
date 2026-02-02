        const musicBtn = document.getElementById('musicButton');
        const music = document.getElementById('bgMusic');
        const pauseIcon = document.getElementById('pauseIcon');
        const playIcon = document.getElementById('playIcon');
        const musicList = [
            '/audio/music1.mpeg',
            '/audio/music2.mpeg'
            // bisa tambah '/audio/music3.mpeg', dst.
        ];
        let musicIndex = 0;

        const audio = document.getElementById('bgMusic');
        const audioSource = document.getElementById('audioSource');

        audio.addEventListener('ended', function() {
            musicIndex++;
            if(musicIndex >= musicList.length) {
                musicIndex = 0; // Ulang dari awal playlist jika mau repeat
            }
            audioSource.src = musicList[musicIndex];
            audio.load();
            audio.play();
        });

        // OPTIONAL: Kalau ingin start dari lagu tertentu setiap halaman reload, set di sini:
        audioSource.src = musicList[0];
        audio.load();

        // Tombol Play/Pause pakai SVG
        musicBtn.addEventListener('click', function() {
            if (music.paused) {
                music.play();
                pauseIcon.classList.remove('hidden');
                playIcon.classList.add('hidden');
            } else {
                music.pause();
                pauseIcon.classList.add('hidden');
                playIcon.classList.remove('hidden');
            }
        });

        // Sync icon jika audio dipause/play bukan dari tombol (misal: browser UI)
        music.addEventListener('play', function() {
            pauseIcon.classList.remove('hidden');
            playIcon.classList.add('hidden');
        });
        music.addEventListener('pause', function() {
            pauseIcon.classList.add('hidden');
            playIcon.classList.remove('hidden');
        });

        // Optional: Saat halaman load, tampilkan icon sesuai status
        window.addEventListener('DOMContentLoaded', function() {
            if (music.paused) {
                pauseIcon.classList.add('hidden');
                playIcon.classList.remove('hidden');
            } else {
                pauseIcon.classList.remove('hidden');
                playIcon.classList.add('hidden');
            }
        });    