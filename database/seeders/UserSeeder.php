<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =====================
        // ADMIN UTAMA
        // =====================
        User::create([
            'full_name' => 'Super Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // =====================
        // ADMIN LAIN
        // =====================
        User::create([
            'full_name' => 'Admin Kedua',
            'email' => 'admin2@demo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // =====================
        // TEACHER
        // =====================
        User::create([
            'full_name' => 'Guru Matematika',
            'email' => 'iklimamardiana@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'teacher',
            'email_verified_at' => now(),
        ]);

        // =====================
        // STUDENT
        // =====================
        User::create([
            'full_name' => 'Siswa Pertama',
            'email' => 'iklimardiana911@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'student',
            'email_verified_at' => now(),
            // kalau mau simulasi belum verifikasi:
            // 'email_verified_at' => null,
        ]);
    }
}
