<?php

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
use Stripe\Stripe;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::put('/session/{id}', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');
// Route::get('post', [HomeController::class, 'post'])->middleware(['auth','admin']);
Route::get('/order', [StripeController::class, 'order'])->name('order');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.add');
Route::put('/cart/{id}', [CartController::class, 'addtocart'])->name('cart.addtocart');
Route::delete('/cart/{carts}', [CartController::class, 'destroycart'])->name('cart.destroycart');
Route::delete('/Order/{order}', [StripeController::class, 'destroyorder'])->name('destroyorder');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/user', [ProfileController::class, 'user'])->name('admin.user');
    Route::delete('/user/{user}/destroy', [ProfileController::class, 'destroyuser'])->name('user.destroyuser');
    Route::get('/user/{user}/edit', [ProfileController::class, 'edituser'])->name('admin.edituser');
    Route::put('/user/{user}/update', [ProfileController::class, 'updateuser'])->name('user.updateuser');


    Route::get('/product', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
