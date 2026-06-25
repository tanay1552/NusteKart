<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index(Request $request)
{
    $date = $request->date ?? now()->toDateString();
    $user =  Auth::user();
    $orders = Order::with([
        'customer',
        'items.fish',
        'items.vendor'
    ])
    ->whereDate('created_at', $date)
    ->where('status', 'pending') // only pending deliveries
    ->orderBy('id', 'desc')
    ->get();

    return view('delivery', compact('orders', 'date','user'));
}

   public function close(Request $request, $id)
{
    $order = Order::findOrFail($id);

  
        $order->status = 'delivered';
        $order->delivery_time=now();
        $order->payment_method = $request->method;
  

    $order->save();

    return back()->with('success', 'Delivery updated');
}

}

