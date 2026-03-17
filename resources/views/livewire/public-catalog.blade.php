<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-5 text-gray-800">E-Book List</h1>
    <div class="mb-6">
        <input 
            type="text" 
            wire:model.live="search" 
            placeholder="Search for a book by title..." 
            class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>
    <div class="mb-8 flex flex-wrap gap-2">
        <button
            wire:click="$set('activeCategories', [])"
            class="px-5 py-2 rounded-full text-sm font-bold transition-all shadow-sm
            {{ empty($activeCategories) ? 'bg-indigo-600 text-white scale-105' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:border-indigo-300' }}">
            All books
        </button>

        @foreach($categories as $category)
            <button
                wire:click="toggleCategory({{ $category->id }})"
                class="px-5 py-2 rounded-full text-sm font-bold transition-all shadow-sm
                {{ in_array($category->id, $activeCategories) ? 'bg-indigo-600 text-whtie scale-105' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:border-indigo-300' }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        
        @foreach($books as $book)
            <a href="/books/{{ $book->id }}" class="bg-gray-50 rounded-lg shadow-md p-4 border-gray-200 flex flex-row hover:shadow-xl transition-shadow cursor-pointer">
                <div class="flex flex-col flex-1 pr-4">
                    <h2 class="text-xl font-bold text-gray-900">{{ $book->title }}</h2>
                    <p class="text-sm text-indigo-600 font-semibold mb-3">By {{ $book->author->name }}</p>

                    <p class="text-gray-600">Price: RM{{ number_format($book->price, 2) }}</p>
                    <p class="text-gray-500 text-sm mt-1 mb-4">Published: {{ $book->published_year }}</p>

                    <div class="mt-auto flex flex-wrap gap-2">
                        @foreach($book->categories as $category)
                            <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full border border-gray-200">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="p-1 w-28 flex shrink-0 items-center justify-center bg-gray-50 rounded-md overflow-hidden">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}"
                        alt="{{ $book->title }} Cover"
                        class="w-full h-full object-cover transition-transform hover:scale-105">
                    @else
                        <div class="p-4 flex items-center justify-center">
                            <span class="text-gray-400 font-bold text-xs text-center">No Cover Image</span>
                        </div>
                    @endif
                </div>
            </a>
        @endforeach

    </div>
    <div class="mt-8">
        {{ $books->links() }}
    </div>
</div>