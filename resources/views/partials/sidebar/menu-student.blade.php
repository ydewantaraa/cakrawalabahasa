<a href="{{ route('dashboard', ['tab' => 'my-classes']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'my-classes' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 20.055
                   12.083 12.083 0 015.84 10.578L12 14z" />
    </svg>

    <span x-show="open">Kelas Saya</span>
</a>

<!-- Riwayat Pembayaran -->
<a href="{{ route('dashboard', ['tab' => 'payment-history']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'payment-history' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex-shrink-0" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12h8m0 0l-3-3m3 3l-3 3" />
    </svg>

    <span x-show="open">Riwayat Pembayaran</span>
</a>

<!-- Kelas Favorit -->
<a href="{{ route('dashboard', ['tab' => 'favorite-classes']) }}"
    class="flex items-center gap-3 px-3 py-2 rounded transition {{ $activeTab === 'favorite-classes' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="icon icon-tabler icons-tabler-outline icon-tabler-file-star">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" />
        <path
            d="M11.8 16.817l-2.172 1.138a.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a.39 .39 0 0 1 -.567 .411l-2.172 -1.138" />
    </svg>

    <span x-show="open">Kelas Favorit</span>
</a>
