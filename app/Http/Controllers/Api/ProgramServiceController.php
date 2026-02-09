<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramService\StoreRequest;
use App\Http\Requests\ProgramService\UpdateRequest;
use App\Models\ProgramService;
use App\Services\ProgramServiceService;
use Illuminate\Http\Request;

class ProgramServiceController extends Controller
{
    public function store(
        StoreRequest $request,
        ProgramServiceService $service
    ) {
        $programService = $service->store($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Program service berhasil dibuat',
            'data' => $programService,
        ], 201);
    }

    public function update(
        UpdateRequest $request,
        ProgramService $programService,
        ProgramServiceService $service
    ) {
        $programService = $service->update($programService, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Program service berhasil diperbarui',
            'data' => $programService,
        ]);
    }

    public function destroy(ProgramService $programService)
    {
        $programService->delete();

        return response()->json([
            'success' => true,
            'message' => 'Program service berhasil dihapus',
        ]);
    }
}
