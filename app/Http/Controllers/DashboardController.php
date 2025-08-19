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
        $productCount = Product::count();
        $userCount = Register::count();
        $userOrder = Order::count();

        return view('admin.adminmain', compact('productCount', 'userCount', 'userOrder'));
    }
}
