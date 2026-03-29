<div class="pt-24 pb-20 px-6 max-w-7xl mx-auto min-h-screen">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

        {{-- Left: Delivery Details --}}
        <div class="lg:col-span-7">
            <header class="mb-12">
                <span class="text-secondary font-label text-xs uppercase tracking-widest font-semibold mb-2 block">Checkout Journey</span>
                <h1 class="text-4xl font-extrabold tracking-tight text-primary font-headline">Delivery Details</h1>
                <p class="mt-4 text-on-surface-variant leading-relaxed max-w-md font-body">Provide your information below to finalize your order.</p>
            </header>

            <div class="space-y-10">
                <section>
                    <h2 class="text-sm font-bold uppercase tracking-wider mb-6 text-on-primary-fixed-variant font-label">Contact Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="flex flex-col">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2 font-label">Full Name</label>
                            <input
                                wire:model="name"
                                type="text"
                                placeholder="Your full name"
                                class="bg-transparent border-0 border-b border-outline-variant/30 py-2 px-0 focus:ring-0 focus:border-secondary transition-all placeholder:text-outline-variant/50 text-on-surface font-body"
                            />
                            @error('name') <span class="text-error text-xs mt-1 font-body">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex flex-col">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2 font-label">Email Address</label>
                            <input
                                wire:model="email"
                                type="email"
                                placeholder="your@email.com"
                                class="bg-transparent border-0 border-b border-outline-variant/30 py-2 px-0 focus:ring-0 focus:border-secondary transition-all placeholder:text-outline-variant/50 text-on-surface font-body"
                            />
                            @error('email') <span class="text-error text-xs mt-1 font-body">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </section>

                <section>
                    <h2 class="text-sm font-bold uppercase tracking-wider mb-6 text-on-primary-fixed-variant font-label">Shipping Address</h2>
                    <div class="flex flex-col">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-on-surface-variant mb-2 font-label">Delivery Address</label>
                        <textarea
                            wire:model="address"
                            rows="3"
                            placeholder="Your full delivery address"
                            class="bg-transparent border-0 border-b border-outline-variant/30 py-2 px-0 focus:ring-0 focus:border-secondary transition-all placeholder:text-outline-variant/50 text-on-surface resize-none font-body"
                        ></textarea>
                        @error('address') <span class="text-error text-xs mt-1 font-body">{{ $message }}</span> @enderror
                    </div>
                </section>
            </div>
        </div>

        {{-- Right: Order Summary --}}
        <div class="lg:col-span-5">
            <div class="sticky top-32">
                <div class="bg-surface-container-low p-8 lg:p-12">
                    <h2 class="text-xl font-bold tracking-tight mb-8 font-headline">Order Summary</h2>

                    <div class="space-y-6 mb-10">
                        @foreach($books as $book)
                            <div class="flex gap-4">
                                <div class="w-20 h-28 bg-white overflow-hidden shadow-sm flex-shrink-0">
                                    @if($book->cover_image)
                                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover"/>
                                    @else
                                        <div class="w-full h-full bg-surface-container-high flex items-center justify-center p-1">
                                            <span class="text-on-surface-variant text-xs text-center font-body">{{ $book->title }}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex flex-col justify-between py-1">
                                    <div>
                                        <h3 class="text-sm font-bold tracking-tight leading-tight font-headline">{{ $book->title }}</h3>
                                        <p class="text-xs text-on-surface-variant mt-1 font-body">×{{ $quantities[$book->id] }}</p>
                                    </div>
                                    <p class="text-sm font-semibold tracking-tight font-body">RM {{ number_format($book->price * $quantities[$book->id], 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-8 border-t border-outline-variant/20">
                        <div class="flex justify-between text-lg font-bold tracking-tight">
                            <span class="font-headline">Total</span>
                            <span class="text-secondary font-headline">RM {{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <button
                        wire:click="placeOrder"
                        class="w-full mt-12 bg-secondary text-white font-bold tracking-widest uppercase text-[10px] py-5 transition-all hover:bg-black active:scale-[0.98] font-label">
                        Complete Purchase
                    </button>

                    <div class="mt-6 flex items-center justify-center gap-2 text-[10px] text-on-surface-variant/60 font-medium uppercase tracking-widest font-label">
                        <span class="material-symbols-outlined text-[14px]">lock</span>
                        Encrypted Transaction
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
