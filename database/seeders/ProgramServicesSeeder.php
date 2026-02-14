<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProgramServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'name' => 'CB For Kids',
                'description' => 'Program khusus untuk anak-anak belajar bahasa secara interaktif.',
                'show_in_dropdown' => true,
                'slug' => Str::slug('CB For Kids'),
                'hero_text' => 'Belajar seru untuk anak-anak!',
                'hero_image' => 'images/programs/cb_for_kids.png',
            ],
            [
                'name' => 'CB For You',
                'description' => 'Program untuk remaja meningkatkan kemampuan bahasa.',
                'show_in_dropdown' => true,
                'slug' => Str::slug('CB Teen'),
                'hero_text' => 'Bahasa Inggris untuk remaja!',
                'hero_image' => 'images/programs/cb_teen.png',
            ],
            [
                'name' => 'CB Extras',
                'description' => 'Program untuk dewasa belajar bahasa profesional.',
                'show_in_dropdown' => true,
                'slug' => Str::slug('CB Adults'),
                'hero_text' => 'Belajar bahasa untuk karier dan profesional!',
                'hero_image' => 'images/programs/cb_adults.png',
            ],
        ];

        foreach ($programs as $program) {
            $programId = DB::table('program_services')->insertGetId(array_merge($program, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));

            // Tambahkan features
            DB::table('feature_program_services')->insert([
                [
                    'program_service_id' => $programId,
                    'title' => 'Fitur Utama 1',
                    'description' => 'Deskripsi fitur utama pertama',
                    'thumbnail' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'program_service_id' => $programId,
                    'title' => 'Fitur Utama 2',
                    'description' => 'Deskripsi fitur utama kedua',
                    'thumbnail' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            // Tambahkan advantages
            DB::table('advantage_program_services')->insert([
                [
                    'program_service_id' => $programId,
                    'title' => 'Keunggulan 1',
                    'description' => 'Deskripsi keunggulan pertama',
                    'thumbnail' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'program_service_id' => $programId,
                    'title' => 'Keunggulan 2',
                    'description' => 'Deskripsi keunggulan kedua',
                    'thumbnail' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
