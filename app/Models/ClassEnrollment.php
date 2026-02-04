<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassEnrollment extends Model
{
    protected $table = 'class_enrollments';

    protected $fillable = [
        'course_id',
        'student_id',
        'teacher_id',
        'enrolled_at',
    ];

    protected $casts = [
        'enrolled_at' => 'datetime',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
