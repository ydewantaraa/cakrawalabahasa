<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularDescription extends Model
{
    protected $fillable = [
        'popular_class_id',
        'description'
    ];

    public function popularClass()
    {
        return $this->belongsTo(PopularClass::class);
    }
}
