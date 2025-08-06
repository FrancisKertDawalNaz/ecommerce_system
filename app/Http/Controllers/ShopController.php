<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('user.shop', compact('products'));
    }
    
    // show product details
    public function showProducts()
    {
        $products = Product::all();
        return view('admin.adminproduct', compact('products')); // ✅ correct here
    }
    
    // delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image_url) {
            Storage::disk('public')->delete($product->image_url);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
   
    // edit product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image_url = $imagePath;
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully.');
    }
}
