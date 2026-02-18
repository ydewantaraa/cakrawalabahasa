<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
<<<<<<< HEAD
        // $this->call(ProgramServicesSeeder::class);
=======
>>>>>>> 6d7dd8f8aefc7d42a2061548f00c21b62dff71ef
    }
}
