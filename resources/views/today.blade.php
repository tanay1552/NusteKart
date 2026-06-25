@extends('layouts.app')

@section('content')
   <style>
    /* ===============================
   GLOBAL
=================================*/
/* =================================
   PAGE ONLY (SAFE — won't touch header)
=================================*/


/* ===== ORDER CARD ===== */
/* ===============================
   🚀 PRO ORDER UI
=================================*/

#itemsContainer {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.item-card {
    border: 1px solid #e5e7eb;
    border-radius: 16px;
    padding: 16px;
    background: #ffffff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
    transition: 0.2s ease;
}

.item-card:focus-within {
    border-color: #0ea5a4;
    box-shadow: 0 8px 22px rgba(14,165,164,0.15);
}

/* grid */
.item-grid {
    display: grid;
    gap: 12px;
}

/* tablet */
@media (min-width: 600px) {
    .item-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* desktop */
@media (min-width: 1024px) {
    .item-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* inputs bigger for mobile */
.field input,
.field select {
    height: 44px;
    font-size: 15px;
}

/* remove button pro */
.removeRow {
    width: 100%;
    margin-top: 12px;
    padding: 12px;
    background: #ef4444;
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.2s;
}

.removeRow:hover {
    background: #dc2626;
}

/* add button pro */
#addRow {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #0ea5a4, #14b8a6);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 800;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

#addRow:hover {
    transform: translateY(-1px);
}



    .nk-page {
        font-family: system-ui, -apple-system, sans-serif;
        background: #f5f7fb;
        padding: 12px;
    }

    /* forms */
    .nk-page form {
        background: #fff;
        padding: 16px;
        border-radius: 12px;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    /* labels */
    .nk-page label {
        display: block;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 4px;
    }

    /* inputs */
    .nk-page input[type="text"],
    .nk-page input[type="number"],
    .nk-page select {
        width: 100%;
        padding: 8px 10px;
        border-radius: 8px;
        border: 1px solid #dcdfe6;
        font-size: 14px;
    }

    /* buttons (NOT header button) */
    .nk-page button {
        background: #0d6efd;
        color: white;
        border: none;
        padding: 9px 14px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
    }

    .nk-page button:hover {
        background: #0b5ed7;
    }

    /* remove button */
    .nk-page .removeRow {
        background: #dc3545;
    }

    .nk-page .removeRow:hover {
        background: #bb2d3b;
    }

    /* tables */
    .nk-page table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .nk-page th {
        background: #eef2f7;
        font-weight: 600;
        text-align: left;
        padding: 10px;
        font-size: 14px;
    }

    .nk-page td {
        padding: 8px;
        font-size: 14px;
        border-top: 1px solid #f0f0f0;
    }

    /* mobile */
    @media (max-width: 768px) {
        .nk-page table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        .nk-page button {
            width: 100%;
            margin-top: 6px;
        }
    }
    body{
    margin:0;
    background:#ececec;
    font-family:Arial,sans-serif;
}



*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#ececec;
    font-family:Arial,sans-serif;
}

.poster{
    max-width:1080px;
    margin:auto;
    background:#ececec;
    display:flex;
}

.left{
    width:22%;
    background:#f8c925;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.left img{
    width:90%;
    margin-top:30px;
}

.right{
    width:78%;
}

.logo{
    width:95%;
    margin-left:10px;
}

.date{
    text-align:center;
    font-size:40px;
    font-weight:bold;
    margin-top:10px;
}

.heading{
    margin-top:20px;
    background:#f8c925;
    padding:20px;
    font-size:60px;
    font-weight:bold;
    text-align:center;
}

.fish-box{
    margin-top:25px;
    background:white;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

.fish-box th{
    padding:20px;
    font-size:35px;
}

td{
    font-size:34px;
    padding:20px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

.order-box{
    margin-top:40px;
    background:#f8c925;
    border-radius:0 80px 80px 0;
    padding:30px;
    text-align:center;
}

.order-title{
    font-size:70px;
    font-weight:bold;
    font-style:italic;
}

.order-sub{
    font-size:40px;
    font-weight:bold;
}

.phone{
    margin-top:20px;
    text-align:center;
    font-size:75px;
    font-weight:bold;
}

.note{
    margin-top:20px;
    font-size:35px;
    text-align:center;
    font-weight:bold;
}

.free{
    text-align:center;
    font-size:30px;
    font-weight:bold;
}

/* ================= TABLET ================= */
@media (max-width: 992px){

    .date{
        font-size:28px;
    }

    .heading{
        font-size:40px;
    }

    .fish-box th,
    td{
        font-size:22px;
        padding:12px;
    }

    .order-title{
        font-size:45px;
    }

    .order-sub{
        font-size:28px;
    }

    .phone{
        font-size:45px;
    }

    .note{
        font-size:22px;
    }

    .free{
        font-size:20px;
    }
    .fish-box td{
    font-size:36px;
}
}

/* ================= MOBILE ================= */
/* Mobile */
@media (max-width:768px){

    .poster{
        width:250%;
        transform:scale(.4);
        transform-origin:top left;
        display:flex;
        align-items:stretch;
    }

 .left{
    display:flex;
    flex-direction:column;
    justify-content:space-evenly;
}

   .fish-box{
    margin-top:25px;
    background:white;
    width:100%;
    padding:0;
}

.fish-box table{
    width:100%;
    border-collapse:collapse;
    table-layout:auto;
    
}
.fish-box td{
    font-size:6.77vw;
}
.right{
    display:flex;
    flex-direction:column;
    justify-content:space-evenly;
}

}
input,select {
    width: 100%;
    padding: 9px 10px;
    border-radius: 8px;
    border: 1px solid #dcdfe6;
    font-size: 14px;
}
</style>

  

  
<div class="nk-page">
 <div class="poster">

    <div class="left">

        <img src="{{ asset('images/rider.png') }}">
        <img src="{{ asset('images/fish-outline.png') }}">
        <img src="{{ asset('images/crab.png') }}">
        <img src="{{ asset('images/tuna.png') }}">
        <img src="{{ asset('images/prawns.png') }}">
       

    </div>

    <div class="right">

        <img class="logo" src="{{ asset('images/logo.png') }}">

        <div class="date">
            DATE: {{ now()->format('j F Y') }}
        </div>

        <div class="heading">
            TODAY'S FISH / आजचे नुसते
        </div>

        <div class="fish-box">

            <table>

                <tr>
                    <th>Fish</th>
                    <th>Price/Kg</th>
                </tr>

                @foreach($todayPrices as $fish)

                <tr>
                    <td>{{ strtoupper($fish->fish_name) }}</td>
                    <td>₹ {{ $fish->selling_price }}</td>
                </tr>

                @endforeach

            </table>

        </div>

        <div class="order-box">

            <div class="order-title">
                ORDER THROUGH
            </div>

            <div class="order-sub">
                WHATSAPP OR CALL
            </div>

        </div>

        <div class="phone">
            9209193776 ☎️ WhatsApp
        </div>

        <div class="note">
            ₹20/- EXTRA PER KG FOR FISH CLEANING
        </div>

        <div class="free">
            *FREE DELIVERY FOR ORDERS ABOVE 1KG & WITHIN PONDA
        </div>

    </div>

</div>
   <div class="container mt-4">

    <h2>Add Fish</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('fishes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <input
                    type="text"
                    name="name"
                    class="form-control"
                    placeholder="Fish Name"
                    required>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">
                    Save Fish
                </button>
            </div>
        </div>
    </form>

    <hr>
<!-- 
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
</form> -->

</div>

<form method="POST" action="{{ route('vendor.today.chart') }}">
    @csrf
    <button type="submit">Generate Today Chart</button>
</form>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<br><br>

<h3>Today Selling Chart</h3>

<table id="todayChartTable" border="1" cellpadding="8">
    <tr>
        <th>#</th>
        <th>Fish</th>
        <th>Selling Price</th>
        <th>Vendor</th>
        <th>Vendor Price</th>
        <th>Selling Price</th>
    </tr>

    @foreach($todayPrices as $i => $row)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $row->fish_name }}</td>
        <td><strong>₹ {{ $row->selling_price }}</strong></td>
        <td>{{ $row->vendor_name }}</td>
        <td>₹ {{ $row->vendor_price }}</td>
    </tr>
    @endforeach
</table>


<form method="POST" action="{{ route('orders.store') }}">
    @csrf

    {{-- Customer --}}
    <label>Customer Phone <span style="color:red;">*</span></label>
    <input type="text" id="phone" name="phone">

    <label>Customer Name <span style="color:red;">*</span></label>
    <input type="text" id="customer_name" name="customer_name">

    <label>Address <span style="color:red;">*</span></label>
    <input type="text" id="customer_address" name="address">

    <label>Geo Location</label>
    <input type="text" id="customer_geo" name="geo_location">

    <input type="hidden" id="customer_id" name="customer_id">

    <hr>

    <h3>Order Items</h3>

    <div id="itemsContainer">

    <div class="item-card item-row">

        <div class="item-grid">

            <div class="field">
                <label>Fish <span style="color:red;">*</span></label>
                <select name="items[0][fish_id]" class="fishSelect" required></select>
            </div>

            <div class="field">
                <label>Vendor <span style="color:red;">*</span></label>
                <select name="items[0][vendor_id]" class="vendorSelect" required></select>
            </div>

            <div class="field">
                <label>Vendor Price <span style="color:red;">*</span></label>
                <input type="number" name="items[0][cost_price]" class="vendor_price" readonly>
            </div>

            <div class="field">
                <label>Selling Price <span style="color:red;">*</span></label>
                <input type="number" name="items[0][price]" class="selling_price" readonly>
            </div>

            <div class="field">
                <label>Weight (KG) <span style="color:red;">*</span></label>
                <input type="number" step="0.01" name="items[0][weight]" class="weight" required>
            </div>

            <div class="field cleaning-box">
                <label>
                    <input type="checkbox" name="items[0][cleaning_required]" value="1" class="cleaningCheck">
                    Cleaning Required
                </label>
            </div>

            <div class="field">
                <label>Cleaning Type</label>
                <input type="text" name="items[0][clean_type]" placeholder="Cleaning type">
            </div>

        </div>

        <button type="button" class="removeRow">Remove</button>

    </div>

    </div>




    <button type="button" id="addRow">+ Add Fish</button>

    <hr>

    <label>Cleaning Charges <span style="color:red;">*</span></label>
    <input type="number" id="cleaning_charge" name="cleaning_charge" value="0" required >

    <label>Delivery Charges <span style="color:red;">*</span></label>
    <input type="number" id="delivery_charge" name="delivery_charge" value="0" required>

    <label>Total Amount <span style="color:red;">*</span> </label>
    <input type="number" id="total_amount" name="total_amount" required >

    <label>Order Remark <span style="color:red;">*</span></label>
    <input type="text" name="remark" placeholder="Eg: Give Early / Give Late Delivery" required>

    <button type="submit">Save Order</button>
</form>


<hr>


</div>







<script>
let todayData = [];

document.addEventListener('DOMContentLoaded', () => {
 
    let rowIndex = 1;
   initRow(document.querySelector('.item-row'));

   




    // ✅ init first row
   

    // ✅ ADD ROW
    document.getElementById('addRow').addEventListener('click', () => {

        const container = document.getElementById('itemsContainer');
        const firstRow = document.querySelector('.item-row');
        const clone = firstRow.cloneNode(true);

        // update names properly
        clone.querySelectorAll('input, select').forEach(el => {

            if (el.name) {
                el.name = el.name.replace(/\[\d+\]/, `[${rowIndex}]`);
            }

            // reset values
            if (el.type === 'checkbox') {
                el.checked = false;
            } else {
                el.value = '';
            }
        });

        container.appendChild(clone);
        initRow(clone);
        rowIndex++;
    });

    // ✅ REMOVE ROW (LIVE)
    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('removeRow')) {

            const rows = document.querySelectorAll('.item-row');

            if (rows.length > 1) {
                e.target.closest('.item-row').remove();
                calculateTotals(); // ⭐ IMPORTANT
            }
        }
    });





 






// Remove row

// Initialize row


// Init first row

document.getElementById('phone').addEventListener('keyup', function () {

    const phone = this.value.trim();

    const nameInput = document.getElementById('customer_name');
    const addressInput = document.getElementById('customer_address');
    const geoInput = document.getElementById('customer_geo');
    const customerIdInput = document.getElementById('customer_id');

    // reset if short phone
    if (phone.length < 10) {
        nameInput.value = '';
        addressInput.value = '';
        geoInput.value = '';
        customerIdInput.value = '';

        nameInput.readOnly = false;
        addressInput.readOnly = false;
        geoInput.readOnly = false;
        return;
    }

    fetch(`/get-customer-by-phone?phone=${phone}`)
        .then(res => res.json())
        .then(data => {

            if (data.status) {

                // ✅ EXISTING CUSTOMER
                nameInput.value = data.data.name || '';
                addressInput.value = data.data.address || '';
                geoInput.value = data.data.geo_location || '';
                customerIdInput.value = data.data.id;

                nameInput.readOnly = false;
                addressInput.readOnly = false;
                geoInput.readOnly = false;

            } else {

                // ✅ NEW CUSTOMER
                nameInput.value = '';
                addressInput.value = '';
                geoInput.value = '';
                customerIdInput.value = '';

                nameInput.readOnly = false;
                addressInput.readOnly = false;
                geoInput.readOnly = false;
            }
        })
        .catch(err => {
            console.error(err);
        });
});



 
  

});


