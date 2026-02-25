<!DOCTYPE html>
<html lang="id">

<head>
    <x-head />
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]">

    <x-header />

    <div class="py-4 px-2 md:py-20">

        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-center py-10 text-[#151d52]">
            Rincian Layanan
        </h1>

        <div
            class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-4 md:p-10 flex flex-col md:flex-row gap-4 md:gap-10">

            <!-- Gambar -->
            <div class="md:w-[35%] flex flex-col items-center">
                <img src="{{ $course->thumbnail }}"
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 rounded-2xl w-2/3 md:w-full object-cover mb-6 aspect-square object-top">

                @if ($course->shopee_link)
                    <a href="{{ $course->shopee_link }}" target="_blank">
                        <img src="/img/Shopee.svg.png" class="w-24 hover:scale-105 transition">
                    </a>
                @endif
            </div>

            <!-- Deskripsi -->
            <div class="md:w-[65%] text-[#151d52]" x-data="{
                activeService: null,
                activeSub: null,
                activeMedia: null,
                courseThumbnail: '{{ $course->thumbnail ?? asset('img/default-course.png') }}',
                services: [],
                getPrice() {
                    let price = 0;
                    let unitInfo = '';
            
                    if (this.activeService) {
                        // Ambil service yang dipilih
                        const service = this.services.find(s => s.id === this.activeService);
                        if (!service) return 'Harga belum tersedia';
            
                        let selectedPrice = null;
            
                        // Cek sub-service dulu
                        if (this.activeSub) {
                            const sub = service.sub_services.find(ss => ss.id === this.activeSub);
                            if (sub) {
                                selectedPrice = sub.prices.find(p => p.learning_type === this.activeMedia) ?? null;
                            }
                        }
            
                        // Jika belum ada, fallback ke service
                        if (!selectedPrice) {
                            selectedPrice = service.prices.find(p => p.learning_type === this.activeMedia) ?? null;
                        }
            
                        if (selectedPrice) {
                            price = Number(selectedPrice.price);
                            if (selectedPrice.package_size) unitInfo = ` ${selectedPrice.package_size}`;
                            else if (selectedPrice.unit_type) unitInfo = ` ${selectedPrice.unit_type}`;
                        }
            
                        return 'Rp ' + price.toLocaleString('id-ID', { maximumFractionDigits: 0 }) + unitInfo;
                    } else {
                        // Belum pilih service → ambil harga termurah
                        const allPrices = [];
            
                        this.services.forEach(service => {
                            service.prices.forEach(p => allPrices.push(p));
                            service.sub_services.forEach(sub => sub.prices.forEach(p => allPrices.push(p)));
                        });
            
                        if (allPrices.length > 0) {
                            const cheapest = allPrices.reduce((min, p) => p.price < min.price ? p : min, allPrices[0]);
                            price = Number(cheapest.price);
                            if (cheapest.package_size) unitInfo = ` ${cheapest.package_size}`;
                            else if (cheapest.unit_type) unitInfo = ` ${cheapest.unit_type}`;
            
                            return 'Start from Rp ' + price.toLocaleString('id-ID', { maximumFractionDigits: 0 }) + unitInfo;
                        } else {
                            return 'Harga belum tersedia';
                        }
                    }
                },
                getInfoLayanan() {
                    const service = this.services.find(s => s.id === this.activeService);
                    return service.description ?? '';
                },
                getCurrentThumbnail() {
                    if (this.activeService) {
                        const service = this.services.find(s => s.id === this.activeService);
                        return service?.thumbnail;
                    }
                    return this.courseThumbnail;
                },
                getAvailableMedia() {
                    if (!this.activeService) return [];
            
                    const service = this.services.find(s => s.id === this.activeService);
                    if (!service) return [];
            
                    const mediaSet = new Set();
            
                    service.prices.forEach(p => { if (p.learning_type) mediaSet.add(p.learning_type); });
                    service.sub_services.forEach(sub => {
                        sub.prices.forEach(p => { if (p.learning_type) mediaSet.add(p.learning_type); });
                    });
            
                    return Array.from(mediaSet);
                }
            }" x-init="services = {{ $course->course_services->map(function ($s) {
                    return [
                        'id' => $s->id,
                        'name' => $s->name,
                        'description' => $s->description,
                        'thumbnail' => $s->thumbnail,
                        'prices' => $s->prices->map(
                                fn($p) => [
                                    'learning_type' => $p->learning_type,
                                    'price' => $p->price,
                                    'unit_type' => $p->unit_type,
                                    'package_size' => $p->package_size,
                                ],
                            )->toArray(),
                        'sub_services' => $s->sub_course_services->map(
                                fn($sub) => [
                                    'id' => $sub->id,
                                    'name' => $sub->name,
                                    'prices' => $sub->prices->map(
                                            fn($p) => [
                                                'learning_type' => $p->learning_type,
                                                'price' => $p->price,
                                                'unit_type' => $p->unit_type,
                                                'package_size' => $p->package_size,
                                            ],
                                        )->toArray(),
                                ],
                            )->toArray(),
                    ];
                })->toJson() }}">
                <h2 class="text-base md:text-lg lg:text-2xl xl:text-3xl font-bold mb-4">
                    {{ $course->name }}
                </h2>

                <p class="text-sm md:text-base text-justify leading-relaxed mb-6">
                    {{ $course->description }}
                </p>

                <!-- Info Tambahan -->
                <div class="flex items-start gap-3 mb-6"
                    x-show="activeService && services.find(s => s.id === activeService)?.description">
                    <div class="text-yellow-400 text-base md:text-2xl">⭐</div>
                    <div>
                        <p class="font-bold text-base md:text-lg mb-1"
                            x-text="services.find(s => s.id === activeService)?.name"></p>
                        <p class="text-sm md:text-base leading-relaxed text-justify text-gray-600"
                            x-text="services.find(s => s.id === activeService)?.description"></p>
                    </div>
                </div>

                <!-- Data -->
                <div class="mb-6 space-y-2 text-sm md:text-base">
                    <p><b>Kategori:</b> {{ $course->category }}</p>

                    @if ($course->quota)
                        <p><b>Kuota:</b> {{ $course->quota }}</p>
                    @endif

                    @if ($course->duration)
                        <p><b>Durasi:</b> {{ $course->duration }}</p>
                    @endif

                    <p>
                        <b>Fasilitas:</b>
                        {{ $course->course_facilities->pluck('name')->implode(', ') ?: '-' }}
                    </p>
                </div>

                {{-- HARGA --}}
                <div class="text-[#f78a28] font-bold text-2xl mb-6">
                    <span x-text="getPrice()"></span>
                </div>

                {{-- MEDIA
                <div class="mb-4">
                    <p class="font-semibold mb-2">Media</p>
                    <div class="flex gap-2 flex-wrap">
                        @php
                            $mediaTypes = $course->course_services
                                ->flatMap(fn($s) => $s->prices)
                                ->pluck('learning_type')
                                ->filter()
                                ->unique();
                        @endphp
                        @foreach ($mediaTypes as $media)
                            <button @click="activeMedia='{{ $media }}'"
                                :class="activeMedia === '{{ $media }}' ?
                                    'border-[#f78a28] shadow-lg shadow-orange-300' :
                                    'bg-white text-black border-gray-300'"
                                class="py-1 px-3 rounded-lg border transition capitalize">
                                {{ $media }}
                            </button>
                        @endforeach
                    </div>
                </div> --}}
                {{-- MEDIA --}}
                <div class="mb-4" x-show="activeService">
                    <p class="font-semibold mb-2">Media</p>
                    <div class="flex gap-2 flex-wrap">
                        <template x-for="media in getAvailableMedia()" :key="media">
                            <button @click="activeMedia = media"
                                :class="activeMedia === media ?
                                    'border-[#f78a28] shadow-lg shadow-orange-300' :
                                    'bg-white text-black border-gray-300'"
                                class="py-1 px-3 rounded-lg border transition capitalize" x-text="media">
                            </button>
                        </template>
                    </div>
                </div>

                {{-- SERVICE --}}
                <div class="mb-6">
                    <p class="font-semibold mb-2">Layanan</p>
                    <div class="flex gap-2 flex-wrap">
                        @foreach ($course->course_services as $service)
                            <button @click="activeService={{ $service->id }}; activeSub=null"
                                :class="activeService === {{ $service->id }} ?
                                    'border-[#f78a28] shadow-lg shadow-orange-300' :
                                    'bg-white text-black border-gray-300'"
                                class="py-1 px-3 rounded-lg border transition">
                                {{ $service->name }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- SUB SERVICE --}}
                @foreach ($course->course_services as $service)
                    <div x-show="activeService === {{ $service->id }}" x-transition>
                        @if ($service->sub_course_services->isNotEmpty())
                            <p class="font-semibold mb-2 mt-4">Sub Layanan</p>
                            <div class="flex gap-2 flex-wrap mb-4">
                                @foreach ($service->sub_course_services as $sub)
                                    <button @click="activeSub={{ $sub->id }}"
                                        :class="activeSub === {{ $sub->id }} ?
                                            'border-[#f78a28] shadow-lg shadow-orange-300' :
                                            'bg-white text-black border-gray-300'"
                                        class="py-1 px-3 rounded-lg border transition">
                                        {{ $sub->name }}
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach


                <!-- Tombol -->
                <div class="flex gap-4 mt-6">

                    <form method="GET" action="{{ route('checkout') }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="service_id" :value="activeService">
                        <input type="hidden" name="sub_service_id" :value="activeSub">

                        <button type="submit"
                            class="bg-[#f78a28] hover:bg-orange-600 px-4 py-2 text-white font-bold rounded-xl transition">
                            Beli Sekarang
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <x-footer />
    <x-floating-wa />

</body>

</html>
