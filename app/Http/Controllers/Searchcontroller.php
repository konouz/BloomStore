<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Searchcontroller extends Controller
{

    public function index(Request $request)
    {

   if ($request->search)
   {
        $q = $request->search;

        $products = Product::where('name', 'like', '%' . $q . '%')->get();

        if ($products->count()) {

            return view('livewire.shop-component', [
                'products' =>  $products
            ]);
        } else {

            return view('livewire.shop-component', ['products' => []])->with([
                'status' => 'search failed ,, please try again'
            ]);
        }
    } else {
        $products = Product::OrderBy('created_at', 'desc')->get();
    }


    $products = Product::where(function ($query) use ($request) {
        return $request->regular_price ?
            $query->where('regular_price', $request->regular_price) : '';
    })->get();

    $selected = $request->regular_price;


    return  view('livewire.shop-component', ['products' => $products , 'selected' => $selected ]);



    }
}



