<nav class="bg-white shadow-sm border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">
    <a href="/" class="text-2xl font-black text-indigo-600 tracking-tight hover:text-indigo-800 transition">
        E-Book<span class="text-gray-900">Store</span>
    </a>

    <div class="flex items-center gap-6 overflow-visible">

        {{-- Cart --}}
        <a href="/cart" class="relative flex items-center text-gray-700 hover:text-indigo-600 cursor-pointer transition font-bold text-lg">
            🛒 Cart
            @if($cartCount > 0)
                <span class="absolute -top-3 -right-4 bg-red-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full shadow-md animate-bounce">
                    {{ $cartCount }}
                </span>
            @endif
        </a>

        {{-- Auth Links --}}
        @auth
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center gap-2 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    Hi, {{ auth()->user()->name }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div x-show="open" @click.outside="open = false"
                     class="absolute flex flex-col bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                    <a href="/" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition">
                        Store
                    </a>
                    <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition">
                        Profile
                    </a>

                    <a href="/my-borrows" class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600 transition">
                        My Borrows
                    </a>

                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-50 hover:text-red-700 transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="/login" class="text-gray-700 hover:text-indigo-600 font-semibold transition">Login</a>
            <a href="/register" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">Register</a>
        @endauth

    </div>
</nav>