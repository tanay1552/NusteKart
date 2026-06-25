@extends('layouts.app')

@section('content')
    <style>
    /* =================================
   DELIVERY PAGE (HEADER SAFE)
    =================================*/

.nk-delivery {
    background: #f5f7fb;
    padding: 14px;
    font-family: system-ui, -apple-system, sans-serif;
}

/* ===== PAGE TITLE ===== */

.nk-delivery h2 {
    font-size: 22px;
    margin-bottom: 16px;
    color: #111827;
}

/* ===== ORDER CARD ===== */

.nk-delivery > div {
    background: #ffffff;
    border-radius: 14px;
    padding: 14px;
    margin-bottom: 16px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
    border: none !important;
}

/* ===== ORDER HEADER ===== */

.nk-delivery h4 {
    font-size: 18px;
    margin-bottom: 8px;
    color: #0f172a;
}

/* ===== CUSTOMER INFO ===== */

.nk-delivery p {
    font-size: 14px;
    line-height: 1.5;
    color: #374151;
    margin-bottom: 10px;
}

.nk-delivery strong {
    color: #111827;
}

/* ===== TABLE ===== */

.nk-delivery table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    margin-top: 8px;
}

.nk-delivery th {
    background: #eef2f7;
    padding: 10px;
    text-align: left;
    font-size: 13px;
}

.nk-delivery td {
    padding: 10px;
    border-top: 1px solid #f1f1f1;
    font-size: 13px;
}

/* ===== BUTTON GROUP ===== */

.nk-delivery form {
    display: flex;
    gap: 10px;
    margin-top: 12px;
    flex-wrap: wrap;
}

.nk-delivery button {
    margin-top: 14px;
    background: #0ea5a4;
    color: white;
    border: none;
    padding: 10px 16px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    transition: 0.25s;
}

.nk-delivery button:hover {
    background: #0b8f8e;
}

/* button colors */

.nk-delivery button[value="cod"] {
    background: #f59e0b;
    color: white;
}

.nk-delivery button[value="gpay"] {
    background: #10b981;
    color: white;
}

.nk-delivery button[value="later"] {
    background: #64748b;
    color: white;
}

.nk-delivery button:hover {
    transform: translateY(-1px);
    opacity: 0.95;
}

/* =================================
   📱 MOBILE
=================================*/

@media (max-width: 768px) {

    .nk-delivery {
        padding: 10px;
    }

    .nk-delivery table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .nk-delivery form {
        flex-direction: column;
    }

    .nk-delivery button {
        width: 100%;
    }

    .nk-delivery h4 {
        font-size: 16px;
    }
}

/* =================================
   💻 TABLET
=================================*/

@media (min-width: 769px) and (max-width: 1024px) {

    .nk-delivery h2 {
        font-size: 24px;
    }

    .nk-delivery > div {
        padding: 16px;
    }
}

/* =================================
   🖥️ DESKTOP
=================================*/

@media (min-width: 1025px) {

    .nk-delivery {
        max-width: 1100px;
        margin: auto;
    }
}
.header{
    display: flex;
    justify-content: space-between; /* puts one left and one right */
    align-items: center;
}

.box{
    margin: 0;
    background: #f5f5f5;
    padding: 8px 15px;
    border-radius: 8px;
    font-size: 18px;
}
</style>
<div class="nk-page nk-delivery">
    <div class="header">
        <h2>Delivery Page</h2>
        <h2 class="box">{{  $user->name }}</h2>
    </div>

<form method="POST" action="{{ route('logout') }}">

    @csrf
    <button class="btn btn-danger">
        <i class="fa fa-sign-out-alt"></i> Logout
    </button>
</form>



@foreach($orders as $o)

<div style="border:1px solid #ccc;padding:12px;margin-bottom:15px">

    <h4>Order #{{ $o->id }}</h4>

    <p>
        <strong>Customer:</strong> {{ $o->customer->name }} <br>
        <strong>Phone:</strong> {{ $o->customer->phone }} <br>
        <strong>Address:</strong> {{ $o->customer->address }} <br>
        <strong>Order Remark:</strong> {{ $o->remark ?? '-' }} <br>
        <strong>Total:</strong> ₹{{ $o->total_amount }}
    </p>

    <table border="1" width="100%" cellpadding="6">
        <tr>
            <th>Fish</th>
            <th>Weight</th>
            <th>Cleaning</th>
            <th>Cleaning Type</th>
        </tr>

        @foreach($o->items as $item)
        <tr>
            <td>{{ $item->fish->name ?? '-' }}</td>
            <td>{{ $item->weight }} kg</td>
            <td>{{ $item->cleaning_required ? 'Yes' : 'No' }}</td>
            <td>{{ $item->cleaning_type ?? '-' }}</td>
        </tr>
        @endforeach
    </table>

    <form method="POST" action="/delivery/{{ $o->id }}">
        @csrf
        <button name="method" value="cod">COD</button>
        <button name="method" value="gpay">GPay</button>
        <button name="method" value="later">Later</button>
    </form>

</div>

@endforeach

</div>

@endsection
