<div class="min-h-screen bg-gray-50 py-10 px-4">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Your Cart</h1>

        @if($books->isEmpty())
            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">Your cart is empty.</p>
                <a href="/" class="mt-4 inline-block text-indigo-600 hover:underline">Browse books</a>
            </div>
        @else
            <div class="flex flex-col gap-4">
                @foreach($books as $book)
                    <div class="flex items-center gap-6 bg-white rounded-xl shadow p-4">

                        {{-- Book Cover --}}
                        @if($book->cover_image)
                            <img src="{{ Storage::url($book->cover_image) }}" class="w-20 h-28 object-cover rounded-lg" alt="{{ $book->title }}">
                        @else
                            <div class="w-20 h-28 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Image</span>
                            </div>
                        @endif

                        {{-- Book Info --}}
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold text-gray-800">{{ $book->title }}</h2>
                            <p class="text-sm text-gray-500">{{ $book->author->name }}</p>
                        </div>
                        
                        {{-- Quantity --}}
                        <div class="text-gray-500 text-sm">
                            Qty: {{ $quantities[$book->id] }}
                        </div>

                        {{-- Price --}}
                        <div class="text-indigo-600 font-bold text-lg">
                            RM {{ number_format($book->price, 2) }}
                        </div>

                        {{-- Remove Button --}}
                        <button wire:click="removeFromCart({{ $book->id }})"
                            class="text-red-400 hover:text-red-600 transition text-sm font-semibold">
                        Remove
                        </button>

                    </div>
                @endforeach
            </div>

            {{-- Total --}}
            <div class="mt-8 flex justify-end">
                <div class="bg-white rounded-xl shadow p-6 w-full max-w-sm">
                    <div class="flex justify-between text-gray-700 text-lg font-semibold">
                        <span>Total</span>
                        <span>RM {{ number_format(collect($books)->sum(fn($book) => $book->price * $quantities[$book->id]), 2) }}</span>
                    </div>
                    <button class="mt-4 w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        @endif
    </div>
</div>
