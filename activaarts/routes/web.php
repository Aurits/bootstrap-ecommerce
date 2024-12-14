<?php

use App\Livewire\About;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Product;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', Home::class)->name("home");
Route::get('/dashboard', Dashboard::class)->middleware(['auth', 'verified'])
    ->name('dashboard');;
Route::get('/about', About::class)->name("about");
Route::get('/cart', Cart::class)->name("cart");
Route::get('/Checkout', Checkout::class)->name("checkout");
Route::get('/products', Product::class)->name("products");
Route::get('/product-details', ProductDetails::class)->name("products-details");




Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');




Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';