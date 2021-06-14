<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class CartComponent extends Component
{
    public function render()
    {
        $categories=Category::all();
        $products=Product::paginate(12);
        return view('livewire.cart-component', ['products'=>$products], ['categories'=>$categories]);
    }
}
