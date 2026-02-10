<nav x-data="{ open: false }" class="bg-white shadow fixed top-0 left-0 right-0 z-50">
    <div class="bg-[#232c5f] text-white flex justify-between items-center px-6 py-4">

        <!-- Logo & Menu kiri -->
        <div class="flex items-center space-x-4">
            <a href="/">
                <img src="/img/logo.png" alt="Logo" class="h-12 hover:scale-105 transition">
            </a>
            @can('student')
                <a href="{{ route('dashboard') }}" class="font-semibold hover:text-orange-500 transition">
                    Dashboard
                </a>

                <a href="{{ route('cart.index') }}" class="font-semibold hover:text-orange-500 transition">
                    Keranjang
                </a>
            @endcan
        </div>

        <!-- Hamburger (mobile) -->
        <button @click="open = !open" class="md:hidden focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop kanan -->
        <div class="hidden md:flex items-center space-x-4">

            <div class="flex gap-4">
                @guest
                    @if (request()->routeIs('login.form'))
                        <a href="{{ route('register') }}"
                            class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600 transition">
                            Register
                        </a>
                    @elseif (request()->routeIs('register.form'))
                        <a href="{{ route('login') }}"
                            class="bg-orange-500 px-4 py-2 rounded hover:bg-orange-600 transition">
                            Login
                        </a>
                    @endif
                @endguest
            </div>

            @auth
                <div class="text-right">
                    <p class="font-semibold hover:text-orange-500">
                        {{ Auth::user()->full_name }}
                    </p>
                    <span class="text-sm text-gray-300">{{ Auth::user()->role }}</span>
                </div>

                <div class="relative" x-data="{ dropdown: false }">
                    <button @click="dropdown = !dropdown" class="flex items-center space-x-1">
                        {{-- <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/default-avatar.png') }}"
                            class="h-10 w-10 rounded-full"> --}}
                        <img src="{{ Auth::user()->avatar
                            ? (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)
                                ? Auth::user()->avatar
                                : asset('storage/' . Auth::user()->avatar))
                            : asset('img/default-avatar.png') }}"
                            class="h-10 w-10 rounded-full">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div x-show="dropdown" @click.away="dropdown = false"
                        class="absolute right-0 mt-2 w-48 bg-[#232c5f] rounded shadow-lg z-50">
                        <a href="{{ route('student-profile.show') }}" class="block px-4 py-2 hover:text-orange-500">
                            Profile
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:text-orange-500">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth

        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" class="md:hidden px-6 pb-4 space-y-2 bg-[#232c5f] text-white">

        @auth
            <a href="{{ route('dashboard') }}" class="font-semibold hover:text-orange-500 transition">
                Dashboard
            </a>

            <a href="{{ route('cart.index') }}" class="font-semibold hover:text-orange-500 transition">
                Keranjang
            </a>
        @endauth

        {{-- GUEST --}}
        @guest
            <a href="{{ route('login') }}" class="block py-2 hover:text-orange-500">
                Login
            </a>
            <a href="{{ route('register') }}" class="block py-2 hover:text-orange-500">
                Register
            </a>
        @endguest

        {{-- AUTH --}}
        @auth
            <div class="border-t border-gray-600 pt-2">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-300 mb-2">Student</p>

                <a href="{{ route('student-profile.show') }}" class="block py-2 hover:text-orange-500">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left py-2 hover:text-orange-500">
                        Logout
                    </button>
                </form>
            </div>
        @endauth
    </div>
</nav>
