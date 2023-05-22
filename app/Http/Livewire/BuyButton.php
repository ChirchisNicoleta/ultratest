<?php

namespace App\Http\Livewire;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class BuyButton extends Component
{
    public function createOrder()
    {
        if (Auth::check()) {
            $productsId = array_unique(session('cart'));
            $products = Product::whereIn('id', $productsId)->get();
            $amount = 0;

            foreach ($products as $product) {
                $amount += $product['price'];
            }

            $orderId = \App\Models\Order::create([
                'user_id' => Auth::id(),
                'amount' => $amount,
                'payment_method' => 1,
                'delivery' => 1
            ]);

            $id = $orderId->id;

            foreach ($productsId as $item) {
                OrderItem::create(['order_id' => $id, 'product_id' => $item, 'quantity' => 1]);
            }
            session()->forget('cart');

            Session::flash('success', 'Va multumim pentru cumparaturi!');

            return redirect('/');

        } else {
            redirect('/login');
        }
    }

    public function render()
    {
        return view('livewire.buy-button');
    }
}
