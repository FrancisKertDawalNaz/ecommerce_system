<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function searchSuggestions(Request $request)
    {
        $query = $request->get('query');

        $products = Product::where('name', 'like', "%{$query}%")
            ->limit(5)
            ->get(['id', 'name']);

        return response()->json($products);
    }
}
