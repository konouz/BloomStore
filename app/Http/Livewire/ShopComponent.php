<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\withPagination;
use Illuminate\Http\Request;

class ShopComponent extends Component
{
    public $added = false;
    // public function store (Request $request)
    // {
    //     Cart::add($request->product_id,$request->product_name,$request->product_price)->associate('app\Models\Product');
    //     return redirect()->route('product.cart');
    // }

    public function store ($product_id,$product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name, 1, $product_price)->associate('app\Models\Product');
        $this->added = true;
        session()->flash('success massage','Item added in Cart');
    }
    public function addToWishlist($product_id,$product_name, $product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('app\Models\Product');

    }

    use withPagination;
    public function render()
    {
        $categories=Category::all();
        $products=Product::paginate(12);
        return view('livewire.shop-component', ['products'=>$products], ['categories'=>$categories])->layout('layouts.base');
    }
}
