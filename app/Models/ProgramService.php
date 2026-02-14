<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramService extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function future_program_services()
    {
        return $this->hasMany(FutureProgramService::class);
    }
}
