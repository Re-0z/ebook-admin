<div class="min-h-screen bg-gray-50 py-10 px-4">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Checkout</h1>

        <div class="flex flex-col lg:flex-row gap-8">

            {{-- Left: Form --}}
            <div class="flex-1 bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-6">Your Details</h2>

                <div class="flex flex-col gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                        <input wire:model="name" type="text"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                               placeholder="Your name">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                        <input wire:model="email" type="email"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                               placeholder="Your email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Delivery Address</label>
                        <textarea wire:model="address" rows="3"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                                  placeholder="Your address"></textarea>
                    </div>
                </div>
            </div>

            {{-- Right: Order Summary --}}
            <div class="w-full lg:w-80 flex flex-col gap-4">

                <div class="bg-white rounded-xl shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Order Summary</h2>

                    @foreach($books as $book)
                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                            <div>
                                <p class="text-sm font-medium text-gray-800">{{ $book->title }}</p>
                                <p class="text-xs text-gray-400">x{{ $quantities[$book->id] }}</p>
                            </div>
                            <p class="text-sm font-semibold text-indigo-600">
                                RM {{ number_format($book->price * $quantities[$book->id], 2) }}
                            </p>
                        </div>
                    @endforeach

                    <div class="flex justify-between items-center mt-4 text-lg font-bold text-gray-800">
                        <span>Total</span>
                        <span>RM {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <button wire:click="placeOrder" class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                    Place Order
                </button>

            </div>
        </div>
    </div>
</div>
