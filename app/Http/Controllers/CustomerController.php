<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function store(Request $request)
    {
        Customer::create([
            'name'         => $request->name,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'geo_location' => $request->geo_location,
        ]);

        return back()->with('success', 'Customer added successfully');
    }
}
