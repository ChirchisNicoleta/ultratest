<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteButton extends Component
{
    public $productId;

    public function deleteFromCart($productId)
    {
        $products = session('cart', []);
        $newProdArr = array_diff($products, [$productId]);
        session()->put('cart', $newProdArr);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.delete-button');
    }
}
