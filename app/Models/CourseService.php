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
            get: function ($value) {

                // Kalau punya thumbnail sendiri
                if ($value) {
                    return url('/storage/' . $value);
                }

                // kalau tidak, ambil dari course
                $courseThumbnail = $this->course?->getRawOriginal('thumbnail');

                if ($courseThumbnail) {
                    return url('/storage/' . $courseThumbnail);
                }

                // Fallback terakhir (default image)
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
        return $this->hasMany(SubCourseService::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
