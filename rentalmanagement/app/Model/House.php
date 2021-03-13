<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'house_name',
        'house_based',
        'address',
        'house_desc',
        'landlord_id',
        'tenant_id'
    ];
}
