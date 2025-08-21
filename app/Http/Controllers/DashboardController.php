<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Register;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $sessionUser = session('loggedUser');
        if (!$sessionUser || !isset($sessionUser['id'])) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        // Recent Orders (latest 5 with product info)
        $recentOrders = Order::with('product')
            ->latest()
            ->take(5)
            ->get();

        $productCount = Product::count();
        $userCount = Register::count();
        $userOrder = Order::count();

        return view('admin.adminmain', compact('productCount', 'userCount', 'userOrder','recentOrders'));
    }
}