function calculateTotals() {

    let subtotal = 0;
    let totalWeight = 0;
    let cleanedTotalWeight = 0;

    const rows = document.querySelectorAll('.item-row');

    // ✅ PASS 1 — totals
    rows.forEach(row => {

        const weight = parseFloat(row.querySelector('.weight').value) || 0;
        const price = parseFloat(row.querySelector('.selling_price').value) || 0;
        const cleaningChecked = row.querySelector('.cleaningCheck').checked;

        totalWeight += weight;
        subtotal += weight * price;

        // ⭐ ONLY cleaned fish weight
        if (cleaningChecked) {
            cleanedTotalWeight += weight;
        }
    });

    // ✅ PASS 2 — cleaning calculation
    let totalCleaningCharge = 0;

    rows.forEach(row => {

        const weight = parseFloat(row.querySelector('.weight').value) || 0;
        const cleaningChecked = row.querySelector('.cleaningCheck').checked;

        if (!cleaningChecked || weight <= 0) return;

        // ⭐ YOUR FINAL RULE
        if (cleanedTotalWeight < 1) {
            totalCleaningCharge += 20;
        } else {
            totalCleaningCharge += 20 * weight;
        }
    });

    // ✅ delivery charge (based on total order weight)
    let deliveryCharge = 0;
    if (totalWeight > 0 && totalWeight < 1) {
        deliveryCharge = 20;
    }

    document.getElementById('cleaning_charge').value = totalCleaningCharge.toFixed(2);
    document.getElementById('delivery_charge').value = deliveryCharge.toFixed(2);

    const totalAmount = subtotal + totalCleaningCharge + deliveryCharge;
    document.getElementById('total_amount').value = totalAmount.toFixed(2);
}







