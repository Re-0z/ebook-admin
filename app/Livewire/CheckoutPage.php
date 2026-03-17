<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class CheckoutPage extends Component
{
    public string $name ='';
    public string $email='';
    public string $address ='';

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }
    public function render()
    {
        $cartIds = session()->get('cart', []);
        $quantities = array_count_values($cartIds);
        $books = Book::whereIn('id', array_keys($quantities))->get();
        $total = $books->sum(fn($book) => $book->price + $quantities[$book->id]);

        return view('livewire.checkout-page', compact('books', 'quantities', 'total'));
    }
}
