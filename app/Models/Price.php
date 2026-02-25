<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'course_id',
        'course_service_id',
        'sub_course_service_id',
        'price',
        'package_size',
        'learning_type',
        'label_type',
        'unit_type',
        'hasQuantity',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function service()
    {
        return $this->belongsTo(CourseService::class, 'course_service_id');
    }

    public function subService()
    {
        return $this->belongsTo(SubCourseService::class, 'sub_course_service_id');
    }
}
