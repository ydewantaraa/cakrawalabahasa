<?php

namespace App\Http\Requests\ProgramService;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255|unique:program_services,name,' . $this->programService->id,
            'description' => 'sometimes|required|string',
            'show_in_dropdown' => 'sometimes|boolean',
        ];
    }
}
