<?php

namespace App\Http\Controllers;

use App\Models\admin_register;
use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = admin_register::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Optionally store user info in session
            session([
                'loggedUser' => [
                    'id' => $user->id,
                    'email' => $user->email,
                ]
            ]);


            // Redirect to admin dashboard
            return redirect()->route('admindashboard')->with('success', 'Login successful!');
        } else {
            return redirect()->route('Mainadmin')->with('error', 'Invalid email or password.');
        }
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
        $customers = Register::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.admincustomer', compact('customers'));
    }



    public function review()
    {
        return view('admin.adminreview');
    }

    public function settings()
    {
        return view('admin.adminsetting');
    }

    public function adminlogout(Request $request)
    {
        // Manually forget the custom session
        $request->session()->forget('loggedUser');

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to admin login
        return redirect()->route('Mainadmin')->with('success', 'You have been logged out.');
    }
}
