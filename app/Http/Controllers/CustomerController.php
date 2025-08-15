<?php

namespace App\Http\Controllers;

use App\Models\Register;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Register::all(); // get all customers
        return view('admin.admincustomer', compact('customers'));
    }

    public function ban($id)
    {
        $user = Register::findOrFail($id);
        $user->status = 'banned';
        $user->save();

        return redirect()->back()->with('success', 'User has been banned.');
    }

    public function unban($id)
    {
        $user = Register::findOrFail($id);
        $user->status = 'active'; // Balik sa active
        $user->save();

        return redirect()->back()->with('success', 'User has been unbanned.');
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            'address' => 'nullable|string|max:255'
        ]);

        $user = Register::find(session('loggedUser')['id']);
        $user->address = $request->address;
        $user->save();

        return redirect()->back()->with('success', 'Address updated successfully.');
    }

    public function deleteAccount(Request $request)
    {
        $sessionUser = session('loggedUser');

        if (!$sessionUser || !isset($sessionUser['id'])) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $user = Register::find($sessionUser['id']);

        if ($user) {
            $user->delete();

            // Clear session
            $request->session()->forget('loggedUser');
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('success', 'Your account has been deleted.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
