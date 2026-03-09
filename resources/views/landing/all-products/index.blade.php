<!DOCTYPE html>
<html lang="id">

<head>
    <x-head />
    <link rel="stylesheet" href="/css/incoming-class.css" />
    <link rel="stylesheet" href="/css/auto-swipe.css">
</head>

<body class="mx-auto font-sans bg-[#f0f5ff]" x-data="{ open: false, openProgram: false, openLayanan: false, mobileProgram: false, mobileLayanan: false }">
    <x-header />

    <!-- Section Layanan Kami -->
    @include('landing.all-products.our-services')

    <!-- Pintasan Layanan -->
    <h1
        class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500 fade-el text-3xl md:text-4xl font-bold text-[#151d52] text-center mt-12 md:mt-16 mb-8">
        Pintasan Layanan</h1>
    <div class="opacity-0 translate-y-8 transition-all duration-1000 ease-out delay-500 fade-el space-y-8 px-0 xl:px-20">
        {{-- PINTASAN KELAS --}}
        @include('landing.all-products.courses')
        {{-- SPECIAL CLASS --}}
        {{-- @include('landing.all-products.special-class') --}}

        {{-- INCOMING CLASS --}}
        @include('landing.all-products.incoming-class')
    </div>

    <!-- Section Chat Semua Produk -->
    @include('landing.all-products.chat')
    <script>
        function carousel(cards) {
            return {
                cards,
                position: 0,
                dragging: false,

                init() {
                    // nothing to duplicate
                },

                startDrag(e) {
                    this.dragging = true;
                    this.dragStartX = e.touches?.[0]?.clientX || e.clientX;
                    this.dragStartPos = this.position;
                },

                drag(e) {
                    if (!this.dragging) return;
                    const clientX = e.touches?.[0]?.clientX || e.clientX;
                    let newPos = this.dragStartPos - (clientX - this.dragStartX);

                    // batas minimum 0, maksimum isi - lebar tampilan
                    const wrap = this.$refs.wrapper;
                    const inner = this.$refs.inner;
                    const maxPos = inner.scrollWidth - wrap.clientWidth;
                    if (newPos < 0) newPos = 0;
                    if (newPos > maxPos) newPos = maxPos;

                    this.position = newPos;
                },

                endDrag() {
                    this.dragging = false;
                }
            }
        }
    </script>
    <script src="/js/animationsection.js"></script>
    <script src="/js/incoming-class.js"></script>
    <script src="/js/auto-swipe.js"></script>
    <x-footer />
    <x-floating-wa />
</body>

</html>
