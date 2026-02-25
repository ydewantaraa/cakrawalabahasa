<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white p-4 rounded shadow">
                    @if ($course['img'])
                        <img src="{{ asset($course['img']) }}" alt="{{ $course['title'] }}"
                            class="rounded mb-4 w-full h-40 object-cover">
                    @endif

                    <h3 class="font-bold text-lg mb-2">{{ $course['title'] }}</h3>

                    <p class="text-gray-600 text-sm mb-2">{{ Str::limit($course['deskripsi'], 80) }}</p>

                    <p class="font-bold text-blue-600 mb-2">{{ $course['harga'] }}</p>

                    <!-- Tampilan Fasilitas -->
                    @if (!empty($course['fasilitas']))
                        <div class="mb-2">
                            <span class="font-semibold text-gray-700">Fasilitas:</span>
                            <p class="text-sm text-gray-500">{{ $course['fasilitas'] }}</p>
                        </div>
                    @endif

                    <!-- Tampilan Keterangan (Di bawah Fasilitas) -->
                    @if (!empty($course['keterangan']))
                        <div class="mb-4">
                            <span class="font-semibold text-gray-700">Keterangan:</span>
                            <p class="text-sm text-gray-500 italic">{{ $course['keterangan'] }}</p>
                        </div>
                    @endif

                    <form action="{{ route('cart.add', $course['id']) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded w-full mt-2 hover:bg-blue-600">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
