<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\ShopController;

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

Route::get('/admin/login', [AuthController::class, 'Mainadmin'])->name('admin.login');

//admin routes with role middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'admindashboard'])->name('admindashboard');
    Route::get('/admin/product', [AuthController::class, 'product'])->name('product');
    Route::post('/admin/product', [AuthController::class, 'storeProduct'])->name('admin.product.store');
    Route::get('/admin/product', [ShopController::class, 'showProducts'])->name('product');
    Route::get('/admin/categories', [AuthController::class, 'categories'])->name('categories');
    Route::get('/admin/order', [AuthController::class, 'order'])->name('order');
    Route::get('/admin/customer', [AuthController::class, 'customer'])->name('customer');
    Route::get('/admin/review', [AuthController::class, 'review'])->name('review');
    Route::get('/admin/settings', [AuthController::class, 'settings'])->name('settings');

    Route::get('/products/{id}/edit', [ShopController::class, 'edit'])->name('admin.product.edit');
    Route::put('/products/{id}', [ShopController::class, 'update'])->name('admin.product.update');
    Route::delete('/products/{id}', [ShopController::class, 'destroy'])->name('admin.product.destroy');


    Route::post('/adminlogout', [AuthController::class, 'logout'])->name('adminlogout');
});


Route::post('/wishlist/{product}', [AuthController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/add/{id}', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/user/wishlist', [ShopController::class, 'showWishlist'])->name('wishlist');



