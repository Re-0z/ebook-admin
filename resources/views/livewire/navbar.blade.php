<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-sm shadow-slate-200/50">
    <div class="flex justify-between items-center w-full px-6 py-4 max-w-7xl mx-auto">
        <a href="/" class="text-2xl font-black text-amber-500 tracking-tighter font-headline">E-BookStore</a>

        <div class="hidden md:flex items-center gap-8 font-headline font-bold tracking-tight">
            <a href="/" class="text-slate-600 hover:text-slate-900 transition-colors">Browse</a>
        </div>

        <div class="flex items-center gap-3">
            {{-- Cart --}}
            <a href="/cart" class="relative p-2 text-slate-600 hover:bg-slate-50 transition-all duration-200 active:scale-90">
                <span class="material-symbols-outlined">shopping_cart</span>
                @if($cartCount > 0)
                    <span class="absolute -top-1 -right-1 w-5 h-5 bg-secondary text-white text-[9px] font-black flex items-center justify-center rounded-full">
                        {{ $cartCount }}
                    </span>
                @endif
            </a>

            {{-- Auth --}}
            @auth
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 text-slate-700 hover:text-slate-900 font-headline font-bold text-sm transition p-2">
                        <span class="material-symbols-outlined text-[20px]">person</span>
                        <span class="hidden md:inline">{{ auth()->user()->name }}</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" x-cloak
                         class="absolute right-0 mt-2 w-48 bg-white shadow-xl border border-outline-variant/10 py-2 z-50">
                        <a href="/" class="block px-4 py-2 text-sm text-on-surface hover:bg-surface-container-low font-body transition">Store</a>
                        <a href="/profile" class="block px-4 py-2 text-sm text-on-surface hover:bg-surface-container-low font-body transition">Profile</a>
                        <a href="/my-borrows" class="block px-4 py-2 text-sm text-on-surface hover:bg-surface-container-low font-body transition">My Borrows</a>
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-error hover:bg-surface-container-low font-body transition">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" class="text-slate-600 hover:text-slate-900 font-headline font-bold text-sm transition px-3 py-2">Login</a>
                <a href="/register" class="bg-primary text-white font-headline font-bold text-sm px-4 py-2.5 hover:opacity-90 transition">Register</a>
            @endauth
        </div>
    </div>
    <div class="bg-slate-100/50 h-[1px] w-full"></div>
</nav>
