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
            'sub_description_title' => 'nullable|string|max:255',
            'sub_description' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'quota' => 'required|integer|min:1',
            'duration' => 'required|integer|min:1',
            'learning_types' => 'required|array',
            'learning_types.*.type' => 'sometimes|string',
            'learning_types.*.price' => 'nullable|numeric|min:0',
            'thumbnail' => $isCreate
                ? 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // wajib saat create
                : 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional saat update
            'program_service_id' => 'nullable|exists:program_services,id',
        ];
    }
}
