<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total_amount',
        'status',
        'user_id'
    ];

    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
