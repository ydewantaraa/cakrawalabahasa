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
                <img src="{{ $course->thumbnail ?? asset('images/default.jpg') }}"
                    class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-200 rounded-2xl w-2/3 md:w-full object-cover mb-6 aspect-square object-top">

                @if ($course->shopee_link)
                    <a href="{{ $course->shopee_link }}" target="_blank">
                        <img src="/img/Shopee.svg.png" class="w-24 hover:scale-105 transition">
                    </a>
                @endif
            </div>

            <!-- Deskripsi -->
            <div class="md:w-[65%] text-[#151d52]" x-data="{
                activeService: {{ $course->course_services->first()?->id ?? 'null' }},
                activeSub: null,
                activeMedia: null
            }">

                <h2 class="text-base md:text-lg lg:text-2xl xl:text-3xl font-bold mb-4">
                    {{ $course->name }}
                </h2>

                <p class="text-sm md:text-base text-justify leading-relaxed mb-6">
                    {{ $course->description }}
                </p>

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
                <div class="text-[#f78a28] font-bold text-2xl mb-4">

                    @foreach ($course->course_services as $service)
                        <div x-show="activeService === {{ $service->id }}">

                            @php
                                $servicePriceMap = $service->prices->keyBy('learning_type'); // service prices per media
                            @endphp

                            {{-- Jika pilih sub --}}
                            @foreach ($service->sub_course_services as $sub)
                                <div x-show="activeSub === {{ $sub->id }}">
                                    @php
                                        $subPriceMap = $sub->prices->keyBy('learning_type'); // sub prices per media
                                    @endphp

                                    <template x-if="activeMedia">
                                        <div>
                                            <span
                                                x-text="
                                '{{ number_format(
                                    $subPriceMap->get(':media')?->price ?? ($servicePriceMap->get(':media')?->price ?? 0),
                                    0,
                                    ',',
                                    '.',
                                ) }}'.replace(':media', activeMedia)
                            "></span>
                                        </div>
                                    </template>
                                </div>
                            @endforeach

                            {{-- Jika belum pilih sub --}}
                            <div x-show="!activeSub">
                                <template x-if="activeMedia">
                                    <div>
                                        <span
                                            x-text="
                            '{{ number_format($servicePriceMap->get(':media')?->price ?? 0, 0, ',', '.') }}'.replace(':media', activeMedia)
                        "></span>
                                    </div>
                                </template>
                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- MEDIA --}}
                <div class="mb-6">
                    <p class="font-semibold mb-2 text-base md:text-lg">
                        Media
                    </p>

                    @php
                        $mediaTypes = $course->course_services
                            ->flatMap(fn($s) => $s->prices)
                            ->pluck('learning_type')
                            ->filter()
                            ->unique();
                    @endphp

                    <div class="flex gap-2 flex-wrap">
                        @foreach ($mediaTypes as $media)
                            <button @click="activeMedia = '{{ $media }}'"
                                :class="activeMedia === '{{ $media }}' ?
                                    'border-[#f78a28] shadow-lg shadow-orange-300' :
                                    'bg-white text-black border-gray-300'"
                                class="py-1 px-3 rounded-lg border transition capitalize">

                                {{ $media }}
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- SERVICE --}}
                @if ($course->course_services->isNotEmpty())
                    <div class="mb-6">

                        <p class="font-semibold mb-2 text-base md:text-lg">
                            Layanan
                        </p>

                        <div class="flex gap-2 flex-wrap">
                            @foreach ($course->course_services as $service)
                                <button @click="activeService = {{ $service->id }}; activeSub = null"
                                    :class="activeService === {{ $service->id }} ?
                                        'border-[#f78a28] shadow-lg shadow-orange-300' :
                                        'bg-white text-black border-gray-300'"
                                    class="py-1 px-3 rounded-lg border transition">

                                    {{ $service->name }}
                                </button>
                            @endforeach
                        </div>

                    </div>
                @endif


                {{-- SUB SERVICE --}}
                @foreach ($course->course_services as $service)
                    <div x-show="activeService === {{ $service->id }}" x-transition>
                        @if ($service->sub_course_services->isNotEmpty())
                            <p class="font-semibold mb-2 mt-4 text-base md:text-lg">
                                Sub Layanan
                            </p>

                            <div class="flex gap-2 flex-wrap mb-4">
                                @foreach ($service->sub_course_services as $sub)
                                    <button @click="activeSub = {{ $sub->id }}"
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
