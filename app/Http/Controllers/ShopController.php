<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
        return view('admin.product', compact('products')); // ✅ correct here
    }
}
