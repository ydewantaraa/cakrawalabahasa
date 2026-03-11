<!-- Search Input -->
<input type="text" x-model="searchQuery" placeholder="Search Layanan / Sub Layanan"
    class="border px-2 py-1 rounded text-sm mt-3 w-full sm:w-64 max-w-[250px]" />

<!-- Wrapper Responsive -->
<div class="overflow-x-auto w-full mt-2">
    <table class="min-w-[700px] w-full border text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="border px-3 py-2 text-left">Layanan</th>
                <th class="border px-3 py-2 text-left">Sub Layanan</th>
                <th class="border px-3 py-2 text-left">Media</th>
                <th class="border px-3 py-2 text-left">Tipe Unit</th>
                <th class="border px-3 py-2 text-left">Label Item</th>
                <th class="border px-3 py-2 text-left">Harga</th>
                <th class="border px-3 py-2 text-left">Label Paket</th>
                <th class="border px-3 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="price in paginatedPrices" :key="price.id">
                <tr class="hover:bg-gray-50">
                    <td x-text="price.service.name" class="border px-3 py-2 whitespace-nowrap"></td>
                    <td x-text="price.subService ? price.subService.name : '-'"
                        class="border px-3 py-2 whitespace-nowrap"></td>
                    <td x-text="price.learning_type ?? '-'" class="border px-3 py-2 whitespace-nowrap">
                    </td>
                    <td x-text="price.unit_type === 'per_item' ? 'Per Item' : (price.unit_type === 'fixed' ? 'Harga Tetap' : '-')"
                        class="border px-3 py-2 whitespace-nowrap capitalize"></td>
                    <td x-text="price.unit_type === 'per_item' ? price.label_type : '-'"
                        class="border px-3 py-2 whitespace-nowrap"></td>
                    <td x-text="'Rp ' + Number(price.price).toLocaleString()"
                        class="border px-3 py-2 text-green-600 font-semibold whitespace-nowrap"></td>
                    <td x-text="price.unit_type === 'fixed' ? price.package_size : '-'"
                        class="border px-3 py-2 whitespace-nowrap"></td>

                    <!-- Kolom Aksi -->
                    <td class="border px-3 py-2 flex gap-2 whitespace-nowrap">
                        <!-- Edit -->
                        <button class="px-2 py-1 text-sm bg-blue-600 hover:bg-blue-500 text-white rounded"
                            @click="$store.modal.show('Edit Harga', $refs['editPrice' + price.id].innerHTML)">
                            Edit
                        </button>

                        <!-- Delete -->
                        <form :action="`/prices/${price.id}`" method="POST"
                            @submit.prevent="$store.alert.confirm({ title: 'Hapus Harga?' }, ()=> $el.submit())">
                            @csrf
                            @method('DELETE')
                            <button
                                class="px-2 py-1 text-sm border rounded bg-red-600 hover:bg-red-500 text-white">Hapus</button>
                        </form>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-2 flex justify-center gap-2">
    <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1"
        :class="currentPage === 1 ? 'bg-gray-300 text-gray-500 px-2 py-1 rounded cursor-not-allowed' :
            'bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300'">
        Prev
    </button>

    <template x-for="page in totalPages" :key="page">
        <button @click="goToPage(page)" x-text="page"
            :class="currentPage === page ?
                'bg-navy_1 text-white px-2 py-1 rounded' :
                'bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300'">
        </button>
    </template>

    <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages"
        :class="currentPage === totalPages ? 'bg-gray-300 text-gray-500 px-2 py-1 rounded cursor-not-allowed' :
            'bg-gray-200 text-gray-700 px-2 py-1 rounded hover:bg-gray-300'">
        Next
    </button>
</div>

<!-- Kembali Button -->
<button @click="priceManagement = null" class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded mt-2">
    Kembali
</button>
