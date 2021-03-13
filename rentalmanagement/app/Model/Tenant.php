<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'id_type',
        'id_number',
        'email',
        'phone_number',
        'password',
        'address',
        'occupation_status',
        'work_at',
        'emergency_person',
        'emergency_contact'
    ];
}
