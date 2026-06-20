<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    protected $table = 'vendors';

    protected $fillable = [
        'username',
        'password',
        'name'
    ];

    protected $hidden = [
        'password'
    ];
}
