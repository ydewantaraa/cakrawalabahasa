<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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

        return Course::create($data);
    }

    public function update(Course $course, array $data): Course
    {
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {

            // Ambil path mentah dari DB
            $oldThumbnail = $course->getRawOriginal('thumbnail');

            if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                $deleted = Storage::disk('public')->delete($oldThumbnail);
            }

            // Simpan file baru
            $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
        }

        $course->update($data);

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
