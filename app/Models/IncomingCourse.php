<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomingCourse extends Model
{
    protected $fillable = [
        'course_id',
        'incoming_date',
        'description',
        'sub_description'
    ];

    protected $casts = [
        'incoming_date' => 'date',
    ];

    // Relasi: IncomingCourse milik 1 Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
