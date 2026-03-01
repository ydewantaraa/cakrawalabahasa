<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PopularClassRequest;
use App\Models\PopularClass;
use App\Services\PopularClassService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PopularClassController extends Controller
{
    protected PopularClassService $service;

    public function __construct(PopularClassService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $popularClasses = $this->service->getPaginated();

        return response()->json([
            'success' => true,
            'message' => 'List Popular Classes',
            'data' => $popularClasses
        ]);
    }

    public function store(PopularClassRequest $request): JsonResponse
    {
        $popularClass = $this->service->store($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Berhasil ditambahkan',
            'data' => $popularClass
        ], 201);
    }

    public function show(PopularClass $popularClass): JsonResponse
    {
        $popularClass->load(['course', 'descriptions']);

        return response()->json([
            'success' => true,
            'data' => $popularClass
        ]);
    }

    public function update(PopularClassRequest $request, PopularClass $popularClass): JsonResponse
    {
        $updated = $this->service->update($popularClass, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Berhasil diperbarui',
            'data' => $updated
        ]);
    }

    public function destroy(PopularClass $popularClass): JsonResponse
    {
        $this->service->delete($popularClass);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil dihapus'
        ]);
    }
}
