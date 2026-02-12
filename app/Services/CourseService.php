<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;

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
        return DB::transaction(function () use ($data) {

            // Upload thumbnail jika ada
            if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {
                $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
            }

            // Filter learning types yang punya price
            $learningTypes = collect($data['learning_types'] ?? [])
                ->filter(fn($lt) => !empty($lt['price']));

            if ($learningTypes->count() < 1) {
                throw ValidationException::withMessages([
                    'learning_types' => 'Minimal pilih 1 tipe pembelajaran dan isi harganya.'
                ]);
            }

            unset($data['learning_types']);

            $course = Course::create($data);

            foreach ($learningTypes as $type => $lt) {
                $course->learning_types()->create([
                    'type' => $type,
                    'price' => $lt['price'],
                ]);
            }

            return $course;
        });
    }

    public function update(Course $course, array $data): Course
    {
        return DB::transaction(function () use ($course, $data) {

            // Upload thumbnail jika ada
            if (isset($data['thumbnail']) && $data['thumbnail'] instanceof UploadedFile) {

                $oldThumbnail = $course->getRawOriginal('thumbnail');

                if ($oldThumbnail && Storage::disk('public')->exists($oldThumbnail)) {
                    Storage::disk('public')->delete($oldThumbnail);
                }

                $data['thumbnail'] = $data['thumbnail']->store('courses', 'public');
            }

            // Filter learning types yang punya price
            $learningTypes = collect($data['learning_types'] ?? [])
                ->filter(fn($lt) => !empty($lt['price']));

            if ($learningTypes->count() < 1) {
                throw ValidationException::withMessages([
                    'learning_types' => 'Minimal pilih 1 tipe pembelajaran dan isi harganya.'
                ]);
            }

            unset($data['learning_types']);

            $course->update($data);

            // Hapus lama
            $course->learning_types()->delete();

            // Simpan ulang
            foreach ($learningTypes as $type => $lt) {
                $course->learning_types()->create([
                    'type' => $type,
                    'price' => $lt['price'],
                ]);
            }

            return $course;
        });
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
