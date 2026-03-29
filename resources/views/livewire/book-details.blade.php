<div class="pt-24 pb-20 px-6 max-w-7xl mx-auto">

    {{-- Flash Messages --}}
    @if(session()->has('success'))
        <div class="fixed bottom-8 right-8 z-[100] flex items-center gap-4 bg-white shadow-2xl px-6 py-4 border-l-4 border-secondary max-w-sm">
            <div class="bg-secondary text-white p-1 flex-shrink-0">
                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">check</span>
            </div>
            <p class="font-bold text-sm tracking-tight font-body">{{ session('success') }}</p>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="fixed bottom-8 right-8 z-[100] flex items-center gap-4 bg-white shadow-2xl px-6 py-4 border-l-4 border-error max-w-sm">
            <p class="font-bold text-sm tracking-tight text-error font-body">{{ session('error') }}</p>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-start">

        {{-- Left: Book Cover --}}
        <div class="lg:col-span-5 sticky top-32">
            <div class="relative group aspect-[2/3] w-full max-w-md mx-auto">
                <div class="absolute inset-0 bg-primary opacity-5 blur-3xl translate-y-8 scale-95"></div>
                @if($book->cover_image)
                    <img
                        src="{{ asset('storage/' . $book->cover_image) }}"
                        alt="{{ $book->title }}"
                        class="relative w-full h-full object-cover shadow-2xl transition-transform duration-500 group-hover:scale-[1.02]"
                    />
                @else
                    <div class="relative w-full h-full bg-surface-container-high flex items-center justify-center">
                        <span class="font-headline font-bold text-on-surface-variant text-center px-8 text-xl">{{ $book->title }}</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Right: Details & Actions --}}
        <div class="lg:col-span-7 flex flex-col gap-10">

            {{-- Category + Title + Meta --}}
            <section class="flex flex-col gap-4">
                <div class="flex flex-wrap gap-2">
                    @foreach($book->categories as $category)
                        <span class="text-secondary font-label font-semibold tracking-[0.15em] uppercase text-xs">{{ $category->name }}</span>
                    @endforeach
                </div>
                <h1 class="text-5xl lg:text-6xl font-extrabold tracking-tighter leading-none text-primary font-headline">{{ $book->title }}</h1>
                <div class="flex items-center gap-6 mt-2 flex-wrap">
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-semibold">Author</span>
                        <span class="text-lg font-medium font-body">{{ $book->author->name }}</span>
                    </div>
                    <div class="h-8 w-px bg-outline-variant/30"></div>
                    <div class="flex flex-col">
                        <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-semibold">Year</span>
                        <span class="text-lg font-medium font-body">{{ $book->published_year }}</span>
                    </div>
                </div>
            </section>

            {{-- Description --}}
            <section class="max-w-xl">
                <p class="text-on-surface-variant text-lg leading-relaxed font-body">
                    {{ $book->description ?? 'No description available for this book yet.' }}
                </p>
            </section>

            {{-- Price & Actions --}}
            <section class="bg-surface-container-low p-8 flex flex-col md:flex-row md:items-center justify-between gap-8">
                <div>
                    <span class="text-[10px] uppercase tracking-widest text-on-surface-variant font-semibold block mb-1">Price</span>
                    <span class="text-4xl font-black text-secondary tracking-tighter font-headline">RM {{ number_format($book->price, 2) }}</span>
                </div>
                <div class="flex flex-col gap-3 min-w-[240px]">
                    <button
                        wire:click="addToCart"
                        class="bg-secondary-container hover:bg-secondary text-primary hover:text-white font-bold py-4 px-6 transition-all duration-300 flex justify-center items-center gap-2 group font-label">
                        <span class="material-symbols-outlined group-hover:scale-110 transition-transform">shopping_cart</span>
                        Add to Cart
                    </button>
                    <button
                        wire:click="buyNow"
                        class="bg-primary text-white font-bold py-4 px-6 hover:opacity-90 transition-all duration-300 flex justify-center items-center font-label">
                        Buy Now
                    </button>
                    @auth
                        <button
                            wire:click="borrowBook"
                            class="border border-outline-variant hover:border-primary text-primary font-semibold py-3 px-6 transition-all duration-300 flex justify-center items-center font-label">
                            Borrow this Book
                        </button>
                    @endauth
                </div>
            </section>

            <a href="/" class="text-on-surface-variant hover:text-secondary font-label uppercase tracking-widest text-xs font-bold transition-colors flex items-center gap-2 self-start">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Back to Catalog
            </a>
        </div>
    </div>
</div>
