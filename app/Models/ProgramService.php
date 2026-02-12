<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramService extends Model
{
    protected $fillable = [
        'name',
        'description',
        'show_in_dropdown',
        'slug'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function feature_program_services()
    {
        return $this->hasMany(FeatureProgramService::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
