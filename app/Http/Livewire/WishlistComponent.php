<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public $added = false;

    public function store ($product_id,$product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name, 1, $product_price)->associate('app\Models\Product');
        $this->added = true;
        session()->flash('success massage','Item added in Cart');
    }
    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if($witem->id===$product_id){
               Cart::instance('wishlist')->remove($witem->rowId);
               $this->emitTo('wish-list-count-component','refreshComponent');
               return;
            }
        }
    }
    public function render()
    {
        $products=Product::paginate(12);
        return view('livewire.wishlist-component', ['products'=>$products])->layout('layouts.base');
    }
}
