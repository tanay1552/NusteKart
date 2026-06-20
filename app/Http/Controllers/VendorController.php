<?php

namespace App\Http\Controllers;


use App\Models\Vendor;
use App\Models\Fish;
use App\Models\VendorFishPrice;
use App\Models\TodayPrice;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VendorController extends Controller
{
   public function index()
{
    $vendorAuth = Auth::guard('vendor')->user();

    $today = Carbon::today()->toDateString();

    $vendors = $vendorAuth;
    $fishes  = DB::table('fishes')->get();
    $vendorAuth = Auth::guard('vendor')->user();
    // ✅ TODAY'S DATA
    $todayFish = DB::table('vendor_fish_prices as vfp')
        ->join('vendors', 'vendors.id', '=', 'vfp.vendor_id')
        ->join('fishes', 'fishes.id', '=', 'vfp.fish_id')
        ->whereDate('vfp.date', $today)
        ->where('vendors.id', $vendorAuth->id)
        ->select(
            'fishes.name as fish_name',
            'vendors.name as vendor_name',
            'vfp.price_per_kg'
        )
        ->orderBy('fishes.name')
        ->orderBy('vfp.price_per_kg')
        ->get();

  

   $vendorData = DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('vendors', 'order_items.vendor_id', '=', 'vendors.id')
        ->join('fishes', 'order_items.fish_id', '=', 'fishes.id')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->whereDate('orders.created_at', $today)
        ->where('order_items.vendor_id', $vendorAuth->id)
        ->select(
            'vendors.name as vendor_name',
            'orders.id as order_id',
            'customers.name as customer_name',
            'fishes.name as fish_name',
            'order_items.weight',
            'order_items.cleaning_required',
            'order_items.cleaning_type',
            'orders.remark'
        )
        ->orderBy('vendors.name')
        ->orderBy('orders.id')
        ->get();

    return view('vendor', compact('vendors', 'fishes', 'todayFish','vendorData'));
}
    public function store(Request $r){
        $vendorAuth = Auth::guard('vendor')->user();
        VendorFishPrice::create([
        'vendor_id' => $vendorAuth->id,
        'fish_id' => $r->fish_id,
        'price_per_kg' => $r->price_per_kg,
        'date'=>$r->date,
       
    ]);

    return back()->with('success', 'Fish price added successfully.');
    }

public function todayChart()
{
    $today = Carbon::today()->toDateString();
    
    DB::transaction(function () use ($today) {

        // delete old chart if already generated
        DB::table('today_prices')->whereDate('date', $today)->delete();

        // get lowest vendor price per fish
        $rows = DB::table('vendor_fish_prices as vfp')
            ->join('vendors', 'vendors.id', '=', 'vfp.vendor_id')
            ->join('fishes', 'fishes.id', '=', 'vfp.fish_id')
            ->whereDate('vfp.date', $today)
            ->orderBy('vfp.price_per_kg', 'asc')
            ->get()
            ->groupBy('fish_id');

        foreach ($rows as $fishRows) {
            $lowest = $fishRows->first();

            DB::table('today_prices')->insert([
                'date'          => $today,
                'fish_id'       => $lowest->fish_id,
                'vendor_id'     => $lowest->vendor_id,
                'vendor_price'  => $lowest->price_per_kg,
                'selling_price' => $lowest->price_per_kg + 50,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    });

    return back()->with('success', 'Today chart generated successfully');
}


public function login(Request $request)
{
    if (Auth::guard('vendor')->attempt([
        'username' => $request->username,
        'password' => $request->password
    ])) {

        $request->session()->regenerate();

        return redirect('/vendor');
    }

    return back()->with('error', 'Invalid username or password');
}

public function showLogin()
{
    return view('vendor.login');
}

public function logout(Request $request)
{
    Auth::guard('vendor')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/vendor/login');
}
}