function loadTodayData(fishSelect) {
     
  
    fetch('/today-fish-vendors')
        .then(res => res.json())
        .then(data => {
           
            todayData = data;
             loadFishDropdown(fishSelect);
        })
        .catch(err => console.error(err));
}

function loadFishDropdown(select) {
    select.innerHTML = '<option value="">Select Fish</option>';
    const fishes = [...new Map(todayData.map(i => [i.fish_id, i])).values()];

    fishes.forEach(f => {
        const opt = document.createElement('option');
        opt.value = f.fish_id;
        opt.textContent = f.fish_name;
        select.appendChild(opt);
    });
}


function onFishChange(row) {
    const fishId = row.querySelector('.fishSelect').value;
    const vendorSelect = row.querySelector('.vendorSelect');
    const vendorPrice = row.querySelector('.vendor_price');
    const sellingPrice = row.querySelector('.selling_price');

    vendorSelect.innerHTML = '<option value="">Select Vendor</option>';
    vendorPrice.value = '';
    sellingPrice.value = '';

    if (!fishId) return;
    
    const todayPrices = @json($todayPrices);
 
    const vendors = todayData.filter(item => item.fish_id == fishId);
    const priceObj = todayPrices.find(item => item.fish_id == fishId);
        

    const sPrice = priceObj ? Number(priceObj.selling_price) : '';

    let lowest = null;

    vendors.forEach(v => {
        const opt = document.createElement('option');
        opt.value = v.vendor_id;
        opt.textContent = v.vendor_name;
        opt.dataset.vendorPrice = v.price_per_kg;
        opt.dataset.sellingPrice = sPrice;
        vendorSelect.appendChild(opt);

        if (!lowest || v.price_per_kg < lowest.price_per_kg) {
            lowest = v;
        }
    });

    if (lowest) {
    
        vendorSelect.value = lowest.vendor_id;
        vendorPrice.value = lowest.price_per_kg;
        sellingPrice.value = sPrice;
    }
}



function onVendorChange(row) {
    const vendorSelect = row.querySelector('.vendorSelect');
    const vendorPrice = row.querySelector('.vendor_price');
    const sellingPrice = row.querySelector('.selling_price');

    const opt = vendorSelect.selectedOptions[0];
    if (!opt) return;

    vendorPrice.value = opt.dataset.vendorPrice;
    sellingPrice.value = opt.dataset.sellingPrice;
}


function initRow(row) {
    const fishSelect = row.querySelector('.fishSelect');
    loadTodayData(fishSelect);

    fishSelect.addEventListener('change', () => onFishChange(row));
    row.querySelector('.vendorSelect')
        .addEventListener('change', () => onVendorChange(row));

        row.querySelector('.weight')
    .addEventListener('input', calculateTotals);

row.querySelector('.cleaningCheck')
    .addEventListener('change', calculateTotals);

row.querySelector('.vendorSelect')
    .addEventListener('change', calculateTotals);
}




</script>




</div>



@endsection

