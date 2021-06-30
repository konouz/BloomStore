<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty +1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    public function decreaseQuantity($rowId){
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty -1;
        Cart::instance('cart')->update($rowId,$qty);
    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','item has been removed');
    }
    public function destroyAll(){
        Cart::instance('cart')->destroy();
    }
    public function render()
    {
        $categories=Category::all();
        $products=Product::paginate(12);
        return view('livewire.cart-component', ['products'=>$products], ['categories'=>$categories])->layout('layouts.base');

    }
}
