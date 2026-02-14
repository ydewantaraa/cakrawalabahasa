<?php

namespace App\Http\Requests\ProgramService;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:program_services,name',
            'description' => 'required|string',
            'show_in_dropdown' => 'sometimes|boolean',
            'hero_text' => 'required|string',
            'hero_image' => 'nullable|image',
            'image_service' => 'nullable|image',
            'features' => 'nullable|array',
            'features.*.title' => 'required|string|max:255',
            'features.*.description' => 'required|string',
            'features.*.thumbnail' => 'nullable|image',
            'advantages' => 'nullable|array',
            'advantages.*.title' => 'required|string|max:255',
            'advantages.*.description' => 'required|string',
            'advantages.*.thumbnail' => 'nullable|image',
        ];
    }
}
