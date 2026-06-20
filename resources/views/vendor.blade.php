@extends('layouts.app')

@section('content')
 <style>
    /* =================================
   VENDOR PAGE (HEADER SAFE)
=================================*/

.nk-vendor {
    background: #f5f7fb;
    padding: 14px;
    font-family: system-ui, -apple-system, sans-serif;
}

/* ===== TITLES ===== */

.nk-vendor h2 {
    font-size: 22px;
    margin-bottom: 14px;
    color: #111827;
}

.nk-vendor h3 {
    font-size: 18px;
    margin: 16px 0 10px;
    color: #1f2937;
}

/* ===== FORM CARD ===== */

.nk-vendor form {
    background: #ffffff;
    padding: 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
}

/* ===== LABELS ===== */

.nk-vendor label {
    display: block;
    font-weight: 600;
    margin-top: 10px;
    margin-bottom: 5px;
    font-size: 14px;
}

/* ===== INPUTS ===== */

.nk-vendor input,
.nk-vendor select {
    width: 100%;
    padding: 9px 10px;
    border-radius: 8px;
    border: 1px solid #dcdfe6;
    font-size: 14px;
}

/* ===== BUTTON ===== */

.nk-vendor button {
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

.nk-vendor button:hover {
    background: #0b8f8e;
}

/* ===== TABLE ===== */

.nk-vendor table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.nk-vendor thead {
    background: #eef2f7;
}

.nk-vendor th {
    text-align: left;
    padding: 12px;
    font-size: 14px;
    font-weight: 600;
}

.nk-vendor td {
    padding: 10px;
    border-top: 1px solid #f1f1f1;
    font-size: 14px;
}

/* ===== VENDOR SUPPLY LIST ===== */

.nk-vendor ul {
    list-style: none;
    padding-left: 0;
}

.nk-vendor li {
    background: #ffffff;
    padding: 12px;
    margin-bottom: 10px;
    border-radius: 10px;
    box-shadow: 0 1px 6px rgba(0,0,0,0.05);
    font-size: 14px;
}

.nk-vendor li b {
    color: #111827;
}

.nk-vendor small {
    color: #6b7280;
}

/* =================================
   📱 MOBILE
=================================*/

@media (max-width: 768px) {

    .nk-vendor {
        padding: 10px;
    }

    .nk-vendor table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .nk-vendor button {
        width: 100%;
    }

    .nk-vendor li {
        font-size: 13px;
        padding: 10px;
    }
}

/* =================================
   💻 TABLET
=================================*/

@media (min-width: 769px) and (max-width: 1024px) {

    .nk-vendor form {
        padding: 18px;
    }

    .nk-vendor h2 {
        font-size: 24px;
    }
}

/* =================================
   🖥️ DESKTOP
=================================*/

@media (min-width: 1025px) {

    .nk-vendor {
        max-width: 1200px;
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
<div class="nk-page nk-vendor">
<div class="header">
    <h2>Vendor Page</h2>
    <h2 class="box">{{ $vendors->name }}</h2>
</div>
<form method="POST" action="{{ route('vendor.logout') }}">
    @csrf
    <button class="btn btn-danger">
        <i class="fa fa-sign-out-alt"></i> Logout
    </button>
</form>


<form method="POST" action="/vendor">
@csrf

<label>Date</label>
<input type="date" name="date" value="{{ date('Y-m-d') }}" required>



<label>Fish</label>
<select name="fish_id" required>
    <option value="">-- Select Fish --</option>
    @foreach($fishes as $fish)
        <option value="{{ $fish->id }}">{{ $fish->name }}</option>
    @endforeach
</select>

<label>Price per KG</label>
<input type="number" name="price_per_kg" required>

<button type="submit">Add Fish</button>
</form>

<h3>Today's Fish List</h3>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Fish Name</th>
            <th>Vendor Name</th>
            <th>Price / KG</th>
        </tr>
    </thead>
    <tbody>
        @forelse($todayFish as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row->fish_name }}</td>
                <td>{{ $row->vendor_name }}</td>
                <td>₹ {{ $row->price_per_kg }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No data added for today</td>
            </tr>
        @endforelse
    </tbody>
</table>
<h2>Vendor Supply List - Today</h2>

@php
$currentVendor = null;
@endphp

@foreach($vendorData as $item)

    {{-- New Vendor Section --}}
    @if($currentVendor != $item->vendor_name)

        @if($currentVendor != null)
            </ul>
        @endif

        <h3 style="margin-top:20px;">
            Vendor: {{ $item->vendor_name }}
        </h3>

        <ul>

        @php
            $currentVendor = $item->vendor_name;
        @endphp

    @endif

    <li style="margin-bottom:10px;">
        <b>Order #{{ $item->order_id }}</b> -
        {{ $item->fish_name }} -
        <b>{{ $item->weight }} KG</b>

        @if($item->cleaning_required)
            <span style="color:red;"> (Cleaning Required)</span>
        @endif

        @if($item->cleaning_type)
            <br>
            <small>cleaning Type: {{ $item->cleaning_type }}</small>
        @endif
    </li>

@endforeach

@if($currentVendor != null)
    </ul>
@endif



</div>

@endsection

