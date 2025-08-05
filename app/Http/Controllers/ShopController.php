<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        return view ('user.shop', compact('products'));
    }

    public function showProducts()
    {
        $products = Product::all();
        return view('admin.adminproduct', compact('products')); // ✅ correct here
    }
}
