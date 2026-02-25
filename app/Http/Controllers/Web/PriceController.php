<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceRequest;
use App\Models\Course;
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
    public function store(PriceRequest $request)
    {
        $this->service->store($request->validated());

        return back()->with('success', 'Harga berhasil ditambahkan.');
    }

    public function update(
        PriceRequest $request,
        Price $price
    ) {
        $this->service->update(
            $price,
            $request->validated()
        );

        return back()->with('success', 'Sub layanan berhasil diperbarui.');
    }
    public function destroy(Price $price)
    {
        $this->service->delete($price);

        return back()->with('success', 'Harga berhasil dihapus.');
    }
}
