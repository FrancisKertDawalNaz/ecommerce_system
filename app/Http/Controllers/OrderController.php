<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product') // eager load product
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.orders.index', compact('orders'));
    }
}
