<div class="max-w-5xl mx-auto p-6 mt-10">
    <a href="/" class="text-indigo-600 hover:text-indigo-800 font-semibold mb-6 inline-block">
        &larr; Back to Catalog
    </a>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
        <div class="md:w-1/3 bg-gray-50 flex items-center justify-center border-r border-gray-100">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}"
                alt="{{ $book->title }} Cover"
                class="p-12 w-full max-w-xs h-auto object-contain rounded-md transition-transform hover:scale-105">
            @else
                <div class="p-12 flex items-center justify-center">
                    <span class="text-gray-400 font-bold text-xl text-center">No Cover Image</span>
                </div>
            @endif
        </div>

        <div class="md:w-2/3 p-8 flex flex-col justify-center">
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($book->categories as $category)
                    <span class="px-3 py-1 bg-indigo-50 text-indigo-600 text-xs font-bold rounded-full uppercase tracking-wider">
                        {{ $category->name }}
                    </span>
                @endforeach
            </div>

            @if (session()->has('success'))
                <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 p-4 mb-6 rounded-md shadow-sm transition-all" role="alert">
                    <p class="font-bold flex items-center gap-2">
                        <span>✅</span> {{ session('success') }}
                    </p>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="bg-red-100 border-1-4 border-red-500 text-red-800 p-4 mb-6 rounded-md shadow-sm"
                role="alert">
                <p class="font-bold flex items-center gap-2">
                    <span>X</span> {{ session('error') }}
                </p>
                </div>
            @endif

            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $book->title }}</h1>
            <p class="text-xl text-gray-500 mb-6">Author: <span class="font-bold text-gray-800">{{ $book->author->name }}</span></p>
            <p class="text-gray-600 leading-relaxed mb-8 whitespace-pre-line">
                {{ $book->description ?? 'No description available for this book yet.' }}
            </p>
            <div class="flex items-center justify-between mt-auto pt-6 border-t border-gray-100">
                <span class="text-3xl font-black text-gray-900">RM {{ number_format($book->price, 2) }}</span>
                <div class="flex gap-3">
                    <button wire:click="addToCart" class="bg-white hover:bg-gray-50 text-indigo-600 border border-indigo-200 font-bold py-3 px-6 rounded-lg shadow-sm transform transition hover:-translate-y-1 flex items-center gap-2">
                        <span>🛒</span>Add to Cart
                    </button>
                    <button wire:click="buyNow" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transform transition hover:-translate-y-1">
                        Buy Now
                    </button>
                    @auth
                        <button wire:click="borrowBook" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg flex transform transition hover:-translate-y-1">Borrow</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
