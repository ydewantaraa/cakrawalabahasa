<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
        return [
            'course_id' => 'required|exists:courses,id',
            'course_service_id' => 'required|exists:course_services,id',
            'sub_course_service_id' => 'nullable|exists:sub_course_services,id',

            'price' => 'required|numeric|min:0',
            'package_size' => 'nullable|string|max:255',

            'learning_type' => 'nullable|array',
            'learning_type.*' => 'in:online,offline,hybrid',

            'label_type' => 'nullable|string|max:255',
            'unit_type' => 'required|string|max:255',
        ];
    }
}
