<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sub_description_title',
        'sub_description',
        'category',
        'quota',
        'duration',
        'price',
        'learning_type',
        'thumbnail',
        'program_service_id'
    ];

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
