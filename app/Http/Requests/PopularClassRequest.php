<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PopularClassRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'course_id' => 'required|exists:courses,id|unique:popular_classes,course_id',
            'price' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'descriptions' => 'required|array|min:1',
            'descriptions.*' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'course_id.required' => 'Kelas wajib dipilih.',
            'course_id.exists' => 'Kelas tidak valid.',
            'course_id.unique' => 'Kelas ini sudah terdaftar sebagai Popular Class.',
            'price.required' => 'Harga wajib diisi.',
            'price.required' => 'Durasi wajib diisi.',
            'descriptions.required' => 'Minimal satu deskripsi harus diisi.',
        ];
    }
}
