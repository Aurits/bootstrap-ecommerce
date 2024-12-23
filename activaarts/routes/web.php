<?php

use App\Livewire\About;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\Home;
use App\Livewire\Product;
use App\Livewire\ProductDetails;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\User\Dashboard\Home as UserHome;
use App\Livewire\User\Dashboard\Orders as UserOrders;
use App\Livewire\User\Dashboard\Wishlist as UserWishlist;
use App\Livewire\User\Dashboard\Settings as UserSettings;
use App\Livewire\User\Dashboard\Support as UserSupport;
use App\Livewire\User\Dashboard\OrderTracking as UserOrderTracking;
use App\Livewire\Admin\Dashboard\Home as AdminHome;
use App\Livewire\Admin\Dashboard\Orders as AdminOrders;
use App\Livewire\Admin\Dashboard\Products as AdminProducts;
use App\Livewire\Admin\Dashboard\Customers as AdminCustomers;
use App\Livewire\Admin\Dashboard\Reports as AdminReports;
use App\Livewire\Admin\Dashboard\Settings as AdminSettings;

// User Dashboard Routes
Route::prefix('user')->middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', UserHome::class)->name('dashboard');
    Route::get('/orders', UserOrders::class)->name('user.dashboard.orders');
    Route::get('/wishlist', UserWishlist::class)->name('user.dashboard.wishlist');
    Route::get('/settings', UserSettings::class)->name('user.dashboard.settings');
    Route::get('/support', UserSupport::class)->name('user.dashboard.support');
    Route::get('/order-tracking', UserOrderTracking::class)->name('user.dashboard.order-tracking');
});

// Admin Dashboard Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', AdminHome::class)->name('admin.dashboard.home');
    Route::get('/orders', AdminOrders::class)->name('admin.dashboard.orders');
    Route::get('/products', AdminProducts::class)->name('admin.dashboard.products');
    Route::get('/customers', AdminCustomers::class)->name('admin.dashboard.customers');
    Route::get('/reports', AdminReports::class)->name('admin.dashboard.reports');
    Route::get('/settings', AdminSettings::class)->name('admin.dashboard.settings');
});


Route::get('/', Home::class)->name("home");
Route::get('/about', About::class)->name("about");
Route::get('/cart', Cart::class)->name("cart");
Route::get('/Checkout', Checkout::class)->name("checkout")->middleware(['auth', 'verified']);
Route::get('/products', Product::class)->name("products");
Route::get('/product-details/{productId}', ProductDetails::class)->name('products.details');




Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';