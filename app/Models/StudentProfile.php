<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = [
        'whatsapp',
        'birthday',
        'student_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
