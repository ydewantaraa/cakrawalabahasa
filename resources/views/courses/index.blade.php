<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-6">
            @foreach($courses as $course)
                <div class="bg-white p-4 rounded shadow">
                    @if($course->thumbnail)
                        <img src="{{ asset('storage/'.$course->thumbnail) }}" alt="{{ $course->title }}" class="rounded mb-4">
                    @endif
                    <h3 class="font-bold text-lg mb-2">{{ $course->title }}</h3>
                    <p class="mb-2">{{ Str::limit($course->description, 80) }}</p>
                    <p class="font-bold mb-2">Rp {{ number_format($course->price, 0, ',', '.') }}</p>
                    <form action="{{ route('cart.add', $course->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
