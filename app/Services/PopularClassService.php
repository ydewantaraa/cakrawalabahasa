<?php

namespace App\Services;

use App\Models\PopularClass;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PopularClassService
{
    /*
    |--------------------------------------------------------------------------
    | GET ALL (PAGINATED)
    |--------------------------------------------------------------------------
    */
    public function getPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return PopularClass::with(['course', 'descriptions'])
            ->latest()
            ->paginate($perPage);
    }

    /*
    |--------------------------------------------------------------------------
    | FIND BY ID
    |--------------------------------------------------------------------------
    */
    public function findById(int $id): ?PopularClass
    {
        return PopularClass::with(['course', 'descriptions'])
            ->find($id);
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(array $data): PopularClass
    {
        return DB::transaction(function () use ($data) {

            $popularClass = PopularClass::create([
                'course_id' => $data['course_id'],
                'price' => $data['price'],
                'duration' => $data['duration'],
            ]);

            foreach ($data['descriptions'] as $description) {
                $popularClass->descriptions()->create([
                    'description' => $description
                ]);
            }

            return $popularClass->load(['course', 'descriptions']);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(PopularClass $popularClass, array $data): PopularClass
    {
        return DB::transaction(function () use ($popularClass, $data) {

            $popularClass->update([
                'course_id' => $data['course_id'],
                'price' => $data['price'],
                'duration' => $data['duration'],
            ]);

            // Hapus deskripsi lama
            $popularClass->descriptions()->delete();

            // Insert ulang
            foreach ($data['descriptions'] as $description) {
                $popularClass->descriptions()->create([
                    'description' => $description
                ]);
            }

            return $popularClass->load(['course', 'descriptions']);
        });
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function delete(PopularClass $popularClass): void
    {
        DB::transaction(function () use ($popularClass) {

            // Hapus semua deskripsi dulu
            $popularClass->descriptions()->delete();

            // Hapus parent
            $popularClass->delete();
        });
    }
}
