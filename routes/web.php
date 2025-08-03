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
//admin
Route::get('/Mainadmin',[AuthController::class,'Mainadmin'])->name('Mainadmin');
Route::post('/Mainadmin', [AuthController::class, 'adminRegister'])->name('adminlogin.process');
Route::post('/adminlogout', [AuthController::class, 'adminlogout'])->name('adminlogout');
Route::get('/admin/dashboard', [AuthController::class, 'admindashboard'])->name('admindashboard');
Route::get('/admin/product', [AuthController::class, 'product'])->name('product');
Route::get('/admin/categories', [AuthController::class, 'categories'])->name('categories');
Route::get('/admin/order', [AuthController::class, 'order'])->name('order');
Route::get('/admin/customer', [AuthController::class, 'customer'])->name('customer');
Route::get('/admin/review', [AuthController::class, 'review'])->name('review');
Route::get('/admin/settings', [AuthController::class, 'settings'])->name('settings');