<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'customer_id',
    'total_weight',
    'cleaning_charge',
    'delivery_charge',
    'total_amount',
    'payment_method',
    'remark',
    'status',
    'delivery_time'
];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
