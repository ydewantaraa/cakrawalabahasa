<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pembayaran</title>
    <x-head/>
</head>
<body class="bg-gray-100 font-sans text-[#151d52]">

    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden mt-10 p-6 text-center">
        <!-- Logo -->
        <img src="/img/favicon.png" alt="Logo" class="w-12 h-12 mx-auto mb-4">

        <!-- Judul -->
        <h1 class="text-xl font-bold mb-4">Konfirmasi Pembayaran</h1>

        <!-- Gambar Layanan -->
        <img src="{{ request('img') }}" alt="Foto Program"
            class="w-32 h-32 mx-auto rounded-lg mb-4 object-cover ring-1 ring-gray-200 shadow-sm">

        <!-- Info Program -->
        <h2 class="text-lg font-semibold mb-1">{{ request('layanan') }}</h2>
        @if(request('media'))
            <p class="text-sm text-gray-600 mb-1">
                <span class="font-semibold">Media:</span> {{ request('media') }}
            </p>
        @endif
        <p class="text-sm text-gray-600 mb-2"><span class="font-semibold">Sub Layanan:</span> {{ request('sub_layanan') }}</p>
        <p class="text-lg text-[#f78a28] font-bold mb-4">Harga: {{ request('harga') }}</p>

        <!-- Form Konfirmasi -->
        <div x-data="konfirmasiForm()" class="text-left space-y-4">
            <div>
                <label class="block text-sm mb-1">Nama:</label>
                <input type="text" x-model="nama" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#f78a28] focus:ring-2">
            </div>
            <div>
                <label class="block text-sm mb-1">Email:</label>
                <input type="email" x-model="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#f78a28] focus:ring-2">
            </div>
            <div>
                <label class="block text-sm mb-1">Nomor Kontak / WhatsApp:</label>
                <input type="text" x-model="wa" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-[#f78a28] focus:ring-2">
            </div>

            <button type="button"
                    @click="konfirmasi"
                    class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-md shadow transition-all duration-200">
                Konfirmasi
            </button>
            <!-- Tombol Bayar dengan Midtrans -->
            <button type="button" id="pay-button"
                class="w-full flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md shadow mt-2 transition-all duration-200">
                
                <span>Bayar melalui</span>
                
                <img src="/img/new-midtrans.webp" alt="Midtrans"
                    class="w-24 ml-2 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200">
            </button>
        </div>

        <script src="https://app.midtrans.com/snap/snap.js"
                data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        
        <!-- testing midtrans -->
        <!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}">
        </script> -->
        
        <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            const nama  = document.querySelector('[x-model=nama]').value.trim();
            const email = document.querySelector('[x-model=email]').value.trim();
            const wa    = document.querySelector('[x-model=wa]').value.trim();

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const waRegex = /^[0-9]{9,15}$/;

            // 🔹 Validasi input user
            if (!nama) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nama diperlukan',
                    text: 'Silakan isi nama Anda.',
                    confirmButtonColor: '#f78a28'
                });
                return;
            }

            if (!emailRegex.test(email)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Email tidak valid',
                    text: 'Masukkan format email yang benar.',
                    confirmButtonColor: '#f78a28'
                });
                return;
            }

            if (!waRegex.test(wa)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor WhatsApp tidak valid',
                    text: 'Masukkan nomor WhatsApp hanya angka (9–15 digit).',
                    confirmButtonColor: '#f78a28'
                });
                return;
            }

            // 🔹 Kirim data lengkap ke backend
            fetch("{{ url('/payment') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    total: "{{ request('harga') }}",
                    layanan_id: "{{ Str::slug(request('layanan') . '-' . request('sub_layanan')) }}",
                    layanan: "{{ request('layanan') }}",
                    sub_layanan: "{{ request('sub_layanan') }}",
                    media: "{{ request('media') }}",
                    name: nama,
                    email: email,
                    phone: wa
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.snapToken) {
                    snap.pay(data.snapToken, {
                        onSuccess: function(result){ 
                            console.log("success", result); 
                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Berhasil',
                                text: 'Terima kasih, pembayaran Anda berhasil!',
                                confirmButtonColor: '#f78a28'
                            }).then(() => {
                                window.location.href = "/"; // redirect ke index.blade.php
                            });
                        },
                        onPending: function(result){ 
                            console.log("pending", result); 
                            Swal.fire({
                                icon: 'info',
                                title: 'Menunggu Pembayaran',
                                text: 'Transaksi sedang diproses, silakan selesaikan pembayaran.',
                                confirmButtonColor: '#f78a28'
                            });
                        },
                        onError: function(result){ 
                            console.error("error", result); 
                            Swal.fire({
                                icon: 'error',
                                title: 'Pembayaran Gagal',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                                confirmButtonColor: '#f78a28'
                            });
                        },
                        onClose: function(){ 
                            Swal.fire({
                                icon: 'warning',
                                title: 'Popup Ditutup',
                                text: 'Kamu menutup popup tanpa menyelesaikan pembayaran.',
                                confirmButtonColor: '#f78a28'
                            });
                        }
                    });
                } else {
                    alert("Gagal membuat transaksi Midtrans");
                    console.error(data);
                }
            })
            .catch(err => console.error(err));
        });
        </script>

    </div>

    <!-- Baru setelah itu definisikan Alpine Component -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('konfirmasiForm', () => ({
                nama: '',
                email: '',
                wa: '',
                bukti: null,
                preview: null,

                layanan: '{{ request("layanan") }}',
                media: '{{ request("media") }}',
                subLayanan: '{{ request("sub_layanan") }}',
                harga: '{{ request("harga") }}',
                img: '{{ request("img") }}',

                previewImage(event) {
                    const file = event.target.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = () => {
                            this.preview = reader.result;
                            this.bukti = reader.result;
                        };
                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'File tidak valid',
                            text: 'Hanya gambar yang diperbolehkan.',
                            confirmButtonColor: '#f78a28'
                        });
                    }
                },

                konfirmasi() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    const waRegex = /^[0-9]{9,15}$/;

                    if (!this.nama.trim()) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Nama diperlukan',
                            text: 'Silakan isi nama Anda.',
                            confirmButtonColor: '#f78a28'
                        });
                        return;
                    }

                    if (!emailRegex.test(this.email)) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Email tidak valid',
                            text: 'Masukkan format email yang benar.',
                            confirmButtonColor: '#f78a28'
                        });
                        return;
                    }

                    if (!waRegex.test(this.wa)) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Nomor WhatsApp tidak valid',
                            text: 'Masukkan nomor WhatsApp hanya angka (9–15 digit).',
                            confirmButtonColor: '#f78a28'
                        });
                        return;
                    }

                    const pesan = `*Konfirmasi Pembayaran*\n\n` +
                                `*Program:* ${this.layanan}\n` +
                                `*Media:* ${this.media}\n` +
                                `*Sub Layanan:* ${this.subLayanan}\n` +
                                `*Harga:* ${this.harga}\n\n` +
                                `*Nama:* ${this.nama}\n` +
                                `*Email:* ${this.email}\n` +
                                `*Kontak/WA:* ${this.wa}\n\n`;

                    const nomorAdmin = '628561481109';
                    const encoded = encodeURIComponent(pesan);
                    window.location.href = `https://wa.me/${nomorAdmin}?text=${encoded}`;
                }
            }));
        });
    </script>

</body>
</html>
