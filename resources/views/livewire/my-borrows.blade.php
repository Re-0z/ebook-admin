<div class="min-h-screen bg-gray-50 py-10 px-4">
    <div class="max-w-4xl mx-auto">

        <h1 class="text-3xl font-bold text-gray-800 mb-8">My Borrowed Books</h1>

        @if(session()->has('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 p-4 mb-6 rounded-md">
                <p class="font-bold">✅ {{ session('success') }}</p>
            </div>
        @endif

        @if($borrows->isEmpty())
            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">You haven't borrowed any books yet.</p>
                <a href="/" class="mt-4 inline-block text-indigo-600 hover:underline">Browse books</a>
            </div>
        @else
            <div class="flex flex-col gap-4">
                @foreach($borrows as $borrow)
                    <div class="bg-white rounded-xl shadow p-6 flex items-center gap-6">

                        {{-- Book Cover --}}
                        @if($borrow->book->cover_image)
                            <img src="{{ asset('storage/' . $borrow->book->cover_image) }}"
                                class="w-16 h-20 object-cover rounded-lg flex"
                                alt="{{ $borrow->book->title }}">
                        @else
                            <div class="w-16 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-400 text-xs">No Image</span>
                            </div>
                        @endif

                        {{-- Borrow Info --}}
                        <div class="flex-1">
                            <h2 class="text-lg font-bold text-gray-800">{{ $borrow->book->title }}</h2>
                            <p class="text-sm text-gray-500 mt-1">Borrowed: {{ $borrow->borrowed_at->format('d M Y') }}</p>
                            <p class="text-sm mt-1 {{ $borrow->status === 'returned' ? 'text-gray-400' : 'text-red-500 font-semibold' }}">
                                Due: {{ $borrow->due_date->format('d M Y') }}
                            </p>
                        </div>

                        {{-- Status & Action --}}
                        <div class="text-right">
                            @if($borrow->status === 'borrowed')
                                <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1 rounded-full mb-2">
                                    Borrowed
                                </span>
                                <br>
                                <button wire:click="returnBook({{ $borrow->id }})"
                                        class="mt-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">
                                    Return Book
                                </button>
                            @else
                                <span class="inline-block bg-gray-100 text-gray-500 text-xs font-bold px-3 py-1 rounded-full">
                                    Returned
                                </span>
                                <p class="text-xs text-gray-400 mt-1">{{ $borrow->returned_at->format('d M Y') }}</p>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>