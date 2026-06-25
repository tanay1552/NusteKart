<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Customer;
use App\Models\VendorFishPrice;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Fish;
class ReportController extends Controller
{
    public function today()
    {
          $todayPrices = DB::table('today_prices')
    ->join('fishes','fishes.id','=','today_prices.fish_id')
    ->join('users','users.id','=','today_prices.vendor_id')
    ->whereDate('today_prices.date', today())
    ->select(
         'fishes.id as fish_id',
        'fishes.name as fish_name',
        'users.name as vendor_name',
        'today_prices.vendor_price',
        'today_prices.selling_price'
    )
    ->orderBy('fish_name')
    ->get();
   
        $orders = Order::whereDate('created_at', today())->get();
        return view('today', compact('orders','todayPrices'));
    }


    public function orders()
    {
 $orders = Order::whereDate('created_at', today())->get();
        return view('orders', compact('orders'));
    }
    // 🔥 NEW FUNCTION
    public function getCustomerByPhone(Request $request)
{
    $customer = Customer::where('phone', $request->phone)->first();

    if ($customer) {
        return response()->json([
            'status' => true,
            'data' => $customer
        ]);
    }

    return response()->json([
        'status' => false
    ]);
}


 


public function getTodayFishVendorList()
{
   $today = Carbon::today()->toDateString();

    $lowestPriceSub = DB::table('vendor_fish_prices')
    ->select('fish_id', DB::raw('MIN(price_per_kg) as min_price'))
    ->whereDate('date', $today)
    ->groupBy('fish_id');

    $data = DB::table('vendor_fish_prices as vfp')
    ->join('fishes', 'fishes.id', '=', 'vfp.fish_id')
    ->join('users', 'users.id', '=', 'vfp.vendor_id')
    ->joinSub($lowestPriceSub, 'lp', function ($join) {
        $join->on('lp.fish_id', '=', 'vfp.fish_id');
    })
    ->whereDate('vfp.date', $today)
    ->select(
        'fishes.id as fish_id',
        'fishes.name as fish_name',
        'users.id as vendor_id',
        'users.name as vendor_name',
        'vfp.price_per_kg',
        DB::raw('CASE WHEN vfp.price_per_kg = lp.min_price THEN 1 ELSE 0 END AS is_lowest')
    )
    ->orderBy('fishes.name')
    ->orderBy('vfp.price_per_kg')
    ->get();
return response()->json($data);
}

public function store(Request $request)
{
    if (!$request->customer_id) {

        // Create new customer
        $customer = Customer::create([
            'name'         => $request->customer_name,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'geo_location' => $request->geo_location,
        ]);

    } else {

        // Find existing customer
        $customer = Customer::findOrFail($request->customer_id);

        // Update customer details
        $customer->update([
            'name'         => $request->customer_name,
            'phone'        => $request->phone,
            'address'      => $request->address,
            'geo_location' => $request->geo_location,
        ]);
    }

    $order = Order::create([
        'customer_id'     => $customer->id,
        'total_weight'    => collect($request->items)->sum('weight'),
        'cleaning_charge' => $request->cleaning_charge,
        'delivery_charge' => $request->delivery_charge,
        'total_amount'    => $request->total_amount,
        'payment_method'  => 'cash',
        'remark'          => $request->remark,
        'status'          => 'pending',
    ]);

    foreach ($request->items as $item) {
        OrderItem::create([
            'order_id'           => $order->id,
            'fish_id'            => $item['fish_id'],
            'vendor_id'          => $item['vendor_id'],
            'weight'             => $item['weight'],
            'cost_price'         => $item['cost_price'],
            'price'              => $item['price'],
            'cleaning_required'  => isset($item['cleaning_required']) ? 1 : 0,
            'cleaning_type'      => $item['clean_type'] ?? null,
        ]);
    }

    return back()->with('success', 'Order Saved Successfully');
}

}

