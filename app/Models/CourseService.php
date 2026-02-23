<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseService extends Model
{
    protected $fillable = [
        'name',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sub_course_services()
    {
        return $this->hasMany(SubCourseService::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
