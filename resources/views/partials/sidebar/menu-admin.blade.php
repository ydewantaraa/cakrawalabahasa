@php
    $activeTab = request('tab', 'overview');
@endphp

<a href="{{ route('dashboard', ['tab' => 'students-management']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'students-management' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <x-heroicon-o-academic-cap class="w-6 h-6" />
    <span x-show="open">Manajemen Siswa</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'classes-management']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'classes-management' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-chalkboard-teacher">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M8 19h-3a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v11a1 1 0 0 1 -1 1" />
        <path d="M12 14a2 2 0 1 0 4.001 -.001a2 2 0 0 0 -4.001 .001" />
        <path d="M17 19a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" />
    </svg>

    <span x-show="open">Manajemen Kelas</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'popular-classes']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'popular-classes' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-device-desktop-star">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M10 16h-6a1 1 0 0 1 -1 -1v-10a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v6.5" />
        <path d="M7 20h3.5" />
        <path d="M9 16v4" />
        <path
            d="M17.8 20.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138" />
    </svg>

    <span x-show="open">Kelas Populer</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'incoming-classes']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'incoming-classes' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-hourglass">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M6.5 7h11" />
        <path d="M6.5 17h11" />
        <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1" />
        <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1" />
    </svg>

    <span x-show="open">Kelas Segera Launching</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'program-services']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'program-services' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
    </svg>

    <span x-show="open">Layanan Program</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'teachers-management']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'teachers-management' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-users">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
    </svg>

    <span x-show="open">Manajemen Guru</span>
</a>

<a href="{{ route('dashboard', ['tab' => 'transaction-history']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'transaction-history' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" />
        <path d="M3 10h18" />
        <path d="M16 19h6" />
        <path d="M19 16l3 3l-3 3" />
        <path d="M7.005 15h.005" />
        <path d="M11 15h2" />
    </svg>

    <span x-show="open">Riwayat Transaksi</span>
</a>
