<?php

namespace App\Models\customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'fullname', 'company', 'phone', 'address', 'address_type', 'isActive', 'user_id', 'city_id', 'district_id', 'ward_id'
    ];
}
