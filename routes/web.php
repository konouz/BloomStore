<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\checkoutComponent;
use App\Models\Product;
// use Database\Seeders\VoyagerDatabaseSeeder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $product=Product::all();
//     return view('welcome',['products'=>$product]);
// });
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', HomeComponent::class );


Route::get('/cart', CartComponent::class );

Route::get('/checkout', CheckoutComponent::class );

