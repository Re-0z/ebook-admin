<div class="pt-32 pb-32 px-6 max-w-5xl mx-auto min-h-screen">

    {{-- Editorial Header --}}
    <header class="mb-16 space-y-2">
        <div class="inline-block bg-secondary-container px-3 py-1 text-[10px] font-bold tracking-[0.1em] uppercase text-on-secondary-container mb-4 font-label">
            Active Ledger
        </div>
        <h1 class="text-5xl font-black font-headline text-primary tracking-tight leading-none">
            My Personal Library
        </h1>
        <p class="text-on-surface-variant max-w-xl text-lg font-light leading-relaxed pt-2 font-body">
            A curated collection of your current intellectual journeys and past discoveries.
        </p>
    </header>

    @if(session()->has('success'))
        <div class="flex items-center gap-4 bg-white shadow-lg px-6 py-4 border-l-4 border-secondary mb-8">
            <span class="font-bold text-sm tracking-tight font-body">{{ session('success') }}</span>
        </div>
    @endif

    @if($borrows->isEmpty())
        <div class="py-24 text-center space-y-8 flex flex-col items-center">
            <div class="w-24 h-24 bg-surface-container-low flex items-center justify-center mb-4 relative">
                <span class="material-symbols-outlined text-4xl text-amber-500/40" style="font-variation-settings: 'FILL' 1;">book_2</span>
                <div class="absolute inset-0 border border-amber-500/20 animate-pulse"></div>
            </div>
            <div class="space-y-2">
                <h2 class="text-3xl font-black font-headline tracking-tight">Your personal library is waiting.</h2>
                <p class="text-on-surface-variant max-w-sm mx-auto font-body">Discover your next obsession among our curated collection of titles.</p>
            </div>
            <a href="/" class="group flex items-center gap-3 bg-primary text-on-primary px-8 py-4 font-headline font-bold text-sm tracking-widest uppercase hover:bg-secondary transition-all">
                Explore the Catalog
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_right_alt</span>
            </a>
        </div>
    @else
        <section class="space-y-6">
            @foreach($borrows as $borrow)
                <div class="bg-surface-container-lowest border border-outline-variant/15 p-6 flex flex-col md:flex-row items-center gap-8 hover:bg-surface-container-low transition-colors duration-300 {{ $borrow->status === 'returned' ? 'opacity-75' : '' }}">

                    {{-- Book Cover --}}
                    <div class="w-32 h-44 bg-surface-container flex-shrink-0 shadow-sm overflow-hidden {{ $borrow->status === 'returned' ? 'grayscale' : '' }}">
                        @if($borrow->book->cover_image)
                            <img
                                src="{{ asset('storage/' . $borrow->book->cover_image) }}"
                                alt="{{ $borrow->book->title }}"
                                class="w-full h-full object-cover"
                            />
                        @else
                            <div class="w-full h-full bg-surface-container-high flex items-center justify-center p-2">
                                <span class="text-on-surface-variant text-xs text-center font-body">{{ $borrow->book->title }}</span>
                            </div>
                        @endif
                    </div>

                    {{-- Borrow Info --}}
                    <div class="flex-grow space-y-4 w-full">
                        <div class="flex justify-between items-start flex-wrap gap-4">
                            <div class="space-y-1">
                                <span class="text-[10px] font-semibold tracking-widest uppercase font-label {{ $borrow->status === 'borrowed' ? 'text-secondary' : 'text-outline' }}">
                                    {{ ucfirst($borrow->status) }}
                                </span>
                                <h3 class="text-2xl font-bold font-headline leading-tight tracking-tight {{ $borrow->status === 'returned' ? 'text-on-surface/70' : '' }}">
                                    {{ $borrow->book->title }}
                                </h3>
                                <p class="text-on-surface-variant text-sm font-medium font-body">{{ $borrow->book->author->name }}</p>
                            </div>
                            <div class="text-right">
                                @if($borrow->status === 'borrowed')
                                    <p class="text-[10px] font-bold tracking-widest text-outline uppercase font-label">Due Date</p>
                                    <p class="text-sm font-semibold text-primary font-body">{{ $borrow->due_date->format('M d, Y') }}</p>
                                @else
                                    <p class="text-[10px] font-bold tracking-widest text-outline uppercase font-label">Completed</p>
                                    <p class="text-sm font-semibold text-on-surface/50 font-body">{{ $borrow->returned_at->format('M d, Y') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="pt-4 flex items-center justify-between border-t border-outline-variant/20">
                            <span class="flex items-center gap-1 text-xs text-on-surface-variant font-label">
                                <span class="material-symbols-outlined text-[16px]">calendar_today</span>
                                Borrowed on {{ $borrow->borrowed_at->format('M d, Y') }}
                            </span>
                            @if($borrow->status === 'borrowed')
                                <button
                                    wire:click="returnBook({{ $borrow->id }})"
                                    class="bg-primary text-on-primary px-6 py-2.5 text-xs font-bold tracking-wider uppercase hover:bg-secondary transition-all active:scale-95 font-label">
                                    Return Book
                                </button>
                            @else
                                <span class="text-xs text-on-surface-variant font-label flex items-center gap-1">
                                    <span class="material-symbols-outlined text-[16px]">check_circle</span>
                                    Returned
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif
</div>
