<div class="pt-32 pb-24 px-6 max-w-7xl mx-auto w-full min-h-screen">

    {{-- Editorial Header --}}
    <div class="mb-12">
        <span class="text-secondary font-bold tracking-widest text-[10px] uppercase mb-2 block font-label">Your Selection</span>
        <h1 class="text-5xl font-extrabold tracking-tighter text-primary font-headline">Library Cart.</h1>
    </div>

    @if($books->isEmpty())
        {{-- Empty State --}}
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="w-24 h-24 bg-surface-container-low flex items-center justify-center mb-6">
                <span class="material-symbols-outlined text-4xl text-on-surface-variant">shopping_basket</span>
            </div>
            <h2 class="text-3xl font-bold tracking-tight mb-2 font-headline">Your collection is currently empty.</h2>
            <p class="text-on-surface-variant max-w-sm mx-auto mb-8 font-body">You haven't added any books yet. Discover our curated selection.</p>
            <a href="/" class="inline-flex items-center gap-2 font-bold text-secondary hover:underline transition-all font-label uppercase tracking-widest text-sm">
                Return to the catalog
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

            {{-- Cart Items --}}
            <div class="lg:col-span-8 space-y-8">
                @foreach($books as $book)
                    <div class="flex gap-6 pb-8 border-b border-outline-variant/20">
                        <div class="w-32 h-48 bg-surface-container-low overflow-hidden shadow-sm flex-shrink-0">
                            @if($book->cover_image)
                                <img
                                    src="{{ Storage::url($book->cover_image) }}"
                                    alt="{{ $book->title }}"
                                    class="w-full h-full object-cover"
                                />
                            @else
                                <div class="w-full h-full flex items-center justify-center p-3">
                                    <span class="text-on-surface-variant text-xs text-center font-body">{{ $book->title }}</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col justify-between flex-grow py-2">
                            <div>
                                <div class="flex justify-between items-start">
                                    <h3 class="text-xl font-bold tracking-tight text-primary font-headline">{{ $book->title }}</h3>
                                    <span class="text-lg font-bold text-primary font-headline">RM {{ number_format($book->price, 2) }}</span>
                                </div>
                                <p class="text-on-surface-variant mt-1 font-body">{{ $book->author->name }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-on-surface-variant font-label">Qty: {{ $quantities[$book->id] }}</span>
                                <button
                                    wire:click="removeFromCart({{ $book->id }})"
                                    class="text-on-surface-variant hover:text-error flex items-center gap-1 transition-colors text-sm font-medium font-label">
                                    <span class="material-symbols-outlined text-lg">delete</span>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-4 sticky top-32">
                <div class="bg-surface-container-lowest p-8 shadow-sm border border-outline-variant/10">
                    <h2 class="text-2xl font-bold tracking-tight mb-8 font-headline">Summary</h2>
                    <div class="space-y-4 mb-8">
                        @foreach($books as $book)
                            <div class="flex justify-between text-sm text-on-surface-variant font-body">
                                <span>{{ $book->title }} ×{{ $quantities[$book->id] }}</span>
                                <span>RM {{ number_format($book->price * $quantities[$book->id], 2) }}</span>
                            </div>
                        @endforeach
                        <div class="pt-4 border-t border-outline-variant/20 flex justify-between">
                            <span class="font-bold text-lg font-headline">Total</span>
                            <span class="font-bold text-2xl text-primary font-headline">
                                RM {{ number_format(collect($books)->sum(fn($book) => $book->price * $quantities[$book->id]), 2) }}
                            </span>
                        </div>
                    </div>
                    <a href="/checkout" class="block w-full text-center bg-secondary-container hover:bg-secondary text-on-secondary-container hover:text-white font-extrabold py-4 px-6 transition-all duration-300 font-label uppercase tracking-widest text-xs">
                        Proceed to Checkout
                    </a>
                    <div class="mt-6 flex items-center justify-center gap-2 text-on-surface-variant/60">
                        <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">lock</span>
                        <span class="text-xs uppercase tracking-widest font-semibold font-label">Secure Checkout</span>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
