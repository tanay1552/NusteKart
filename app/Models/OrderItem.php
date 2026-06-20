<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
   protected $fillable = [
    'order_id',
    'fish_id',
    'vendor_id',
    'weight',
    'cost_price',
    'price',
    'cleaning_required',
    'cleaning_type'
];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
