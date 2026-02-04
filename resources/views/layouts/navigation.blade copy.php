<nav x-data="{ open: false }" class="bg-white shadow">
    <div class="bg-[#232c5f] text-white border-white flex justify-between items-center px-6 py-4">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
        <a href="/"><img src="/img/logo.png" alt="Logo" class="h-12 hover:scale-105 transition"></a>
        <a href="{{ route('dashboard') }}"
            class="font-semibold text-white hover:text-orange-500 transition">
            Dashboard
        </a>
        <a href="{{ route('cart.index') }}"
            class="font-semibold text-white hover:text-orange-500 transition">
            Keranjang
        </a>
        </div>

        <!-- Hamburger (mobile) -->
        <button @click="open = !open"
                class="md:hidden flex items-center focus:outline-none">
        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': !open }"
                class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': !open, 'inline-flex': open }"
                class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
        </svg>
        </button>

        <!-- Desktop menu -->
        <div class="hidden md:flex items-center space-x-4">
        <div class="text-right">
            <p class="font-semibold text-white hover:text-orange-500">{{ Auth::user()->name }}</p>
            <p class="text-sm text-white">Student</p>
        </div>
        <div class="relative" x-data="{ dropdown: false }">
            <button @click="dropdown = !dropdown" class="flex items-center focus:outline-none">
            <img src="/img/default-avatar.png" alt="Profile"
                class="h-10 w-10 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
            </button>
            <div x-show="dropdown" @click.away="dropdown = false"
                class="bg-[#232c5f] absolute right-0 mt-2 w-48 border rounded-md shadow-lg z-50">
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 text-white hover:text-orange-500">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left px-4 py-2 text-white hover:text-orange-500">
                Logout
                </button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="open" class="md:hidden px-6 pb-4 space-y-2">
        <a href="{{ route('dashboard') }}"
        class="block font-semibold text-white py-2 hover:text-orange-500 transition">
        Dashboard
        </a>
        <div class="border-t border-gray-200"></div>
        <div class="text-left">
        <p class="font-semibold text-white">{{ Auth::user()->name }}</p>
        <p class="text-sm text-gray-500 mb-2">Student</p>
        <a href="{{ route('profile.edit') }}"
            class="block px-2 py-2 text-white hover:bg-gray-100 rounded">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full text-left px-2 py-2 text-white hover:bg-gray-100 rounded">
            Logout
            </button>
        </form>
        </div>
    </div>
</nav>