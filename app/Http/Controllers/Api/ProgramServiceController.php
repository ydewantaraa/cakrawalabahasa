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

    // Ambil semua program services
    public function index(ProgramServiceService $service)
    {
        $programServices = $service->all(); // method di service

        return response()->json([
            'success' => true,
            'data' => $programServices,
        ]);
    }

    public function store(
        StoreRequest $request,
        ProgramServiceService $service
    ) {
        $data = $request->validated();

        // Ambil file langsung dari request
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image');
        }

        if ($request->hasFile('image_service')) {
            $data['image_service'] = $request->file('image_service');
        }

        $programService = $service->store($data);


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
        $data = $request->validated();

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image');
        }

        if ($request->hasFile('image_service')) {
            $data['image_service'] = $request->file('image_service');
        }

        $programService = $service->update($programService, $data);

        return response()->json([
            'success' => true,
            'message' => 'Program service berhasil diperbarui',
            'data' => $programService,
        ]);
    }


    public function destroy(ProgramService $programService, ProgramServiceService $service)
    {
        $service->destroy($programService);

        return response()->json([
            'success' => true,
            'message' => 'Program service berhasil dihapus',
        ]);
    }
}
