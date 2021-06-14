<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;

use App\Http\Livewire\checkoutComponent;
use App\Models\Product;


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

Route::get('/products/list', [ProductController::class, 'list'])->name('products.list');
Route::resource('products', ProductController::class);
Route::get('/categories/list', [CategoryController::class, 'list'])->name('categories.list');
Route::resource('categories', CategoryController::class);
Route::get('/brands/list', [BrandController::class, 'list'])->name('brands.list');
Route::resource('brands', BrandController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', HomeComponent::class );
Route::get('/cart', CartComponent::class )->name('product.cart');
Route::get('/checkout', CheckoutComponent::class );
Route::get('/shop', ShopComponent::class );
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
// Route::get('/blog/{id}', function ($id) { return view('pages/show-post', compact('id') ); })


require __DIR__.'/auth.php';
