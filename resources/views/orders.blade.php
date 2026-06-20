@extends('layouts.app')

@section('content')
<div class="nk-page">
<h2>Orders List</h2>

<div style="overflow-x:auto;">
<table border="1" width="100%" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Total Weight</th>
            <th>Cleaning</th>
            <th>Delivery</th>
            <th>Total Amount</th>
            <th>Payment</th>
            <th>Status</th>
            <th>Delivery time</th>
            <th>Delivered In</th>
            <th>Remark</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @forelse($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->customer_id }}</td>
                <td>{{ $order->total_weight }} KG</td>
                <td>₹{{ $order->cleaning_charge }}</td>
                <td>₹{{ $order->delivery_charge }}</td>
                <td><strong>₹{{ $order->total_amount }}</strong></td>
                <td>{{ strtoupper($order->payment_method) }}</td>
                <td>
                    @if($order->status == 'delivered')
                        ✅ Delivered
                    @else
                        ⏳ Pending
                    @endif
                </td>
                <td>{{ $order->delivery_time }}</td>
                <td>{{ $order->created_at->diff($order->delivery_time)->format('%H:%I:%S')  }}</td>
                <td>{{ $order->remark }}</td>
                <td>{{ $order->created_at->format('d M Y h:i A') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="10">No Orders Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
  @endsection