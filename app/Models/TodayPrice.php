<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodayPrice extends Model
{
    protected $fillable = [
        'fish_id',
        'vendor_id',
        'vendor_price',
        'selling_price',
        'date'
    ];
}

