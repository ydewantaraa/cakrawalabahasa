<?php

namespace App\Services;

use App\Models\Course;
use App\Models\IncomingCourse;
use Exception;

class IncomingCourseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAll()
    {
        return IncomingCourse::with('course')
            ->orderBy('incoming_date')
            ->get();
    }

    public function getById(IncomingCourse $incomingCourse)
    {
        return $incomingCourse->load('course');
    }

    public function store(array $data): IncomingCourse
    {
        $course = Course::findOrFail($data['course_id']);

        if ($course->isActive) {
            throw new Exception('Course aktif tidak boleh memiliki incoming class.');
        }

        return IncomingCourse::create($data);
    }

    public function update(IncomingCourse $incomingCourse, array $data): IncomingCourse
    {
        $incomingCourse->update($data);
        return $incomingCourse;
    }

    public function delete(IncomingCourse $incomingCourse): void
    {
        $incomingCourse->delete();
    }
}
