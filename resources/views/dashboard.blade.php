<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>

    <div
        class="flex flex-col md:flex-row p-6 space-y-6 md:space-y-0 md:space-x-6"
        x-data="{ activeTab: 'courses' }"
    >
        <!-- Sidebar -->
        <div
        class="w-full md:w-1/5 bg-white rounded-3xl shadow-lg p-6"
        >
        <nav class="space-y-4">
            <button
            @click="activeTab = 'courses'"
            class="w-full flex items-center space-x-3 font-semibold transition-all duration-150"
            :class="activeTab === 'courses' ? 'text-[#151d52]' : 'text-gray-400'"
            >
            <div
                :class="activeTab === 'courses' ? 'bg-[#151d52] text-white' : 'border border-gray-400 text-gray-400'"
                class="w-8 h-8 flex items-center justify-center rounded-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <span>My Courses</span>
            </button>

            <button
            @click="activeTab = 'history'"
            class="w-full flex items-center space-x-3 font-semibold transition-all duration-150"
            :class="activeTab === 'history' ? 'text-[#151d52]' : 'text-gray-400'"
            >
            <div
                :class="activeTab === 'history' ? 'bg-[#151d52] text-white' : 'border border-gray-400 text-gray-400'"
                class="w-8 h-8 flex items-center justify-center rounded-lg"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <span>History</span>
            </button>

            <button
            @click="activeTab = 'favourite'"
            class="w-full flex items-center space-x-3 font-semibold transition-all duration-150"
            :class="activeTab === 'favourite' ? 'text-[#151d52]' : 'text-gray-400'"
            >
            <div
                :class="activeTab === 'favourite' ? 'bg-[#151d52] text-white' : 'border border-gray-400 text-gray-400'"
                class="w-8 h-8 flex items-center justify-center rounded-lg"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5A6.5 6.5 0 0112 2a6.5 6.5 0 0110 6.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
            </div>
            <span>My Favourite</span>
            </button>
        </nav>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-4/5 space-y-6">
        <!-- My Courses -->
        <section
            x-show="activeTab === 'courses'"
            x-cloak
            class="transition-opacity duration-300 ease-in-out"
        >
            <h2 class="font-bold text-xl text-[#151d52] mb-6">My Courses</h2>
            <div class="bg-white rounded-3xl shadow-lg p-6 space-y-4">
            <div class="flex flex-col sm:flex-row bg-orange-400 rounded-2xl p-4 shadow-lg text-white">
                <div class="flex-shrink-0 flex justify-center mb-4 sm:mb-0 sm:w-1/3">
                <img src="/img/flag-uk.png" alt="Bahasa Inggris" class="h-16">
                </div>
                <div class="flex-grow pl-0 sm:pl-4">
                <h3 class="font-bold text-lg">Bahasa Inggris</h3>
                <p class="text-sm mt-1">12 Oktober 2025 - 12 November 2025</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row bg-orange-400 rounded-2xl p-4 shadow-lg text-white">
                <div class="flex-shrink-0 flex justify-center mb-4 sm:mb-0 sm:w-1/3">
                <img src="/img/microphone.png" alt="Public Speaking" class="h-16">
                </div>
                <div class="flex-grow pl-0 sm:pl-4">
                <h3 class="font-bold text-lg">Public Speaking</h3>
                <p class="text-sm mt-1">10 Oktober 2025 - 20 Oktober 2025</p>
                </div>
            </div>
            </div>
        </section>

        <!-- History -->
        <section
            x-show="activeTab === 'history'"
            x-cloak
            class="transition-opacity duration-300 ease-in-out"
        >
            <h2 class="font-bold text-xl text-[#151d52] mb-6">Order History</h2>
            <div class="overflow-x-auto bg-white rounded-3xl shadow-lg p-6">
            <table class="w-full text-left min-w-[600px]">
                <thead class="border-b">
                <tr>
                    <th class="py-2">Jenis</th>
                    <th>Status</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b">
                    <td class="py-3">
                    <div>Modul Bahasa Inggris</div>
                    <div class="text-sm text-gray-500">12 Juni 2025</div>
                    </td>
                    <td class="text-green-600 font-semibold">Success</td>
                    <td>1x</td>
                    <td>Rp.100.000</td>
                </tr>
                <tr class="border-b">
                    <td class="py-3">
                    <div>Video Public Speaking</div>
                    <div class="text-sm text-gray-500">11 April 2025</div>
                    </td>
                    <td class="text-yellow-500 font-semibold">Waiting</td>
                    <td>1x</td>
                    <td>Rp.150.000</td>
                </tr>
                <tr>
                    <td class="py-3">
                    <div>Modul Bahasa Korea</div>
                    <div class="text-sm text-gray-500">11 April 2025</div>
                    </td>
                    <td class="text-red-500 font-semibold">Canceled</td>
                    <td>1x</td>
                    <td>Rp.100.000</td>
                </tr>
                </tbody>
            </table>
            </div>
        </section>

        <!-- My Favourite -->
        <section
            x-show="activeTab === 'favourite'"
            x-cloak
            class="transition-opacity duration-300 ease-in-out"
        >
            <h2 class="font-bold text-xl text-[#151d52] mb-6">My Favourite</h2>
            <div class="bg-white rounded-3xl shadow-lg p-6 space-y-4">
            <div class="flex flex-col sm:flex-row bg-orange-400 rounded-2xl p-4 shadow-lg text-white">
                <div class="flex-shrink-0 flex justify-center mb-4 sm:mb-0 sm:w-1/3">
                <img src="/img/flag-uk.png" alt="Bahasa Inggris" class="h-16">
                </div>
                <div class="flex-grow pl-0 sm:pl-4">
                <h3 class="font-bold text-lg">Bahasa Inggris</h3>
                <p class="text-sm mt-1">12 Oktober 2025 - 12 November 2025</p>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row bg-orange-400 rounded-2xl p-4 shadow-lg text-white">
                <div class="flex-shrink-0 flex justify-center mb-4 sm:mb-0 sm:w-1/3">
                <img src="/img/microphone.png" alt="Public Speaking" class="h-16">
                </div>
                <div class="flex-grow pl-0 sm:pl-4">
                <h3 class="font-bold text-lg">Public Speaking</h3>
                <p class="text-sm mt-1">10 Oktober 2025 - 20 Oktober 2025</p>
                </div>
            </div>
            </div>
        </section>
        </div>
    </div>
</x-app-layout>
