<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class ProductController extends Controller
{
    public function buyNow(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $sessionUser = session('loggedUser');
        if (!$sessionUser) {
            return redirect()->route('login')->with('error', 'Please login to continue.');
        }

        $product = Product::findOrFail($id);

        // Check stock
        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        // Deduct stock (optional)
        $product->stock -= $request->quantity;
        $product->save();

        // Create order
        Order::create([
            'user_id'    => $sessionUser['id'],
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'total_price'=> $product->price * $request->quantity,
            'status'     => 'pending',
        ]);

        return redirect()->route('orders')->with('success', 'Order placed successfully for ' . $product->name . '!');
    }
}
