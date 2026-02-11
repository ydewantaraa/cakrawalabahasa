<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class TeacherService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllTeachers(): Collection
    {
        return User::with('teacher_profile')
            ->where('role', 'teacher')
            ->orderBy('full_name')
            ->get();
    }

    public function create(array $data): array
    {
        return DB::transaction(function () use ($data) {

            // Ambil kata pertama dari nama
            $firstName = Str::of($data['full_name'])
                ->lower()
                ->explode(' ')
                ->first();

            // Generate password
            $plainPassword = $firstName . Str::random(4);

            // Buat teacher
            $user = User::create([
                'full_name' => $data['full_name'],
                'email'     => $data['email'],
                'password'  => Hash::make($plainPassword),
                'role'      => 'teacher',
                'email_verified_at' => now()
            ]);

            // Buat teacher profile
            $user->teacher_profile()->create([
                'whatsapp' => $data['whatsapp'],
                'position' => $data['position'],
                'initial_password' => $plainPassword,
            ]);

            $user->load('teacher_profile');

            return [
                'user'     => $user,
                'password' => $plainPassword,
            ];
        });
    }

    public function updateTeacher(User $teacher, string $position): void
    {
        if ($teacher->role !== 'teacher') {
            throw new ModelNotFoundException('Teacher tidak ditemukan');
        }

        if (! $teacher->teacher_profile) {
            $teacher->teacher_profile()->create([
                'position' => $position,
                'whatsapp' => "+62",
            ]);
        } else {
            $teacher->teacher_profile()->update([
                'position' => $position,
            ]);
        }
    }


    public function delete(User $teacher): void
    {
        if ($teacher->role !== 'teacher') {
            throw new ModelNotFoundException('Teacher tidak ditemukan');
        }

        $teacher->delete();
    }
}
