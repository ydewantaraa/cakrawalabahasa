<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
<<<<<<< HEAD
=======
        'price',
        'learning_type',
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
        'thumbnail',
        'program_service_id'
    ];

<<<<<<< HEAD
    // agar properti virtual muncul di JSON
    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn($gambar) => url('/storage/' . $gambar),
        );
    }

=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
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
<<<<<<< HEAD

    public function learning_types()
    {
        return $this->hasMany(CourseLearningType::class);
    }
=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
}
