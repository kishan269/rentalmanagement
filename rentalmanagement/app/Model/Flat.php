<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable=[
        'flat_number'
        ,'flat_type'
        ,'monthly_rent'
        ,'additional_charges'
        ,'description'
        ,'house_id'
        ,'tenant_id'
    ];

}
