<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherExperience extends Model
{
    protected $fillable = [
        'name',
        'teacher_profile_id'
    ];

    public function teacher_profile()
    {
        return $this->belongsTo(TeacherProfile::class);
    }
}
