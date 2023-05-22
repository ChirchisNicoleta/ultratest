<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $products;


    public function render()
    {
        $products = [];

        $arrayOfProductsOnCartFromSession = session('cart');
        if (!empty($arrayOfProductsOnCartFromSession)) {
            $products = Product::whereIn('id', $arrayOfProductsOnCartFromSession)->get();
        }
        $this->products = $products;
        return view('livewire.cart');
    }
}
