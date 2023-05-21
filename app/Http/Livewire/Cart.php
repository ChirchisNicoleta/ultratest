<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    public function deleteFromCart($productId)
    {
        $products = session('cart');
        $arrayProductId[] = $productId;
        $newProdArr = array_diff($products, $arrayProductId);
        session()->put('cart', $newProdArr);
    }

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
