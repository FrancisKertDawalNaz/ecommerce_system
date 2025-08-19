<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Wishlist;
use App\Models\Order;

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
    // add to wishlist
    public function addToWishlist($productId)
    {
        $sessionUser = session('loggedUser');
        if (!$sessionUser) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $existing = Wishlist::where('user_id', $sessionUser['id'])
            ->where('product_id', $productId)
            ->first();

        if (!$existing) {
            Wishlist::create([
                'user_id' => $sessionUser['id'],
                'product_id' => $productId
            ]);
        }

        return redirect()->route('wishlist')->with('success', 'Added to wishlist!');
    }
    // show wishlist
    public function showWishlist()
    {
        $sessionUser = session('loggedUser');

        if (!$sessionUser) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $wishlistItems = Wishlist::with('product')
            ->where('user_id', $sessionUser['id'])
            ->get();

        return view('user.wishlist', compact('wishlistItems'));
    }

    // remove from wishlist
    public function removeFromWishlist($id)
    {
        Wishlist::findOrFail($id)->delete();
        return back()->with('success', 'Removed from wishlist');
    }
}
