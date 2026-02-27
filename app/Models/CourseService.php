<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class CourseService extends Model
{
    protected $fillable = [
        'name',
        'thumbnail',
        'description',
        'course_id'
    ];

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {

                if ($value) {
                    return url('/storage/' . $value);
                }

                if (!empty($attributes['course_id'])) {

                    $course = Course::select('id', 'thumbnail')
                        ->find($attributes['course_id']);

                    if ($course && $course->thumbnail) {
                        return $course->thumbnail;
                    }
                }

                return asset('img/default-course.png');
            }
        );
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function sub_course_services()
    {
        return $this->hasMany(SubCourseService::class, 'course_service_id');
    }

    public function prices()
    {
        return $this->hasMany(Price::class, 'course_service_id');
    }
}
