<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

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
        // Validate input with stronger rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8',
        ]);

        try {
            // Create new user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Registration successful! Welcome to our platform.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput($request->except('password'))
                ->with('error', 'Registration failed. Please try again.');
        }
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admindashboard')->with('success', 'Login successful!');
        }

        return redirect()->route('dashboard')->with('success', 'Login successful!');
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
        return view('user.orders');
    }

    public function wishlist()
    {
        return view('user.wishlist');
    }

    public function setting()
    {
        return view('user.setting');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function Mainadmin()
    {
        return view('admin.auth.admin_login');
    }

    public function admindashboard()
    {
        return view('admin.adminmain');
    }

    public function product()
    {
        return view('admin.adminproduct');
    }

    public function order()
    {
        return view('admin.adminorder');
    }

    public function customer()
    {
        return view('admin.admincustomer');
    }

    public function review()
    {
        return view('admin.adminreview');
    }

    public function settings()
    {
        return view('admin.adminsetting');
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
}
