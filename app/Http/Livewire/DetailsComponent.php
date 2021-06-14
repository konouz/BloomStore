<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Product;

use Cart;


class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        // dd($slug);
        $this->slug =$slug;
    }

    public function render()
    {
        $product= Product::where('slug',$this->slug)->first();
        return view('livewire.details-component',['product'=>$product]);
    }
    //     public function store ($product_id,$product_name,$product_price)
    // {

    //     Cart::add($product_id,$product_name,$product_price)->associate('app\Models\Product');
    //     session()->flash('success massage','Item added in Cart');
    //     return redirect()->route('product.cart');
    // }
}
