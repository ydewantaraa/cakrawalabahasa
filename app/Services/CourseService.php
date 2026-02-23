<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

    public function create(array $data): Course
    {
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {
            $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
        }

        return Course::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'category' => $data['category'],
            'quota' => $data['quota'],
            'duration' => $data['duration'],
            'thumbnail' => $data['thumbnail'] ?? null,
            'program_service_id' => $data['program_service_id'] ?? null,
        ]);
    }

    public function update(Course $course, array $data): Course
    {
        // Jika upload thumbnail baru
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {

            $oldThumbnail = $course->getRawOriginal('thumbnail');

            if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
        }

        $course->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'category' => $data['category'],
            'quota' => $data['quota'],
            'duration' => $data['duration'],
            'thumbnail' => $data['thumbnail'] ?? $course->thumbnail,
            'program_service_id' => $data['program_service_id'] ?? null,
        ]);

        return $course;
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
