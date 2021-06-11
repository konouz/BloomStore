<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\withPagination;

use Cart;

class ShopComponent extends Component
{

    public function store ($product_id,$product_name,$product_price)
    {

        Cart::add($product_id,$product_name,$product_price)->associate('app\Models\Product');
        session()->flash('success massage','Item added in Cart');
        return redirect()->route('product.cart');
    }

    use withPagination;
    public function render()
    {
        $products=Product::paginate(12);
        return view('livewire.shop-component', ['products'=>$products]);
    }
}
