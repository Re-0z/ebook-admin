<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Borrow;
use Carbon\Carbon;

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

    public function borrowBook()
    {
        if (!auth()->check())
            {
                return redirect('/login');
            }
        
        $alreadyBorrowed = Borrow::where('user_id', auth()->id())
            ->where('book_id', $this->book->id)
            ->where('status', 'borrowed')->exists();
        
        if ($alreadyBorrowed)
            {
                session()->flash('error', 'You have already borrowed this book.');
                return;
            }

        Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $this->book->id,
            'borrowed_at' => Carbon::now(),
            'due_date' => Carbon::now()->addDays(7),
            'status' => 'borrowed',
        ]);

        session()->flash('success', 'You aren now borrowing this book. Due date:: ' .
        Carbon::now()->addDays(7)->format('d M Y'));
    }

    public function render()
    {
        return view('livewire.book-details');
    }
}
