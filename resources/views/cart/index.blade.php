<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white p-6 rounded shadow">
            @if($carts->count())
                <table class="w-full mb-4">
                    <thead>
                        <tr>
                            <th class="text-left">Course</th>
                            <th class="text-left">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                            <tr>
                                <td>{{ $cart->course->title }}</td>
                                <td>Rp {{ number_format($cart->course->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                        Proceed to Checkout
                    </button>
                </form>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>
