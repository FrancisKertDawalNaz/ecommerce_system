<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        if ($user && Hash::check($request->password, $user->password)) {
            // Optionally store user info in session
            session([
                'loggedUser' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]
            ]);


            // Redirect to user dashboard
            return redirect()->route('user.dashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function shop()
    {
        return view('user.shop');
    }

    public function orders(){
        return view('user.orders');
    }

    public function wishlist()
    {
        return view('user.wishlist');
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
}
