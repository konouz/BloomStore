<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // public function index(){
    //     return view('admin.brand.list');
    // }

    public function show()

    {


    }

    public function list()
    {
        $brand = Brand::all();

        return view('admin.brand.list', ['brand' => $brand]);
    }
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
        ]);
        $brand = Brand::create($request->all());
        return redirect()->route('brands.list');
    }
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',['brand'=>$brand]);
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
        ]);
        $brand->update($request->all());
        return redirect()->route('brands.list');
    }
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.list');
    }
}
