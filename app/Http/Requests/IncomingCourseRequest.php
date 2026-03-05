<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IncomingCourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'course_id' => [
                'required',
                Rule::exists('courses', 'id')
                    ->where(
                        fn($query) =>
                        $query->where('isActive', false)
                    ),
                Rule::unique('incoming_courses', 'course_id')
                    ->ignore($this->incomingCourse?->id),
            ],
            'incoming_date' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'description' => 'nullable|string|max:255',
            'sub_description' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Course wajib dipilih.',
            'course_id.exists' => 'Course tidak ditemukan.',
            'course_id.unique' => 'Course sudah dipilih / sudah masuk Incoming Course.',
            'incoming_date.required' => 'Tanggal wajib diisi.',
            'incoming_date.after_or_equal' => 'Tanggal tidak boleh di masa lalu.',
        ];
    }
}
