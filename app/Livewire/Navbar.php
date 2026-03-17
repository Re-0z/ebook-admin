<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{
    #[On('cart-updated')]
    public function updateCart()
    {

    }
    public function render()
    {
        $cartCount = count(session('cart', []));

        return view('livewire.navbar', [
            'cartCount' => $cartCount
        ]);
    }
}
