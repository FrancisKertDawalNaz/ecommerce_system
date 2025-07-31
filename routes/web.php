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
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/shop',[AuthController::class, 'shop'])->name('shop');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/orders', [AuthController::class, 'orders'])->name('orders');
Route::get('/wishlist', [AuthController::class, 'wishlist'])->name('wishlist');
Route::get('/setting', [AuthController::class, 'setting'])->name('setting');
Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//admin
Route::get('/Mainadmin',[AuthController::class,'Mainadmin'])->name('Mainadmin');
Route::post('/Mainadmin', [AuthController::class, 'adminRegister'])->name('adminlogin.process');
Route::post('/adminlogout', [AuthController::class, 'adminlogout'])->name('adminlogout');
Route::get('/admin/dashboard', [AuthController::class, 'admindashboard'])->name('admindashboard');
