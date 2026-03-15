<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;

class PublicCatalog extends Component
{
    public $search = '';
    public function render()
    {
        $filteredBooks = Book::where('title','like','%'.$this->search.'%')->get();
        return view('livewire.public-catalog', [
            'books'=> Book::all(),
            'authors'=> Author::all(),
            'categories'=> Category::all(),
        ]);
    }
}