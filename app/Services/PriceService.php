<?php

namespace App\Services;

use App\Models\CourseService;
use App\Models\Price;
use Illuminate\Validation\ValidationException;

class PriceService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function store(array $data): void
    {
        $learningTypes = $data['learning_type'] ?? [null];

        $courseService = CourseService::findOrFail($data['course_service_id']);
        $courseId = $courseService->course_id;
        $subId = $data['sub_course_service_id'] ?? null;
        $unitType = $data['unit_type'];
        $packageSize = $unitType === 'fixed' ? ($data['package_size'] ?? null) : null;
        $labelType = $unitType === 'per_item' ? ($data['label_type'] ?? null) : null;

        // Ambil semua harga yang sudah ada untuk service/sub-service ini
        $existingPrices = Price::where('course_service_id', $data['course_service_id'])
            ->where('sub_course_service_id', $subId)
            ->where('unit_type', $unitType)
            ->where('package_size', $packageSize)
            ->where('label_type', $labelType)
            ->pluck('learning_type')
            ->toArray();

        // Cek apakah ada learning_type yang duplikat
        $duplicates = array_intersect($learningTypes, $existingPrices);

        if (!empty($duplicates)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'duplicate' => 'Harga dengan learning type ' . implode(', ', $duplicates) . ' sudah ada untuk layanan/sub-layanan ini.'
            ]);
        }

        // Buat record baru
        foreach ($learningTypes as $type) {
            Price::create([
                'course_id' => $courseId,
                'course_service_id' => $data['course_service_id'],
                'sub_course_service_id' => $subId,
                'price' => $data['price'],
                'package_size' => $packageSize,
                'learning_type' => $type,
                'label_type' => $labelType,
                'unit_type' => $unitType,
                'hasQuantity' => $unitType === 'per_item',
            ]);
        }
    }

    public function update(Price $price, array $data): void
    {
        $learningTypes = $data['learning_type'] ?? [null];

        // Ambil course_service_id dari record yang sedang diupdate
        $courseServiceId = $price->course_service_id;
        $courseService = CourseService::findOrFail($courseServiceId);
        $courseId = $courseService->course_id;
        $subId = $data['sub_course_service_id'] ?? null;
        $unitType = $data['unit_type'];
        $packageSize = $unitType === 'fixed' ? ($data['package_size'] ?? null) : null;
        $labelType = $unitType === 'per_item' ? ($data['label_type'] ?? null) : null;

        // Ambil semua harga yang sudah ada untuk service/sub-service ini kecuali record ini
        $existingPrices = Price::where('course_service_id', $courseServiceId)
            ->where('sub_course_service_id', $subId)
            ->where('unit_type', $unitType)
            ->where('package_size', $packageSize)
            ->where('label_type', $labelType)
            ->where('id', '<>', $price->id)
            ->pluck('learning_type')
            ->toArray();

        // dd([
        //     'price_id' => $price->id,
        //     'course_service_id' => $courseServiceId,
        //     'course_id_from_service' => $courseId,
        //     'sub_id' => $subId,
        //     'unit_type' => $unitType,
        //     'package_size' => $packageSize,
        //     'label_type' => $labelType,
        //     'learningTypes_input' => $learningTypes,
        //     'existingPrices' => $existingPrices,
        // ]);

        // Cek apakah ada learning_type yang duplikat
        $duplicates = array_intersect($learningTypes, $existingPrices);

        if (!empty($duplicates)) {
            throw ValidationException::withMessages([
                'duplicate' => 'Harga dengan learning type ' . implode(', ', $duplicates) . ' sudah ada untuk layanan/sub-layanan ini.'
            ]);
        }

        // Update record
        $price->update([
            'course_id' => $courseId,
            'course_service_id' => $courseServiceId,
            'sub_course_service_id' => $subId,
            'price' => $data['price'],
            'package_size' => $packageSize,
            'learning_type' => $learningTypes[0] ?? null, // tetap update ke learning_type pertama
            'label_type' => $labelType,
            'unit_type' => $unitType,
            'hasQuantity' => $unitType === 'per_item',
        ]);
    }


    public function delete(Price $price): void
    {
        $price->delete();
    }
}
