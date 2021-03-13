<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_type',
        'monthly_rent',
        'additional_charges',
        'description',
        'house_id',
        'tenant_id'
    ];
}
