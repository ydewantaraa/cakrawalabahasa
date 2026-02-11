<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentService
{
    /**
     * Create a new class instance.
     */
    public function getAllStudents(): Collection
    {
        return User::with('student_profile')
            ->where('role', 'student')
            ->orderBy('full_name')
            ->get();
    }

    public function delete(User $student): void
    {
        if ($student->role !== 'student') {
            throw new ModelNotFoundException('Student tidak ditemukan');
        }

        $student->delete();
    }
}
