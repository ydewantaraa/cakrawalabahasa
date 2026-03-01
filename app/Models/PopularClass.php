<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PopularClass extends Model
{
    protected $fillable = [
        'course_id',
        'price',
        'duration'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function descriptions()
    {
        return $this->hasMany(PopularDescription::class);
    }
}
