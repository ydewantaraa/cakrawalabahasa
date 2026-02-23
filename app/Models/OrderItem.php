<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'quantity',
        'final_price',
        'order_id',
        'price_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
