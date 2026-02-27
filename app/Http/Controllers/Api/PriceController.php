<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Models\Price;
use App\Services\PriceService;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    protected PriceService $service;

    public function __construct(PriceService $service)
    {
        $this->service = $service;
    }

    /**
     * GET /api/prices/{price}
     */
    public function show(Price $price)
    {
        return response()->json([
            'success' => true,
            'data' => $price
        ]);
    }

    /**
     * POST /api/prices
     */
    public function store(PriceRequest $request, $courseService)
    {
        $data = $request->validated();

        // Isi course_service_id dari route
        $data['course_service_id'] = $courseService;

        $this->service->store($data);

        return response()->json([
            'success' => true,
            'message' => 'Price berhasil dibuat.',
            'data' => $data
        ]);
    }

    /**
     * PUT /api/prices/{price}
     */
    public function update(PriceRequest $request, Price $price)
    {
        $this->service->update($price, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Price berhasil diperbarui.'
        ]);
    }

    /**
     * DELETE /api/prices/{price}
     */
    public function destroy(Price $price)
    {
        $this->service->delete($price);

        return response()->json([
            'success' => true,
            'message' => 'Price berhasil dihapus.'
        ]);
    }
}
