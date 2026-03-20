<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Borrow;

class MyBorrows extends Component
{
    public function returnBook($borrowId)
    {
        $borrow = Borrow::where('id', $borrowId)
        ->where('user_id', auth()->id())->first();

        if ($borrow)
            {
                $borrow->update([
                    'returned_at' => now(),
                    'status' => 'returned',
                ]);
                session()->flash('success', 'Book returned successfully');
            }
    }
    
    public function render()
    {
        $borrows = Borrow::where('user_id', auth()->id())
        ->with('book')
        ->latest()->get();
        return view('livewire.my-borrows', compact('borrows'));
    }
}
