<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $fillable =[
        'start_date',
        'end_date',
        'total_rent',
        'advance_amount',
        'rent_payment_date',
        'house_id',
        'tenant_id',
        'room_id',
        'flat_id'
    ];
}
