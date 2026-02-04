<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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

    public function teacher_profiles()
    {
        return $this->hasOne(TeacherProfile::class);
    }

    public function student_profiles()
    {
        return $this->hasOne(StudentProfile::class);
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
