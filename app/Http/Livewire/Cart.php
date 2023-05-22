<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    protected $listeners = ['cartUpdated' => '$refresh'];

    public function render()
    {
        $products = [];

        $arrayOfProductsInCartFromSession = session('cart');

        if (!empty($arrayOfProductsInCartFromSession)) {
            $products = Product::whereIn('id', $arrayOfProductsInCartFromSession)->get();
        }

        $this->products = $products;

        return view('livewire.cart');
    }
}
