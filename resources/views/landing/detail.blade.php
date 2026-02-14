<!DOCTYPE html>
<html lang="id">
<head>
    <x-head/>
</head>
<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">

    <x-header />
    
    <div class="py-4 px-2 md:py-20">
        <!-- Judul -->
        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-center py-10 text-[#151d52]">Rincian Layanan</h1>

        <!-- Container -->
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-4 md:p-10 flex flex-col md:flex-row gap-4 md:gap-10"
            x-data='{ 
                media: "", 
                layanan: "{{ array_key_first($layanan["fitur_pilihan"]["layanan"] ?? []) }}", 
                subLayanan: "", 
                infoLayanan: "{{ $layanan["fitur_pilihan"]["layanan"][array_key_first($layanan["fitur_pilihan"]["layanan"] ?? [])]["info"] ?? "" }}",
                gambarLayanan: "{{ $layanan["fitur_pilihan"]["layanan"][array_key_first($layanan["fitur_pilihan"]["layanan"] ?? [])]["img"] ?? $layanan["img"] ?? asset("images/default.jpg") }}",
                durasiLayanan: "{{ $layanan["fitur_pilihan"]["layanan"][array_key_first($layanan["fitur_pilihan"]["layanan"] ?? [])]["durasi"] ?? $layanan["durasi"] ?? "" }}",
                fasilitasLayanan: "{{ $layanan["fitur_pilihan"]["layanan"][array_key_first($layanan["fitur_pilihan"]["layanan"] ?? [])]["fasilitas"] ?? $layanan["fasilitas"] ?? "" }}",
                pengajar: "", 
                referral: "", 
                kuantitas: 1,
                hargaMap: {!! json_encode($layanan["harga_variasi"] ?? []) !!}, 
                subMap: {!! json_encode($layanan["fitur_pilihan"]["sub_layanan"] ?? []) !!},
                subHargaMap: {!! json_encode($layanan['sub_layanan_harga'] ?? [])!!}, // harga per sub layanan
                layananMap: {!! json_encode($layanan["fitur_pilihan"]["layanan"] ?? []) !!},

                pilihLayanan(nama) {
                    this.layanan = nama;
                    this.infoLayanan = this.layananMap[nama]["info"];
                    this.gambarLayanan = this.layananMap[nama]["img"] || "{{ $layanan['img'] ?? asset('images/default.jpg') }}";
                    this.durasiLayanan = this.layananMap[nama]["durasi"] || "{{ $layanan['durasi'] ?? '' }}";
                    this.fasilitasLayanan = this.layananMap[nama]["fasilitas"] || "{{ $layanan['fasilitas'] ?? '' }}";
                },
                
                handleSubmit(event) {
                    @if($layanan['id'] === 'study-buddy' || $layanan['id'] === 'language-support' || $layanan['id'] === 'language-test' || $layanan['id'] === 'super-agency')
                        if (!this.layanan || !this.subLayanan) {
                            Swal.fire({
                            icon: "warning",
                            title: "Lengkapi Dulu",
                            text: "Pilih dulu Layanan dan Sub Layanan sebelum membeli.",
                            confirmButtonColor: "#f78a28"
                            });
                            return;
                        }
                        event.target.submit();
                    @else
                        if (!this.media || !this.layanan || !this.subLayanan) {
                            Swal.fire({
                            icon: "warning",
                            title: "Lengkapi Dulu",
                            text: "Pilih dulu Media, Layanan dan Sub Layanan sebelum membeli.",
                            confirmButtonColor: "#f78a28"
                            });
                            return;
                        }
                        event.target.submit();
                    @endif
                }
            }'>

            <!-- Gambar -->
            <div class="md:w-[35%] flex flex-col items-center">
                <!-- Gambar utama layanan -->
                <img :src="gambarLayanan" alt="Gambar Layanan" 
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 rounded-2xl w-2/3 md:w-full object-cover mb-6 aspect-square object-top">
                
                <p class="text-base md:text-lg text-[#151d52] font-semibold mb-3">Beli Melalui</p>

                <!-- Tombol pembayaran horizontal -->
                <div class="flex gap-4 items-center justify-center">
                    <!-- Midtrans -->
                    {{-- <a type="submit" href="https://midtrans.com" target="_blank" rel="noopener noreferrer">
                        <img src="/img/midtrans.png" alt="Midtrans" 
                            class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 w-28">
                    </a> --}}

                    <!-- Shopee -->
                    @if(!empty($layanan['shopee_link']))
                    <a href="{{ $layanan['shopee_link'] }}" target="_blank" rel="noopener noreferrer">
                        <img src="/img/Shopee.svg.png" alt="Shopee" 
                            class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 w-24">
                    </a>
                    @endif

                </div>
            </div>
            <!-- Deskripsi -->
            <div class="md:w-[65%] text-[#151d52]">
                <!-- Title -->
                <h2 class="text-base md:text-lg lg:text-2xl xl:text-3xl font-bold mb-4">{{ $layanan['title'] }}</h2>

                <!-- Deskripsi Umum -->
                <p class="text-sm md:text-base text-justify leading-relaxed mb-6">{{ $layanan['deskripsi'] }}</p>

                {{-- Konten tambahan khusus untuk super-agency --}}
                @if($layanan['id'] === 'super-agency')
                    <div class="mt-6 space-y-3 text-gray-700 text-xs md:text-base text-justify">
                        <ul class="list-disc pl-5 space-y-2">
                            <li>
                                <strong>Persiapan Bahasa:</strong> Meningkatkan kemampuan bahasa melalui latihan intensif, strategi soal, dan simulasi tes untuk menghadapi berbagai uji kemahiran bahasa.
                            </li>
                            <li>
                                <strong>Pengurusan Dokumen:</strong> Membantu dalam pengumpulan dan pengurusan dokumen penting seperti paspor, visa, dan dokumen lainnya yang diperlukan untuk studi atau pekerjaan di luar negeri.
                            </li>
                            <li>
                                <strong>Konsultasi dan Bimbingan:</strong> Memberikan konsultasi mengenai pilihan universitas, program studi, atau peluang karier yang sesuai dengan minat dan tujuan peserta.
                            </li>
                            <li>
                                <strong>Orientasi Pra-Keberangkatan:</strong> Menyediakan informasi dan pelatihan mengenai budaya, adat istiadat, dan kehidupan di negara tujuan untuk memudahkan adaptasi peserta.
                            </li>
                            <li>
                                <strong>Pendampingan Keberangkatan:</strong> Membantu dalam perencanaan perjalanan, termasuk pemesanan tiket dan akomodasi, serta memberikan panduan selama proses keberangkatan.
                            </li>
                        </ul>
                    </div>
                    <br>
                @endif

                <!-- Info Tambahan -->
                @if(!in_array($layanan['id'], ['study-buddy', 'preparation-test', 'super-agency', 'best-parenting', 'language-test', 'icl-mentorship', 'cb-academy', 'camp-bahasa', 'cakrawala-skills']))
                <div class="flex items-start gap-3 mb-6">
                    <div class="text-yellow-400 text-base md:text-2xl">⭐</div>
                    <div>
                        <p class="font-bold text-base md:text-lg mb-1" x-text="layanan ? layanan : 'Pilih Layanan'"></p>
                        <p class="text-sm md:text-base leading-relaxed text-justify text-gray-600" x-text="infoLayanan"></p>
                    </div>
                </div>
                @endif

                <!-- Data -->
                <div class="mb-6 space-y-2 text-sm md:text-base">
                    <p><b>Kategori:</b> {{ $layanan['kategori'] }}</p>

                    @if($layanan['id'] === 'study-buddy')
                        <p><b>Harga:</b> {{ $layanan['hargainfo'] }}</p>
                        <p><b>Durasi:</b> {{ $layanan['durasi'] }}</p>
                    @elseif($layanan['id'] === 'language-support')
                        <p><b>Harga:</b> {{ $layanan['hargainfo'] }}</p>
                        <p>
                            <b>Durasi:</b> 
                            <span x-text="durasiLayanan"></span>
                        </p>
                    @elseif($layanan['id'] === 'language-test' || $layanan['id'] === 'super-agency')
                        <p><b>Harga:</b> {{ $layanan['hargainfo'] }}</p>
                    @elseif($layanan['id'] === 'icl-mentorship')
                        <p><b>Kuota:</b> {{ $layanan['kuota'] }}</p>
                    @else
                        <p><b>Kuota:</b> {{ $layanan['kuota'] }}</p>
                        <p><b>Durasi:</b> {{ $layanan['durasi'] }}</p>
                    @endif

                    <p>
                        <b>Fasilitas:</b> 
                        <span x-text="fasilitasLayanan"></span>
                    </p>
                    @if($layanan['id'] === 'study-buddy')
                        <p><b>Keterangan:</b> {{ $layanan['keterangan'] }}</p>
                    @endif
                </div>

                <!-- Harga Dinamis -->
                <div class="text-[#f78a28] font-bold text-base md:text-xl mb-4">
                    <span x-text="
                        media && hargaMap[media] 
                            ? hargaMap[media] 
                            : (subLayanan && subHargaMap[layanan] && subHargaMap[layanan][subLayanan] 
                                ? subHargaMap[layanan][subLayanan] 
                                : '{{ $layanan['harga'] }}')
                    ">
                        {{ $layanan['harga'] }}
                    </span>
                </div>

                <!-- Pilihan Tambahan -->
                @if(!empty($layanan['fitur_pilihan']))
                <div class="space-y-6 mt-6 mb-10">

                    <!-- Pilihan Media -->
                    @if(!in_array($layanan['id'], ['study-buddy', 'language-support']) && !empty($layanan['fitur_pilihan']['media']))
                    <div>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Media</p>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($layanan['fitur_pilihan']['media'] as $item)
                                <button
                                    @click="media = '{{ $item }}'"
                                    :class="media === '{{ $item }}' ? 'border-[#f78a28] shadow-lg shadow-orange-300' : 'bg-white text-black border-grey'"
                                    class="py-1 px-2 md:px-4 md:py-2 text-sm md:text-base rounded-lg border hover:border-[#f78a28] hover:shadow-lg hover:shadow-orange-300 font-normal transition-all duration-200"
                                >
                                    {{ $item }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Layanan -->
                    @if(!empty($layanan['fitur_pilihan']['layanan']))
                    <div>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Layanan</p>
                        <div class="flex gap-2 flex-wrap">
                            @foreach ($layanan['fitur_pilihan']['layanan'] as $nama => $detail)
                                <button 
                                    @click="pilihLayanan('{{ $nama }}')"
                                    :class="layanan === '{{ $nama }}' 
                                        ? 'border-[#f78a28] shadow-lg shadow-orange-300' 
                                        : 'bg-white text-black border-grey'"
                                    class="py-1 px-2 md:px-4 md:py-2 text-sm md:text-base rounded-lg border hover:border-[#f78a28] hover:shadow-lg hover:shadow-orange-300 font-normal transition-all duration-200"
                                >
                                    {{ $nama }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Sub Layanan -->
                    <div x-show="layanan && subMap[layanan]" x-transition>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Sub Layanan</p>
                        <div class="flex gap-2 flex-wrap">
                            <template x-for="(item, index) in subMap[layanan]" :key="index">
                                <button
                                    @click="subLayanan = item"
                                    :class="subLayanan === item ? 'border-[#f78a28] shadow-lg shadow-orange-300' : 'bg-white text-black border-grey'"
                                    class="py-1 px-2 md:px-4 md:py-2 text-sm md:text-base rounded-lg border hover:border-[#f78a28] hover:shadow-lg hover:shadow-orange-300 font-normal transition-all duration-200"
                                    x-text="item"
                                ></button>
                            </template>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('alpine:init', () => {
                        Alpine.data('detailPage', () => ({
                            layanan: '',
                            subLayanan: '',
                            media: '',
                            hargaMap: @json($layanan['harga_media'] ?? []), // harga per media
                            subMap: @json($layanan['fitur_pilihan']['sub_layanan'] ?? []), // list sub layanan
                            subHargaMap: @json($layanan['sub_layanan_harga'] ?? []), // harga per sub layanan
                        }))
                    })
                    </script>

                    <!-- Pengajar -->
                    @if(!empty($layanan['fitur_pilihan']['pengajar']))
                    <div>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Pengajar</p>
                        <div class="flex gap-2 flex-wrap">
                            @foreach($layanan['fitur_pilihan']['pengajar'] as $item)
                                <button
                                    @click="pengajar = '{{ $item }}'"
                                    :class="pengajar === '{{ $item }}' ? 'border-[#f78a28] shadow-lg shadow-orange-300' : 'bg-white text-black border-grey'"
                                    class="py-1 px-2 md:px-4 md:py-2 text-sm md:text-base rounded-lg border hover:border-[#f78a28] hover:shadow-lg hover:shadow-orange-300 font-normal transition-all duration-200 flex items-center gap-1"
                                >
                                    {{ $item }} @if($item === 'Pick Your Own') 🔒 @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Kuantitas -->
                    @if(!empty($layanan['fitur_pilihan']['kuantitas']))
                    <div>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Kuantitas</p>
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden w-fit">
                            <!-- Tombol Kurang -->
                            <button type="button" 
                                @click="kuantitas > 1 ? kuantitas-- : 1" 
                                class="px-4 py-2 text-gray-700 hover:bg-gray-100 text-lg font-bold border-r border-gray-300">
                                −
                            </button>
                            
                            <!-- Tampilan Angka -->
                            <span class="px-4 py-2 text-sm md:text-base font-semibold min-w-[50px] text-center bg-white" 
                                x-text="kuantitas + ' Orang'">
                            </span>
                            
                            <!-- Tombol Tambah -->
                            <button type="button" 
                                @click="kuantitas < {{ count($layanan['fitur_pilihan']['kuantitas']) }} ? kuantitas++ : {{ count($layanan['fitur_pilihan']['kuantitas']) }}" 
                                class="px-4 py-2 text-gray-700 hover:bg-gray-100 text-lg font-bold border-l border-gray-300">
                                +
                            </button>
                        </div>
                    </div>
                    @endif

                    <!-- Referral -->
                    @if(!empty($layanan['referral']))
                    <div>
                        <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Referral</p>
                        <input type="text" x-model="referral" placeholder="Enter referral code"
                            class="w-full sm:w-1/2 py-1 px-2 md:px-4 md:py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-[#f78a28]">
                    </div>
                    @endif
                </div>
                @endif

                <!-- Tombol -->
                <div class="flex gap-4 flex-row">
                    <button class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 bg-[#f78a28] hover:bg-orange-500 px-4 py-2 text-white font-bold text-base md:text-lg rounded-xl w-auto">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                    <!-- Tombol -->
                    <div class="flex gap-4 flex-col sm:flex-row">
                        <form method="GET" action="{{ route('checkout') }}" @submit.prevent="handleSubmit($event)" class="w-full sm:w-auto">
                            <input type="hidden" name="id" value="{{ $layanan['id'] }}">
                            <input type="hidden" name="media" :value="media">
                            <input type="hidden" name="layanan" :value="layanan">
                            <input type="hidden" name="sub_layanan" :value="subLayanan">
                            <input type="hidden" name="kuantitas" :value="kuantitas">
                            <input type="hidden" name="harga" :value="media && hargaMap[media] ? hargaMap[media] : (subLayanan && subHargaMap[layanan] && subHargaMap[layanan][subLayanan] ? subHargaMap[layanan][subLayanan] : '{{ $layanan['harga'] }}')">
                            <input type="hidden" name="img" value="{{ $layanan['img'] }}">

                            <button type="submit"
                                class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 bg-[#f78a28] hover:bg-orange-600 px-2 py-2 text-white font-bold text-base md:text-lg rounded-xl w-auto">
                                Beli Sekarang
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-footer />
    <x-floating-wa />
</body>
</html>
