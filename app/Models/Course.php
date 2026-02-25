<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category',
        'slug',
        'quota',
        'duration',
        'thumbnail',
        'hasTeacher',
        'isActive',
        'explanation',
        'program_service_id'
    ];

    // agar properti virtual muncul di JSON
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn($gambar) => url('/storage/' . $gambar),
        );
    }

    public function program_service()
    {
        return $this->belongsTo(ProgramService::class);
    }

    public function course_facilities()
    {
        return $this->hasMany(CourseFacility::class);
    }

    public function course_services()
    {
        return $this->hasMany(CourseService::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'student_id')
            ->withPivot('is_paid', 'paid_at')
            ->withTimestamps();
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }


    public function teachers()
    {
        return $this->belongsToMany(
            User::class,
            'course_teachers',
            'course_id',
            'student_id'
        )->withTimestamps();
    }
}
