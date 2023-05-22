<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products;

    public function render()
    {
        $this->products = Product::where('product_status', 'active')->get();
        return view('livewire.products');
    }
}
