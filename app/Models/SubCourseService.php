<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SubCourseService extends Model
{
    protected $fillable = [
        'name',
        'course_service_id',
    ];

    public function course_service()
    {
        return $this->belongsTo(CourseService::class, 'course_service_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
