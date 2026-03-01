<!DOCTYPE html>
<html lang="id">

<head>
    <x-head />
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]">
    <x-header />
    @php
        $servicesJson = $course->course_services->map(function ($s) {
            return [
                'id' => $s->id,
                'name' => $s->name,
                'description' => $s->description,
                'thumbnail' => $s->thumbnail,
                'has_teacher' => $s->has_teacher,
                'prices' => $s->prices->map(function ($p) {
                    return [
                        'id' => $p->id,
                        'learning_type' => $p->learning_type,
                        'price' => $p->price,
                        'unit_type' => $p->unit_type,
                        'package_size' => $p->package_size,
                    ];
                }),
                'sub_services' => $s->sub_course_services->map(function ($sub) {
                    return [
                        'id' => $sub->id,
                        'name' => $sub->name,
                        'thumbnail' => $sub->thumbnail ?? null,
                        'prices' => $sub->prices->map(function ($p) {
                            return [
                                'id' => $p->id,
                                'learning_type' => $p->learning_type,
                                'price' => $p->price,
                                'unit_type' => $p->unit_type,
                                'package_size' => $p->package_size,
                            ];
                        }),
                    ];
                }),
            ];
        });
    @endphp
    <div class="py-4 px-2 md:py-20">

        <h1 class="text-xl md:text-3xl lg:text-4xl font-bold text-center py-10 text-[#151d52]">
            Rincian Layanan
        </h1>

        <!-- Deskripsi -->
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-4 md:p-10 flex flex-col md:flex-row gap-4 md:gap-10"
            x-data="courseApp()" x-init="services = window.servicesData">
            <!-- Gambar di kiri -->
            <div class="md:w-[35%] flex flex-col items-center">
                <img :src="getCurrentThumbnail()"
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 rounded-2xl w-2/3 md:w-full object-cover mb-6 aspect-square object-top"
                    alt="gambar layanan">

                @if ($course->shopee_link)
                    <a href="{{ $course->shopee_link }}" target="_blank">
                        <img src="/img/Shopee.svg.png" class="w-24 hover:scale-105 transition">
                    </a>
                @endif
            </div>
            <div class="md:w-[65%] text-[#151d52]">

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

                {{-- MEDIA --}}
                <div class="mb-4" x-show="activeService && getAvailableMedia().length > 0">
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
                            <button @click="activeService={{ $service->id }}; activeSub=null; quantity=1"
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
                                    <button @click="activeSub={{ $sub->id }}; quantity=1"
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

                <!-- QUANTITY -->
                <div x-show="getSelectedPrice()?.unit_type === 'per_item'" class="mb-6">

                    <p class="font-semibold mb-2">Kuantitas</p>

                    <div class="flex items-center gap-3">

                        <button type="button" @click="if(quantity > 1) quantity--"
                            class="w-8 h-8 bg-gray-200 rounded text-lg font-bold">
                            -
                        </button>

                        <span class="text-lg font-semibold" x-text="quantity"></span>

                        <button type="button" @click="quantity++"
                            class="w-8 h-8 bg-gray-200 rounded text-lg font-bold">
                            +
                        </button>

                    </div>
                </div>

                <!-- PENGAJAR -->
                <div class="mb-6" x-show="hasTeacher == 1">
                    <p class="font-semibold mb-2">Pilih Pengajar</p>
                    <div class="flex gap-2 flex-wrap">

                        <template x-for="item in ['Random Teacher','Pick Your Own']" :key="item">
                            <button type="button" @click="pengajar = item"
                                :class="pengajar === item ?
                                    'border-[#f78a28] shadow-lg shadow-orange-300' :
                                    'bg-white text-black border-gray-300'"
                                class="py-1 px-3 rounded-lg border transition">

                                <span x-text="item"></span>
                                <span x-show="item === 'Pick Your Own'"> 🔒</span>

                            </button>
                        </template>
                    </div>
                </div>

                <!-- REFERRAL -->
                <div>
                    <p class="font-semibold text-[#151d52] mb-2 text-base md:text-lg">Referral</p>
                    <input type="text" x-model="referral" placeholder="Enter referral code"
                        class="w-full sm:w-1/2 py-1 px-2 md:px-4 md:py-2 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-[#f78a28]">
                </div>

                <!-- Tombol -->
                <div class="flex gap-4 mt-6">
                    <form method="GET" action="{{ route('checkout') }}" class="w-full sm:w-auto"
                        @submit.prevent="handleSubmit">

                        <!-- Service -->
                        <input type="hidden" name="service_id" :value="activeService">
                        <input type="hidden" name="service_name"
                            :value="activeService ? services.find(s => s.id === activeService)?.name : ''">

                        <!-- Sub Service -->
                        <input type="hidden" name="sub_service_id" :value="activeSub">
                        <input type="hidden" name="sub_service_name"
                            :value="activeSub ? services.find(s => s.id === activeService)?.sub_services.find(ss => ss.id ===
                                activeSub)?.name : ''">

                        <!-- Thumbnail -->
                        <input type="hidden" name="thumbnail" :value="getCurrentThumbnail()">

                        <!-- Media -->
                        <input type="hidden" name="media" :value="activeMedia">

                        <!-- Harga -->
                        <input type="hidden" name="price"
                            :value="(() => {
                                const service = services.find(s => s.id === activeService);
                                if (!service) return 0;
                            
                                let selectedPrice = null;
                                if (activeSub) {
                                    const sub = service.sub_services.find(ss => ss.id === activeSub);
                                    if (sub) selectedPrice = sub.prices.find(p => p.learning_type === activeMedia);
                                }
                                if (!selectedPrice) selectedPrice = service.prices.find(p => p.learning_type ===
                                    activeMedia);
                                return selectedPrice ? selectedPrice.price : 0;
                            })()">

                        <!-- Price ID (PENTING untuk keamanan) -->
                        <input type="hidden" name="price_id" :value="getSelectedPrice()?.id ?? ''">

                        <!-- Quantity -->
                        <input type="hidden" name="quantity"
                            :value="getSelectedPrice()?.unit_type === 'per_item' ? quantity : 1">

                        <!-- Tombol -->
                        <button type="submit"
                            class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 bg-[#f78a28] hover:bg-orange-600 px-4 py-2 text-white font-bold text-base md:text-lg rounded-xl w-auto">
                            Beli Sekarang
                        </button>
                    </form>
                </div>

            </div>
        </div>
        <x-footer />
        <x-floating-wa />
        <script>
            window.servicesData = @json($servicesJson);
            window.courseHasTeacher = {{ $course->hasTeacher ? 1 : 0 }};

            function courseApp() {
                return {
                    activeService: null,
                    activeSub: null,
                    activeMedia: null,
                    courseThumbnail: '{{ $course->thumbnail ?? asset('img/default-course.png') }}',
                    services: window.servicesData,
                    hasTeacher: window.courseHasTeacher,
                    pengajar: null,
                    quantity: 1,
                    getPrice() {
                        let price = 0;
                        let unitInfo = '';

                        if (this.activeService) {
                            const service = this.services.find(s => s.id === this.activeService);
                            if (!service) return 'Harga belum tersedia';

                            let selectedPrice = null;

                            if (this.activeSub) {
                                const sub = service.sub_services.find(ss => ss.id === this.activeSub);
                                if (sub) {
                                    selectedPrice = sub.prices.find(p => p.learning_type === this.activeMedia) ?? null;
                                }
                            }

                            if (!selectedPrice) {
                                selectedPrice = service.prices.find(p => p.learning_type === this.activeMedia) ?? null;
                            }

                            if (selectedPrice) {
                                price = Number(selectedPrice.price);

                                if (selectedPrice.unit_type === 'per_item') {
                                    price = price * this.quantity;
                                }

                                if (selectedPrice.package_size) unitInfo = ` ${selectedPrice.package_size}`;
                                else if (selectedPrice.unit_type === 'per_item') {
                                    unitInfo = ` (${this.quantity} item)`;
                                } else if (selectedPrice.unit_type) {
                                    unitInfo = ` ${selectedPrice.unit_type}`;
                                }
                            }

                            return 'Rp ' + price.toLocaleString('id-ID', {
                                maximumFractionDigits: 0
                            }) + unitInfo;
                        } else {
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

                                return 'Start from Rp ' + price.toLocaleString('id-ID', {
                                    maximumFractionDigits: 0
                                }) + unitInfo;
                            } else {
                                return 'Harga belum tersedia';
                            }
                        }
                    },
                    getSelectedPrice() {
                        if (!this.activeService) return null;

                        const service = this.services.find(s => String(s.id) === String(this.activeService));
                        if (!service) return null;

                        let selectedPrice = null;

                        if (this.activeSub) {
                            const sub = service.sub_services.find(ss => String(ss.id) === String(this.activeSub));
                            if (sub) {
                                selectedPrice = sub.prices.find(p =>
                                    p.learning_type?.toLowerCase() === this.activeMedia?.toLowerCase()
                                ) ?? null;
                            }
                        }

                        if (!selectedPrice) {
                            selectedPrice = service.prices.find(p =>
                                p.learning_type?.toLowerCase() === this.activeMedia?.toLowerCase()
                            ) ?? null;
                        }

                        return selectedPrice;
                    },
                    getTotal() {
                        const price = this.getSelectedPrice();
                        if (!price) return 0;

                        return price.unit_type === 'per_item' ?
                            price.price * this.quantity :
                            price.price;
                    },
                    getInfoLayanan() {
                        const service = this.services.find(s => s.id === this.activeService);
                        return service?.description ?? '';
                    },
                    getCurrentThumbnail() {
                        if (this.activeSub) {
                            const service = this.services.find(s => s.id === this.activeService);
                            const sub = service?.sub_services?.find(ss => ss.id === this.activeSub);
                            return sub?.thumbnail || service?.thumbnail || this.courseThumbnail;
                        }
                        if (this.activeService) {
                            const service = this.services.find(s => s.id === this.activeService);
                            return service?.thumbnail || this.courseThumbnail;
                        }
                        return this.courseThumbnail;
                    },
                    getAvailableMedia() {
                        if (!this.activeService) return [];

                        const service = this.services.find(s => s.id === this.activeService);
                        if (!service) return [];

                        const mediaSet = new Set();
                        service.prices.forEach(p => {
                            if (p.learning_type) mediaSet.add(p.learning_type);
                        });
                        service.sub_services.forEach(sub => {
                            sub.prices.forEach(p => {
                                if (p.learning_type) mediaSet.add(p.learning_type);
                            });
                        });

                        return Array.from(mediaSet);
                    },
                    handleSubmit(event) {
                        const service = this.services.find(s => s.id === this.activeService);

                        if (!service) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Lengkapi Dulu',
                                text: 'Pilih layanan terlebih dahulu.',
                                confirmButtonColor: '#f78a28'
                            });
                            return;
                        }

                        if (service.sub_services.length > 0 && !this.activeSub) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Lengkapi Dulu',
                                text: 'Pilih sub layanan terlebih dahulu.',
                                confirmButtonColor: '#f78a28'
                            });
                            return;
                        }

                        // Cek media hanya jika service punya media
                        const hasMedia = service.prices.some(p => p.learning_type);
                        if (hasMedia && !this.activeMedia) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Lengkapi Dulu',
                                text: 'Pilih media terlebih dahulu.',
                                confirmButtonColor: '#f78a28'
                            });
                            return;
                        }

                        // Tentukan harga
                        let priceObj = null;
                        if (this.activeSub) {
                            const sub = service.sub_services.find(ss => ss.id === this.activeSub);
                            priceObj = sub.prices.find(p =>
                                p.learning_type?.toLowerCase() === this.activeMedia?.toLowerCase()
                            );
                        }
                        if (!priceObj) {
                            priceObj = service.prices.find(p =>
                                p.learning_type?.toLowerCase() === this.activeMedia?.toLowerCase()
                            );
                        }

                        if (!priceObj || priceObj.price <= 0) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Harga Tidak Tersedia',
                                text: 'Pilih layanan/sub/media lain.',
                                confirmButtonColor: '#f78a28'
                            });
                            return;
                        }

                        this.selectedPrice = priceObj.price;

                        // paksa update DOM dulu
                        this.$nextTick(() => {
                            event.target.submit();
                        });
                    }
                }
            }
        </script>
</body>

</html>
