<?php

namespace App\Http\Controllers;

use App\Models\admin_register;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Save to database
        \App\Models\Register::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Account created! You may now log in.');
    }


    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Register::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

        // Check kung banned
        if ($user->status === 'banned') {
            return redirect()->route('login')->with('error', 'Your account has been banned.');
        }

        // Check password
        if (Hash::check($request->password, $user->password)) {
            // Store user info in session
            session([
                'loggedUser' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => $user->status,
                    'address' => $user->address, // Add address to session
                ]
            ]);

            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }

        return redirect()->route('login')->with('error', 'Invalid email or password.');
    }


    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function shop()
    {
        return view('user.shop');
    }

    public function orders()
    {
        $sessionUser = session('loggedUser');

        if (!$sessionUser || !isset($sessionUser['id'])) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $orders = Order::with('product')
            ->where('user_id', $sessionUser['id'])
            ->latest()
            ->get();

        // IMPORTANT: pass $orders to the view
        return view('user.orders', compact('orders'));
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function setting()
    {
        $sessionUser = session('loggedUser');

        if (!$sessionUser || !isset($sessionUser['id'])) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $user = Register::find($sessionUser['id']);

        return view('user.setting', compact('user'));
    }


    public function logout(Request $request)
    {
        // Manually forget the custom session
        $request->session()->forget('loggedUser');

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image_url' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Example kung naka-session yung user data
        $user = Register::find(session('loggedUser')['id']);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update session info
        session()->put('loggedUser', $user->toArray());

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Register::find(session('loggedUser')['id']);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}
