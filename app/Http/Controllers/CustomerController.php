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
}
