<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ShopController extends Controller
{
    public function showProducts()
    {
        $products = Product::all(); // Fetch all products
        return view('admin.product', compact('products')); // Pass to Blade
    }
}
