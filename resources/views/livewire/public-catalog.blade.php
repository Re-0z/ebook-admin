<div class="min-h-screen">
    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-6 pt-40 pb-12 text-center">
        <h1 class="font-headline text-6xl md:text-8xl font-extrabold tracking-tighter text-primary mb-8 leading-none">
            The Digital Atelier
        </h1>
        <div class="max-w-3xl mx-auto mb-10">
            <div class="relative group">
                <input
                    wire:model.live="search"
                    type="text"
                    class="w-full bg-surface-container-lowest border-b-2 border-outline-variant/20 focus:border-secondary transition-all px-4 py-5 text-lg outline-none font-body"
                    placeholder="Search by title, author, or ISBN..."
                />
                <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">search</span>
            </div>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            <button
                wire:click="$set('activeCategories', [])"
                class="px-5 py-2 text-sm font-label uppercase tracking-widest transition-all {{ empty($activeCategories) ? 'bg-primary text-white' : 'bg-surface-container-low text-on-surface hover:bg-surface-container-high' }}">
                All Books
            </button>
            @foreach($categories as $category)
                <button
                    wire:click="toggleCategory({{ $category->id }})"
                    class="px-5 py-2 text-sm font-label uppercase tracking-widest transition-all {{ in_array($category->id, $activeCategories) ? 'bg-primary text-white' : 'bg-surface-container-low text-on-surface hover:bg-surface-container-high' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </section>

    {{-- Book Grid --}}
    <section class="max-w-7xl mx-auto px-6 py-12">
        <div class="flex justify-between items-end mb-12">
            <div class="space-y-1">
                <p class="text-xs font-label uppercase tracking-[0.2em] text-secondary font-bold">Curated Catalog</p>
                <h2 class="font-headline text-3xl font-bold tracking-tight">Essence of Literature</h2>
            </div>
        </div>

        @if($books->isEmpty())
            <div class="text-center py-24">
                <p class="text-on-surface-variant text-lg font-body">No books found matching your search.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                @foreach($books as $book)
                    <a href="/books/{{ $book->id }}" class="group cursor-pointer">
                        <div class="relative aspect-[3/4] mb-6 overflow-hidden bg-surface-container-high">
                            @if($book->cover_image)
                                <img
                                    src="{{ asset('storage/' . $book->cover_image) }}"
                                    alt="{{ $book->title }}"
                                    class="w-full h-full object-cover grayscale-[0.2] group-hover:scale-105 transition-transform duration-500"
                                />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-surface-container-high to-surface-container-highest flex items-center justify-center p-6">
                                    <span class="font-headline font-bold text-on-surface-variant text-center text-sm leading-snug">{{ $book->title }}</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center p-6">
                                <span class="w-full py-4 bg-secondary text-white font-label uppercase tracking-widest text-xs font-bold text-center transition-transform translate-y-4 group-hover:translate-y-0 block">
                                    View Details
                                </span>
                            </div>
                        </div>
                        <h3 class="font-headline font-bold text-lg mb-1 tracking-tight leading-snug">{{ $book->title }}</h3>
                        <p class="text-outline text-sm font-body">{{ $book->author->name }}</p>
                        <p class="mt-2 font-headline font-bold text-secondary">RM {{ number_format($book->price, 2) }}</p>
                    </a>
                @endforeach
            </div>
        @endif

        <div class="mt-16">
            {{ $books->links() }}
        </div>
    </section>

    {{-- Join the Collective --}}
    <section class="border-t border-outline-variant/10 py-24 mt-24">
        <div class="max-w-3xl mx-auto px-6 text-center">
            <h2 class="font-headline text-3xl font-bold mb-4">Join the Collective</h2>
            <p class="font-body text-outline mb-10">Discover high-concept literature and exclusive features every week.</p>
            <div class="flex flex-col md:flex-row gap-0 max-w-lg mx-auto border-b border-primary/20">
                <input class="flex-1 py-4 px-2 bg-transparent border-none outline-none focus:ring-0 font-body" placeholder="Email address" type="email"/>
                <button class="py-4 px-8 font-label font-bold uppercase tracking-widest text-xs hover:text-secondary transition-colors">Subscribe</button>
            </div>
        </div>
    </section>
</div>
