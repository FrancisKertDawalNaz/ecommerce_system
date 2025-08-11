<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function liveSearch(Request $request)
    {
        $query = $request->input('q');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->limit(5)
            ->get();

        return response()->json($products);
    }
}
