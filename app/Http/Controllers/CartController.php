<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Get cart from session or create new
        $cart = session()->get('cart', []);

        // If product already in cart, increase quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image_url,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }

    public function index()
    {
        return view('user.cart');
    }
}
