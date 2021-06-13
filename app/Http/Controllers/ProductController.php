<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $product = Product::all();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('livewire.shop-component', ['products' => $product, 'categories'  => $categories]);



        //         if ($request->search) {
        //             $q = $request->search;

        //             $products = Product::where('name', 'like', '%' . $q . '%')->get();

        //             if ($products->count()) {

        //                 return view('livewire.shop-component', [
        //                     'products' =>  $products
        //                 ]);
        //             } else {

        //                 return view('livewire.shop-component', ['products' => []])->with([
        //                     'status' => 'search failed ,, please try again'
        //                 ]);
        //             }
        //         } else {
        //             $products = Product::OrderBy('created_at', 'desc')->get();
        //         }


        //         return view('livewire.shop-component', ['products' => $products]);


        // return view('livewire.shop-component', ['products' => $product]);

    }

    //$product = Product::all();

    // return view('livewire.shop-component', ['products' => $product]);

    public function list()
    {
        $product = Product::all();

        return view('admin.product.list', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|min:4|max:255',
            'price'             => 'required|integer',
            'product_image'     => 'required|url',
            'description'       => 'required|min:20|max:255'
        ]);

        $product = Product::create($request->all());

        return redirect()->route('products.index');
        // ->with('success', 'The Tag was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required'
        ]);
        $q = $request->q;

        $filteredUsers = Product::where('name', 'like', '%' . $q . '%')->get();
        dd($filteredUsers);

        if ($filteredUsers->count()) {

            return view('pro')->with([
                'products' =>  $filteredUsers
            ]);
        } else {

            return view('pro')->with([
                'status' => 'search failed ,, please try again'
            ]);
        }
    }
    public function show()

    {

        // return view('admin.product.list',['product' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', ['product' => $product]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */




    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'              => 'required|min:4|max:255',
            'price'             => 'required|integer',
            'product_image'     => 'required|url',
            'description'       => 'required|min:20|max:255',
            'category_id'       => 'required|numeric|exists:categories,id'

        ]);

        $product->update($request->all());
        $product->category_id = $request->category_id;


        return redirect()->route('products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.list');
    }
}
