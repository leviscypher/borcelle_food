<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    protected $fillable = [
        'fullname', 'company', 'phone', 'delivery_address', 'address_type', 'user_id', 'city_id', 'district_id', 'ward_id', 'isActive'
    ];

    /**
     * Get the user that owns the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Get all of the city for the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->BelongsTo('App\Models\City', 'city_id', 'id');
    }

    /**
     * Get all of the district for the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->BelongsTo('App\Models\District', 'district_id', 'id');
    }

    /**
     * Get all of the ward for the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ward(): BelongsTo
    {
        return $this->BelongsTo('App\Models\Ward', 'ward_id', 'id');
    }
}
