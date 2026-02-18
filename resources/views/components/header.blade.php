    <header
        class="bg-[#232c5f] text-white pt-1 pb-1 md:pt-2 md:pb-2 ps-4 pe-4 md:px-8 xl:ps-8 xl:pe-8 border-b-4 border-white fixed top-0 left-0 w-full h-auto z-50">
        <div class="mx-auto header-center flex items-center justify-center">
            <a href="/" class="flex items-center flex-shrink-0 cursor-pointer hover:scale-105 transition">
                <img src="/img/logo.png" alt="Logo" class="h-7 md:h-12 xl:h-14">
            </a>
            <div class="flex-grow"></div>
            <nav class="hidden md:flex space-x-6 items-center" x-data="{ openProgram: false, clickProgram: false, openLayanan: false, clickLayanan: false }">
                <a href="/tentang kami"
                    class="hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">Tentang
                    Kami</a>

                <!-- MENU PROGRAM HYBRID -->
                <div class="relative" @mouseenter="openProgram = true"
                    @mouseleave="if (!clickProgram) openProgram = false">
                    <button @click="clickProgram = !clickProgram; openProgram = clickProgram"
                        class="group hover:text-orange-500 flex items-center gap-1 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">
                        Program
                        <svg class="w-4 h-4 transform transition-transform duration-700 ease-in-out group-hover:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="openProgram" @click.away="clickProgram = false; openProgram = false" x-cloak
                        @mouseenter="openProgram = true" @mouseleave="if (!clickProgram) openProgram = false"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 transform translate-y-5"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-400"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform translate-y-2"
                        class="absolute bg-[#101851] text-white rounded shadow mt-2 w-40 py-2 z-50">
                        <a href="/partnership"
                            class="block px-4 py-2 hover:text-[#f78a28] hover:bg-[#171c26] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">Partnership</a>
                        <a href="/membership"
                            class="block px-4 py-2 hover:text-[#f78a28] hover:bg-[#171c26] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">Membership</a>
                        <a href="/beasiswa"
                            class="block px-4 py-2 hover:text-[#f78a28] hover:bg-[#171c26] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">Beasiswa</a>
                        <a href="/karir"
                            class="block px-4 py-2 hover:text-[#f78a28] hover:bg-[#171c26] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">Karir</a>
                    </div>
                </div>

                <a href="/berita"
                    class="hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">Berita</a>
                <div class="relative" @mouseenter="openLayanan = true"
                    @mouseleave="if (!clickLayanan) openLayanan = false">
                    <button @click="clickLayanan = !clickLayanan; openLayanan = clickLayanan"
                        class="group hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold flex items-center gap-1">
                        Layanan
                        <svg class="w-4 h-4 transform transition-transform duration-700 ease-in-out group-hover:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    {{-- <div x-show="openLayanan" @click.away="clickLayanan = false; openLayanan = false" x-cloak
                        @mouseenter="openLayanan = true" @mouseleave="if (!clickLayanan) openLayanan = false"
                        x-transition:enter="transition ease-out duration-700"
                        x-transition:enter-start="opacity-0 transform translate-y-5"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-400"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform translate-y-2"
                        class="absolute bg-[#101851] text-white rounded shadow mt-2 w-40 py-2 z-50">
                        <a href="/cb for kids"
                            class="hover:shadow-2xl transform hover:text-[#f78a28] hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block px-4 py-2 hover:bg-[#171c26]">CB
                            for Kids</a>
                        <a href="/cb for you"
                            class="hover:shadow-2xl transform hover:text-[#f78a28] hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block px-4 py-2 hover:bg-[#171c26]">CB
                            for You</a>
                        <a href="/cb extras"
                            class="hover:shadow-2xl transform hover:text-[#f78a28] hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block px-4 py-2 hover:bg-[#171c26]">CB
                            Extras</a>
                    </div> --}}
                    <div x-show="openLayanan" @click.away="clickLayanan = false; openLayanan = false" x-cloak
                        @mouseenter="openLayanan = true" @mouseleave="if (!clickLayanan) openLayanan = false"
                        class="absolute bg-[#101851] text-white rounded shadow mt-2 w-40 py-2 z-50">

                        @foreach ($dropdownProgramServices as $service)
                            <a href="{{ route('program-services.show', $service) }}"
                                class="hover:shadow-2xl transform hover:text-[#f78a28] hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block px-4 py-2 hover:bg-[#171c26]">
                                {{ $service->name }}
                            </a>
                        @endforeach
                    </div>

                </div>
                @if (auth()->guest() || auth()->user()->role === 'student')
                    <a href="{{ route('cart.index') }}"
                        class="hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">
                        Keranjang
                    </a>
                @endif
                <a href="{{ route('cart.index') }}"
                    class="hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">Keranjang</a>
            </nav>
            @guest
                <a href="{{ route('login') }}"
                    class="bg-gradient-to-r from-[#fd5243] to-[#f1877e] hover:bg-gradient-to-r hover:from-[#1f3585] hover:to-[#7e9df1] border-[7px] hover:border-[#f78a28] border-[#364078] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 text-white px-4 py-2 rounded-full font-bold text-xs md:text-sm xl:text-base hidden md:flex items-center ml-4">
                    Masuk!
                </a>
            @endguest
            @auth
                <div class="ml-4 relative" x-data="{ dropdown: false }">
                    <button @click="dropdown = !dropdown" class="flex items-center focus:outline-none"><a
                            href="/dashboard"><img src="{{ Auth::user()->avatar }}" alt="Profile"<a href="/dashboard"><img
                                src="/img/default-avatar.png" alt="Profile"></a>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                    <div x-show="dropdown" @click.away="dropdown = false" x-cloak
                        class="bg-[#232c5f] absolute right-0 mt-2 w-48 border rounded-md shadow-lg z-50">
                        {{-- Profile link --}} @if (auth()->user()->role === 'student')
                            <a href="{{ route('student-profile.show') }}"
                                class="block px-4 py-2 text-white hover:text-orange-500">Profile</a>
                        @elseif (auth()->user()->role === 'teacher')
                            <a href="{{ route('teacher-profile.show') }}"
                                class="block px-4 py-2 text-white hover:text-orange-500">Profile</a>
                        @endif

                        {{-- Logout --}}
                        <a href="{{ route('student-profile.show') }}"
                            class="block px-4 py-2 text-white hover:text-orange-500">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-white hover:text-orange-500">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            @endauth
            <div class="md:hidden ml-auto">
                <button @click="open = !open" :class="open ? 'spin-slow' : ''"
                    class="relative w-8 h-8 flex items-center justify-center focus:outline-none group transition-transform duration-500 ease-in-out">

                    <!-- Garis 1 -->
                    <span :class="open ? 'rotate-45 translate-y-0' : '-translate-y-1.5'"
                        class="absolute h-0.5 w-6 bg-white rounded-md transition-all duration-500 ease-in-out origin-center"></span>

                    <!-- Garis 2 -->
                    <span :class="open ? 'opacity-0 scale-75' : 'opacity-100 scale-100'"
                        class="absolute h-0.5 w-6 bg-white rounded-md transition-all duration-500 ease-in-out origin-center"></span>

                    <!-- Garis 3 -->
                    <span :class="open ? '-rotate-45 translate-y-0' : 'translate-y-1.5'"
                        class="absolute h-0.5 w-6 bg-white rounded-md transition-all duration-500 ease-in-out origin-center"></span>
                </button>
            </div>
        </div>
        <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 scale-95 translate-x-4"
            x-transition:enter-end="opacity-100 scale-100 translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100 translate-x-0"
            x-transition:leave-end="opacity-0 scale-95 translate-x-4"
            class="absolute top-full right-0 w-2/3 bg-[#101851]/70 backdrop-blur-xl z-50 p-4 flex flex-col space-y-4 md:hidden rounded-b-xl shadow-2xl border border-white/10">
            <a href="/tentang kami"
                class="block hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">Tentang
                Kami</a>
            <div>
                <button @click="mobileProgram = !mobileProgram"
                    class="flex justify-between w-full hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">
                    Program
                    <svg class="w-4 h-4 transform" :class="mobileProgram ? 'rotate-180' : ''" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileProgram" x-cloak class="ml-4 mt-2 space-y-2">
                    <a href="/partnership"
                        class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block hover:text-orange-500">Partnership</a>
                    <a href="/membership"
                        class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block hover:text-orange-500">Membership</a>
                    <a href="/beasiswa"
                        class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block hover:text-orange-500">Beasiswa</a>
                    <a href="/karir"
                        class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base block hover:text-orange-500">Karir</a>
                </div>
            </div>
            <a href="/berita"
                class="hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold block hover:text-orange-500">Berita</a>
            <div>
                <button @click="mobileLayanan = !mobileLayanan"
                    class="flex justify-between w-full hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">
                    Layanan
                    <svg class="w-4 h-4 transform" :class="mobileLayanan ? 'rotate-180' : ''" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="mobileLayanan" x-cloak class="ml-4 mt-2 space-y-2">
                    <a href="/cb for kids"
                        class="block hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">CB
                        for Kids</a>
                    <a href="/cb for you"
                        class="block hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">CB
                        for You</a>
                    <a href="/cb extras"
                        class="block hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base">CB
                        Extras</a>
                </div>
            </div>
            <a href="/keranjang"
                class="block hover:text-orange-500 hover:shadow-2xl transform hover:-translate-y-1 hover:scale-100 transition-all duration-200 text-xs md:text-sm xl:text-base font-bold">Keranjang</a>
            @guest
                <a href="{{ route('login') }}"
                    class="inline-block bg-gradient-to-r from-[#fd5243] to-[#f1877e] hover:bg-gradient-to-r hover:from-[#1f3585] hover:to-[#7e9df1] border-4 hover:border-[#f78a28] border-[#364078] hover:shadow-2xl transform hover:-translate-y-1 hover:scale-105 transition-all duration-300 w-24 text-white font-bold text-xs md:text-sm xl:text-base px-4 py-2 rounded-full text-center">
                    Masuk!
                </a>
            @endguest
            @auth
                <a href="{{ route('student-profile.show') }}" class="block">
                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" <img
                        src="{{ Auth::user()->profile_photo_url ?? '/img/default-avatar.png' }}"
                        alt="{{ Auth::user()->name }}"
                        class="ml-4 h-10 w-10 rounded-full border-2 border-white shadow-lg hover:scale-105 transition" />
                </a>
            @endauth
        </div>
    </header>
