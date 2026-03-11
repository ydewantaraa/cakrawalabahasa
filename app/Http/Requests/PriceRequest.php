<?php

namespace App\Http\Requests;

use App\Models\Price;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\SubCourseService;
use Illuminate\Validation\Rule;

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
        $courseServiceId = null;

        // 🔹 Jika UPDATE (punya route price)
        if ($this->route('price')) {

            $priceParam = $this->route('price');

            // Kalau pakai route model binding
            if ($priceParam instanceof Price) {
                $courseServiceId = $priceParam->course_service_id;
            }
            // Kalau belum pakai binding (hanya ID)
            else {
                $priceModel = Price::find($priceParam);
                $courseServiceId = optional($priceModel)->course_service_id;
            }
        }

        // 🔹 Jika STORE nested
        elseif ($this->route('courseService')) {
            $courseServiceId = $this->route('courseService');
        }

        // 🔹 Jika STORE non-nested (web)
        else {
            $courseServiceId = $this->input('course_service_id');
        }

        return [
            'course_service_id' => [
                $this->isMethod('post') && !$this->route('courseService')
                    ? 'required'
                    : 'nullable',
                'exists:course_services,id'
            ],

            'sub_course_service_id' => [
                'nullable',
                Rule::exists('sub_course_services', 'id')
                    ->where(
                        fn($q) =>
                        $q->where('course_service_id', $courseServiceId)
                    ),
            ],

            'price' => 'required|numeric|min:0',
            'package_size' => 'nullable|string|max:255',
            'learning_type' => 'nullable|array',
            'learning_type.*' => 'in:online,offline,hybrid',
            'label_type' => 'nullable|string|max:255',
            'unit_type' => 'nullable|string|max:255',
        ];
    }
}
