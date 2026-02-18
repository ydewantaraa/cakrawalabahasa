<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    protected $fillable = [
        'whatsapp',
        'position',
<<<<<<< HEAD
        'teacher_id',
        'initial_password'
=======
        'teacher_id'
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
    public function teacher_experiences()
    {
        return $this->hasMany(TeacherExperience::class);
    }
}
