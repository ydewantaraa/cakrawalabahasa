<?php

namespace App\Services;

use App\Models\Price;

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

        foreach ($learningTypes as $type) {

            $unitType = $data['unit_type'];

            Price::create([
                'course_id' => $data['course_id'],
                'course_service_id' => $data['course_service_id'],
                'sub_course_service_id' => $data['sub_course_service_id'] ?? null,

                'price' => $data['price'],
                'package_size' => $unitType === 'fixed'
                    ? $data['package_size']
                    : null,

                'learning_type' => $type,

                'label_type' => $unitType === 'per_item'
                    ? $data['label_type']
                    : null,

                'unit_type' => $unitType,

                'hasQuantity' => $unitType === 'per_item',
            ]);
        }
    }

    public function update(Price $price, array $data): void
    {
        $learningTypes = $data['learning_type'] ?? [null];

        // Karena store bisa membuat beberapa record untuk tiap learning_type,
        // update di sini hanya mengubah record yang diberikan $price.
        foreach ($learningTypes as $type) {

            $unitType = $data['unit_type'];

            $price->update([
                'course_id' => $data['course_id'],
                'course_service_id' => $data['course_service_id'],
                'sub_course_service_id' => $data['sub_course_service_id'] ?? null,

                'price' => $data['price'],
                'package_size' => $unitType === 'fixed'
                    ? $data['package_size']
                    : null,

                'learning_type' => $type,

                'label_type' => $unitType === 'per_item'
                    ? $data['label_type']
                    : null,

                'unit_type' => $unitType,

                'hasQuantity' => $unitType === 'per_item',
            ]);
        }
    }

    public function delete(Price $price): void
    {
        $price->delete();
    }
}
