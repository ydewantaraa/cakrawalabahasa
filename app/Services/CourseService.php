<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        return Course::all();
    }

    public function find(int $id): Course
    {
        return Course::findOrFail($id);
    }

    // public function create(array $data): Course
    // {
    //     if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {
    //         $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
    //     }

    //     return Course::create([
    //         'name' => $data['name'],
    //         'description' => $data['description'],
    //         'slug' => Str::slug($data['name']),
    //         'category' => $data['category'],
    //         'quota' => $data['quota'],
    //         'duration' => $data['duration'],
    //         'thumbnail' => $data['thumbnail'] ?? null,
    //         'program_service_id' => $data['program_service_id'] ?? null,
    //     ]);
    // }

    public function create(array $data): Course
    {
        DB::beginTransaction();

        try {
            if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {
                $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
            }
            $baseSlug = Str::slug($data['name']);
            $slug = $baseSlug;
            $counter = 1;

            while (Course::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }
            $course = Course::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'slug' => $slug,
                'category' => $data['category'],
                'quota' => $data['quota'],
                'duration' => $data['duration'],
                'explanation' => $data['explanation'] ?? null,
                'shopee_link' => $data['shopee_link'] ?? null,
                'thumbnail' => $data['thumbnail'] ?? null,
                'isActive' => $data['isActive'] ?? 0,
                'hasTeacher' => $data['hasTeacher'] ?? 0,
                'program_service_id' => $data['program_service_id'] ?? null,
            ]);

            // SIMPAN FACILITIES
            if (!empty($data['facilities'])) {

                $facilities = explode(',', $data['facilities']);

                $facilities = array_map(fn($item) => trim($item), $facilities);
                $facilities = array_filter($facilities);

                foreach ($facilities as $facility) {
                    $course->course_facilities()->create([
                        'name' => $facility
                    ]);
                }
            }

            DB::commit();
            return $course;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Course $course, array $data): Course
    {
        DB::beginTransaction();

        try {
            if (array_key_exists('name', $data)) {
                $baseSlug = Str::slug($data['name']);
                $slug = $baseSlug;
                $counter = 1;

                while (
                    Course::where('slug', $slug)
                    ->where('id', '!=', $course->id)
                    ->exists()
                ) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $data['slug'] = $slug;
            }

            if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {

                $oldThumbnail = $course->getRawOriginal('thumbnail');

                if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                    Storage::disk('public')->delete($oldThumbnail);
                }

                $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
            }

            // Update course dulu
            $course->update($data);

            // Update facilities
            if (isset($data['facilities'])) {

                $course->course_facilities()->delete();

                $facilities = explode(',', $data['facilities']);
                $facilities = array_map(fn($item) => trim($item), $facilities);
                $facilities = array_filter($facilities);

                foreach ($facilities as $facility) {
                    $course->course_facilities()->create([
                        'name' => $facility
                    ]);
                }
            }

            DB::commit();
            return $course;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Course $course): bool
    {
        // Hapus thumbnail lama jika ada
        $thumbnail = $course->getRawOriginal('thumbnail');
        if ($thumbnail) {
            Storage::disk('public')->delete($thumbnail);
        }

        return $course->delete();
    }
}
