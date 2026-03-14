<aside :class="open ? 'w-56 sm:w-64' : 'w-12 sm:w-16'"
    class="bg-navy_2 text-white flex flex-col fixed left-0 top-10 sm:top-16 md:top-20 bottom-0 z-40 transition-all duration-300">
    <!-- Header -->
    <div class="h-14 sm:h-16 flex items-center justify-between px-3 sm:px-4 border-b border-white/20 flex-shrink-0">
        <span x-show="open" class="text-base sm:text-xl font-semibold truncate">
            {{ ucfirst(auth()->user()->role) }} Panel
        </span>

        <!-- Toggle -->
        <button @click="open = !open" class="p-1.5 sm:p-2 rounded hover:bg-white/10 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-2 py-6 space-y-2 overflow-y-auto">
        @php $activeTab = request('tab', 'overview'); @endphp

        <a href="{{ route('dashboard', ['tab' => 'overview']) }}" title="Overview"
            class="flex items-center gap-2 sm:gap-3 px-2 py-1.5 sm:px-3 sm:py-2 text-sm sm:text-base rounded transition {{ $activeTab === 'overview' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
            <x-heroicon-o-home class="w-5 h-5 sm:w-6 sm:h-6" />
            <span x-show="open">Overview</span>
        </a>

        {{-- Role-based menus --}}
        @if (auth()->user()->role === 'admin')
            @include('partials.sidebar.menu-admin')
        @elseif(auth()->user()->role === 'teacher')
            @include('partials.sidebar.menu-teacher')
        @elseif(auth()->user()->role === 'student')
            @include('partials.sidebar.menu-student')
        @endif
    </nav>
</aside>
