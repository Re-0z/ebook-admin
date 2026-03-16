<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class BookDetails extends Component
{
    public Book $book;

    public function addToCart()
    {
        session()->push('cart', $this->book->id);
        $this->dispatch('cart-updated');

        session()->flash('success', 'Book added to your cart!');
    }

    public function buyNow()
    {
        session()->flash('success','Redirecting to secure checkout for'.$this->book->title.'...');
    }
    public function render()
    {
        return view('livewire.book-details');
    }
}
