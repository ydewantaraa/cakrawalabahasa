<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isCreate = $this->isMethod('post');

        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'isActive' => 'sometimes|boolean',
            'hasTeacher' => 'sometimes|boolean',
            'category' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
            'duration' => 'required|string|max:20',
            'explanation' => 'nullable|string',
            'thumbnail' => $isCreate
                ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // wajib saat create
                : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional saat update
            'program_service_id' => 'nullable|exists:program_services,id',
            'facilities' => 'nullable|string'
        ];
    }
}
