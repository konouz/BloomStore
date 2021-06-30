<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartListCountComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];

    public function render()
    {
        return view('livewire.cart-list-count-component');
    }
}
