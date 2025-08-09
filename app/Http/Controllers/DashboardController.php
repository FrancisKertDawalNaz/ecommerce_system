<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Register;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $userCount = Register::count();

        return view('admin.adminmain', compact('productCount', 'userCount'));
    }
}
