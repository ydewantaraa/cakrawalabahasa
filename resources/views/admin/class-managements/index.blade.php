<div x-data="{ detailId: null, serviceManagement: null, priceManagement: null }"
    class="bg-white p-4 sm:p-6 md:p-8 rounded shadow w-full max-w-full sm:max-w-5xl lg:max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 gap-2">
        <h1 class="text-xl sm:text-2xl font-semibold break-words">Manajemen Kelas</h1>

        <div class="flex gap-2 flex-wrap">
            <!-- Search Form -->
            <form method="GET" action="{{ route('dashboard') }}" class="flex gap-2">
                <input type="hidden" name="tab" value="{{ $tab }}"> <!-- tetap di tab courses -->
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search..."
                    class="border rounded px-2 py-1 text-sm">
                <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded text-sm hover:bg-gray-500">
                    Cari
                </button>
            </form>

            <!-- Tambah Button -->
            <button @click="$store.modal.show('Tambah Kelas', $refs.createForm.innerHTML)"
                class="bg-navy_1 hover:bg-navy_2 text-white px-4 py-2 rounded whitespace-nowrap text-sm sm:text-base">
                Tambah Kelas
            </button>
        </div>
    </div>
    <hr>

    <!-- Table Container -->
    <div x-show="!detailId && !serviceManagement && !priceManagement" class="overflow-x-auto" x-cloak>
        <table class="w-full border min-w-[500px] table-auto">
            <thead class="bg-gray-100 normal-case">
                <tr>
                    <th class="p-3 text-left normal-case">Nama</th>
                    <th class="p-3 text-left normal-case">Layanan Program</th>
                    <th class="p-3 text-left normal-case">Manajemen Layanan</th>
                    <th class="p-3 text-left normal-case">Manajemen Harga</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    @php
                        $prices = $course->course_services
                            ->flatMap(function ($service) {
                                return $service->prices->map(function ($price) use ($service) {
                                    return [
                                        'id' => $price->id,
                                        'service' => ['id' => $service->id, 'name' => $service->name],
                                        'subService' => $price->subService
                                            ? ['id' => $price->subService->id, 'name' => $price->subService->name]
                                            : null,
                                        'learning_type' => $price->learning_type,
                                        'unit_type' => $price->unit_type,
                                        'label_type' => $price->label_type,
                                        'price' => $price->price,
                                        'package_size' => $price->package_size,
                                    ];
                                });
                            })
                            ->toArray();
                    @endphp
                    <tr class="border-t">
                        <td class="p-3 break-words">{{ $course->name }}</td>

                        {{-- PROGRAM SERVICE --}}
                        <td class="p-3 break-words">
                            {{ $course->program_service?->name ?? '-' }}
                        </td>

                        {{-- TOMBOL LIHAT COURSE SERVICE --}}
                        <td class="p-3 break-words">
                            <button @click="serviceManagement = {{ $course->id }}"
                                title="Klik untuk melihat detail layanan {{ $course->name }}"
                                class="bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail Layanan
                            </button>
                        </td>

                        {{-- TOMBOL LIHAT COURSE HARGA --}}
                        <td class="p-3 break-words">
                            <button @click="priceManagement = {{ $course->id }}"
                                title="Klik untuk melihat detail harga {{ $course->name }}"
                                class="bg-navy_1 hover:bg-navy_2 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail Harga
                            </button>
                        </td>

                        {{-- AKSI --}}
                        <td class="p-3 flex flex-wrap gap-2 justify-center">
                            <!-- Edit -->
                            <button @click="$store.modal.show('Edit Kelas', $refs.edit{{ $course->id }}.innerHTML)"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Edit
                            </button>

                            <!-- Delete -->
                            <form action="{{ route('courses.destroy', $course) }}" method="POST"
                                @submit.prevent="$store.alert.confirm({ title: 'Hapus Kelas?' }, ()=> $el.submit())">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                    Hapus
                                </button>
                            </form>

                            <!-- Detail -->
                            <button @click="detailId = {{ $course->id }}"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-xs sm:text-sm">
                                Detail
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Template -->
                    <template x-ref="edit{{ $course->id }}">
                        @include('admin.class-managements.edit', ['course' => $course])
                    </template>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $courses->links() }}
        </div>
    </div>

    <!-- Detail Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            <div x-show="detailId === {{ $course->id }}" class="space-y-4">
                @include('admin.class-managements.show', ['course' => $course])

                <button @click="detailId = null" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Detail Layanan Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            <div x-show="serviceManagement === {{ $course->id }}" class="space-y-4">
                @include('admin.class-managements.class-services.partials.course-service-management', [
                    'course' => $course,
                ])

                <button @click="serviceManagement = null"
                    class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">
                    Kembali
                </button>
            </div>
        @endforeach
    </div>

    <!-- Detail Harga Section -->
    <div x-cloak>
        @foreach ($courses as $course)
            @php
                $coursePrices = $course->course_services
                    ->flatMap(function ($service) {
                        return $service->prices->map(function ($price) use ($service) {
                            return [
                                'id' => $price->id,
                                'service' => ['id' => $service->id, 'name' => $service->name],
                                'subService' => $price->subService
                                    ? ['id' => $price->subService->id, 'name' => $price->subService->name]
                                    : null,
                                'learning_type' => $price->learning_type,
                                'unit_type' => $price->unit_type,
                                'label_type' => $price->label_type,
                                'price' => $price->price,
                                'package_size' => $price->package_size,
                            ];
                        });
                    })
                    ->toArray();
            @endphp

            <div x-show="priceManagement === {{ $course->id }}" x-cloak x-data="{
                currentPage: 1,
                perPage: 10,
                searchQuery: '',
                prices: @js($coursePrices),
                get filteredPrices() {
                    if (!this.searchQuery) return this.prices;
                    return this.prices.filter(price =>
                        price.service.name.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                        (price.subService ? price.subService.name.toLowerCase().includes(this.searchQuery.toLowerCase()) : false)
                    );
                },
                get totalPages() {
                    return Math.ceil(this.filteredPrices.length / this.perPage) || 1;
                },
                get paginatedPrices() {
                    const start = (this.currentPage - 1) * this.perPage;
                    return this.filteredPrices.slice(start, start + this.perPage);
                },
                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) this.currentPage = page;
                }
            }">
                @include('admin.class-managements.class-services.partials.price-management')
            </div>
        @endforeach
    </div>
    {{-- TEMPLATE MODAL EDIT HARGA --}}
    @foreach ($courses as $course)
        @foreach ($course->course_services as $service)
            @foreach ($service->prices as $price)
                <template x-ref="editPrice{{ $price->id }}">
                    @include('admin.class-managements.prices.edit', [
                        'price' => $price,
                        'service' => $service,
                    ])
                </template>
            @endforeach
        @endforeach
    @endforeach

    <!-- Create Template di luar loop -->
    <template x-ref="createForm">
        @include('admin.class-managements.create')
    </template>
</div>
