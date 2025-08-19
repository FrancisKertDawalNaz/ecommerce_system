<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return view('loading');
});
// user
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'processRegister'])->name('register.process');
Route::get('/user/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/user/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/user/orders', [AuthController::class, 'orders'])->name('orders');
Route::get('/user/wishlist', [AuthController::class, 'wishlist'])->name('wishlist');
Route::get('/user/setting', [AuthController::class, 'setting'])->name('setting');
Route::get('/user/products', [ProductApiController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//admin
Route::get('/Mainadmin',[AdminController::class,'Mainadmin'])->name('Mainadmin');
Route::post('/Mainadmin', [AdminController::class, 'adminRegister'])->name('adminlogin.process');
Route::post('/adminlogout', [AdminController::class, 'adminlogout'])->name('adminlogout');
Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');

Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
Route::post('/admin/product', [AuthController::class, 'storeProduct'])->name('admin.product.store');
Route::get('/admin/product', [ShopController::class, 'showProducts'])->name('product');

Route::get('/admin/categories', [AuthController::class, 'categories'])->name('categories');
Route::get('/admin/order', [AdminController::class, 'order'])->name('order');
Route::get('/admin/customer', [AdminController::class, 'customer'])->name('customer');
Route::get('/admin/review', [AdminController::class, 'review'])->name('review');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('settings');

Route::get('/products/{id}/edit', [ShopController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products/{id}', [ShopController::class, 'update'])->name('admin.product.update');
    Route::delete('/products/{id}', [ShopController::class, 'destroy'])->name('admin.product.destroy');

Route::post('/wishlist/{product}', [AuthController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/add/{id}', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/user/wishlist', [ShopController::class, 'showWishlist'])->name('wishlist');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admindashboard');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::get('/live-search', [App\Http\Controllers\ProductController::class, 'liveSearch'])->name('products.liveSearch');

Route::post('/admin/customers/{id}/ban', [CustomerController::class, 'ban'])->name('customers.ban');
Route::post('/admin/customers/{id}/unban', [CustomerController::class, 'unban'])->name('customers.unban');

Route::post('/update-address', [CustomerController::class, 'updateAddress'])->name('update.address');

Route::delete('/account/delete', [CustomerController::class, 'deleteAccount'])->name('account.delete');

Route::put('/profile/update', [AuthController::class, 'update'])->name('profile.update');

Route::put('/profile/change-password', [AuthController::class, 'changePassword'])->name('profile.changePassword');
Route::post('/order/buy-now/{id}', [OrderController::class, 'buyNow'])->name('order.buyNow');
