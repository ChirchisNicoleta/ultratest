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

        if (!in_array($productId, session('cart', []))) {
            session()->push('cart', $productId);
            $this->emit('cartUpdated');
        }
    }

    public function render()
    {
        return view('livewire.cart-button');
    }
}
