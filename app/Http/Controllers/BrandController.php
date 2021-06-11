<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
        'name'=> 'required|min:4|max:255',
        ]);
        $brand = new Brand();
        $Brand->name = $request->name;
        $category->save();
         return redirect()->route('brands.index');
    }

}
