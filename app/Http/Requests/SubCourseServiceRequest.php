<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCourseServiceRequest extends FormRequest
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
        ];

        // Hanya saat STORE (POST)
        if ($this->isMethod('post')) {

            // Jika bukan API nested
            if (!$this->route('courseService')) {
                $rules['course_service_id'] = 'required|exists:course_services,id';
            }
        }

        return $rules;
    }
}
