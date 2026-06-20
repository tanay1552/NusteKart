<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorFishPrice extends Model
{
    protected $fillable = [
        'vendor_id',
        'fish_id',
        'price_per_kg',
        'date'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function fish()
    {
        return $this->belongsTo(Fish::class);
    }
}
