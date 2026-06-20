<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    protected $fillable = ['name'];
    protected $table = 'fishes'; 

    public function vendorPrices()
    {
        return $this->hasMany(VendorFishPrice::class);
    }
}
