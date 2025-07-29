<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); // You can also use paginate(6) if needed
        return view('user.shop', compact('products'));
    }
}
