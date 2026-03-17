<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class CartPage extends Component
{
    public function render()
    {
        $cartIds = session()->get('cart', []);
        $quantities = array_count_values($cartIds);
        $books = Book::whereIn('id', array_keys($quantities))->get();
        return view('livewire.cart-page', compact('books', 'quantities'));
    }

    public function removeFromCart($bookId)
    {
        $cart = session()->get('cart', []);
        $key = array_search($bookId, $cart);

        if ($key !==false)
            {
                unset($cart[$key]);
                session()->put('cart', array_values($cart));
            }
        $this->dispatch('cart-updated');
    }
}
