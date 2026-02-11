<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'email_verified_at',
        'role',
        'google_id',
        'avatar'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value
                ? (filter_var($value, FILTER_VALIDATE_URL)
                    ? $value                 // external URL
                    : url('storage/' . $value)) // storage link
                : asset('img/default-avatar.png')   // default
        );
    }

    public function teacher_profile()
    {
        return $this->hasOne(TeacherProfile::class, 'teacher_id');
    }

    public function student_profiles()
    {
        return $this->hasOne(StudentProfile::class, 'student_id', 'id');
    }

    public function enrollments()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id')
            ->withPivot('is_paid', 'paid_at')
            ->withTimestamps();
    }

    public function enrolled_classes()
    {
        return $this->hasMany(ClassEnrollment::class, 'student_id');
    }

    public function teaching_classes()
    {
        return $this->hasMany(ClassEnrollment::class, 'teacher_id');
    }

    public function course_teachers()
    {
        return $this->belongsToMany(
            Course::class,
            'course_teachers',
            'teacher_id',
            'course_id'
        )->withTimestamps();
    }
}
