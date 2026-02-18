<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    protected $fillable = [
        'whatsapp',
        'position',
        'teacher_id',
        'initial_password'
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
