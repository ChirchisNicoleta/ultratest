<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BasketButton extends Component
{
    public $basketCount;
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function render()
    {
        $this->basketCount = count(session('cart', []));

        return view('livewire.basket-button');
    }
}
