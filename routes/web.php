<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;

use App\Http\Livewire\checkoutComponent;
use App\Http\Livewire\WishlistComponent;
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
Route::resource('/admin/products', ProductController::class);
Route::get('/categories/admin/list', [CategoryController::class, 'list'])->name('categories.list');
Route::resource('/admin/categories', CategoryController::class);
Route::get('/admin/brands/list', [BrandController::class, 'list'])->name('brands.list');
Route::resource('/admin/brands', BrandController::class);

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', HomeComponent::class );
Route::get('/cart', CartComponent::class )->name('product.cart');
Route::get('/checkout', CheckoutComponent::class )->name('product.checkout');
Route::get('/shop', ShopComponent::class )->name('product.shop');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
// Route::get('/blog/{id}', function ($id) { return view('pages/show-post', compact('id') ); })
Route::get('/wishlist', WishlistComponent::class )->name('product.wishlist');


require __DIR__.'/auth.php';
