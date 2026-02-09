<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramService\StoreRequest;
use App\Http\Requests\ProgramService\UpdateRequest;
use App\Models\ProgramService;
use App\Services\ProgramServiceService;
use Illuminate\Http\Request;

class ProgramServiceController extends Controller
{
    public function index()
    {
        $programServices = ProgramService::latest()->get();

        return view('admin.program-services.index', compact('programServices'));
    }
    public function store(
        StoreRequest $request,
        ProgramServiceService $service
    ) {
        $service->store($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Program service berhasil ditambahkan');
    }

    public function update(
        UpdateRequest $request,
        ProgramService $programService,
        ProgramServiceService $service
    ) {
        $service->update($programService, $request->validated());

        return redirect()
            ->back()
            ->with('success', 'Program service berhasil diperbarui');
    }

    public function destroy(ProgramService $programService)
    {
        $programService->delete();

        return redirect()
            ->back()
            ->with('success', 'Program service berhasil dihapus');
    }

    public function create()
    {
        return view('admin.program-services.create');
    }

    public function edit(ProgramService $programService)
    {
        return view('program-services.edit', compact('programService'));
    }
}
