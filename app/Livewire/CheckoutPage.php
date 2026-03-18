<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Order;

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

    public function placeOrder()
    {
        $this->validate([
            'name'=> 'required|string',
            'email'=> 'required|email',
            'address'=> 'required|string',
        ]);

        $cartIds = session()->get('cart', []);
        $quantities = array_count_values($cartIds);
        $books = Book::whereIn('id', array_keys($quantities))->get();
        $total = $books->sum(fn($book) => $book->price * $quantities[$book->id]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'name'=> $this->name,
            'email'=> $this->email,
            'address'=> $this->address,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($books as $book)
            {
                $order->items()->create([
                    'book_id' => $book->id,
                    'quantity'=> $quantities[$book->id],
                    'price'=> $book->price,
                ]);
            }
        session()->forget('cart');
        $this->dispatch('cart-updated');

        session()->flash('success','Order placed successfully');
        return redirect('/');
    }

    public function render()
    {
        $cartIds = session()->get('cart', []);
        $quantities = array_count_values($cartIds);
        $books = Book::whereIn('id', array_keys($quantities))->get();
        $total = $books->sum(fn($book) => $book->price * $quantities[$book->id]);

        return view('livewire.checkout-page', compact('books', 'quantities', 'total'));
    }
}
