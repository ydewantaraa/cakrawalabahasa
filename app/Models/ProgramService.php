<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Casts\Attribute;
=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
use Illuminate\Database\Eloquent\Model;

class ProgramService extends Model
{
    protected $fillable = [
        'name',
<<<<<<< HEAD
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

=======
        'description'
    ];

>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

<<<<<<< HEAD
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
=======
    public function future_program_services()
    {
        return $this->hasMany(FutureProgramService::class);
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    }
}
