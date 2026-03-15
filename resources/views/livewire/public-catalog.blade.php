<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">E-Book Catalog</h1>
    <div class="mb-8">
        <input 
            type="text" 
            wire:model.live="search" 
            placeholder="Search for a book by title..." 
            class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        >
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
        @foreach($books as $book)
            <div class="bg-white rounded-lg shadow-md p-4 border border-gray-200 flex flex-col">
                
                <h2 class="text-xl font-bold text-gray-900">{{ $book->title }}</h2>
                <p class="text-sm text-indigo-600 font-semibold mb-3">By {{ $book->author->name }}</p>

                <p class="text-gray-600">Price: ${{ number_format($book->price, 2) }}</p>
                <p class="text-gray-500 text-sm mt-1 mb-4">Published: {{ $book->published_year }}</p>

                <div class="mt-auto flex flex-wrap gap-2">
                    @foreach($book->categories as $category)
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full border border-gray-200">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>

            </div>
        @endforeach

    </div>
</div>