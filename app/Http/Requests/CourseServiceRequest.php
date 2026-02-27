<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable|string',
        ];

        // Hanya saat STORE (POST)
        if ($this->isMethod('post')) {

            // Jika bukan API nested
            if (!$this->route('course')) {
                $rules['course_id'] = 'required|exists:courses,id';
            }
        }

        return $rules;
    }
}
