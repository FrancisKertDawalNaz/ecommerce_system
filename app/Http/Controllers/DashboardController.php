<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count(); // Gets total number of products
        return view('admin.adminmain', compact('productCount'));
    }
}
