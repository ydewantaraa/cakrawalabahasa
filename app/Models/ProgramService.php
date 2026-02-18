<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ProgramService extends Model
{
    protected $fillable = [
        'name',
        'description',
        'show_in_dropdown',
        'slug',
        'hero_text',
        'hero_image',
        'image_service'
    ];

    protected function imageService(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value
                ? asset('storage/' . $value)
                : asset('img/default-image-service.png')
        );
    }

    protected function heroImage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value
                ? asset('storage/' . $value)
                : asset('img/default-hero-image.png')
        );
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function feature_program_services()
    {
        return $this->hasMany(FeatureProgramService::class);
    }

    public function advantage_program_services()
    {
        return $this->hasMany(AdvantageProgramService::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
