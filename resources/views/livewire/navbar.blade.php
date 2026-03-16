<nav class="bg-white shadow-sm border-b border-gray-200 px-8 py-4 flex justify-between items-center sticky top-0 z-50">
    <a href="/" class="text-2xl font-black text-indigo-600 tracking-tight hover:text-indigo-800 transition">
    E-Book<span class="text-gray-900">Store</span>
    </a>

    <div class="relative flex items-center text-gray-700 hover:text-indigo-600 cursor-pointer transition font-bold text-lg">
        🛒 Cart

        @if($cartCount > 0)
            <span class="absolute -top-3 -right-4 bg-red-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full shadow-md animate-bounce">
                {{ $cartCount }}
            </span>
        @endif
    </div>
</nav>