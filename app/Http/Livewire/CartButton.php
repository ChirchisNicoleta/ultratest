<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartButton extends Component
{

    public $productId;

    public function addToCart($productId)
    {
        $this->productId = $productId;

        session()->push('cart', $productId);

    }

    public function render()
    {
        return view('livewire.cart-button');
    }
}
