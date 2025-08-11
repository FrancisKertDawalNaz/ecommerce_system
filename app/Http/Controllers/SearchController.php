<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->get('query', '');
        $results = Product::where('name', 'like', '%' . $query . '%')
                          ->limit(5)
                          ->get(['id', 'name']);

        return response()->json($results);
    }
}
