<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['product_status_id', 'user_id', 'address_id', 'delivery_fee', 'cancellation_reason'];

    /**
     * Get the address that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo('App\Models\Address', 'address_id', 'id');
    }

    /**
     * Get all of the order_detail for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_detail(): HasMany
    {
        return $this->hasMany('App\Models\OrderDetail', 'order_id', 'id');
    }

    /**
     * Get the status_order that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_status(): BelongsTo
    {
        return $this->belongsTo('App\Models\OrderStatus', 'status_id', 'id');
    }
}
