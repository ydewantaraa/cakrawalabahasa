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
    // public function index(Request $request)
    // {
    //     $search = $request->query('search');

    //     $query = ProgramService::query();

    //     if ($search) {
    //         $query->where('name', 'like', "%{$search}%")
    //             ->orWhere('description', 'like', "%{$search}%");
    //     }

    //     $programServices = $query->orderBy('created_at', 'desc')
    //         ->paginate(10)  // PENTING: paginate() tanpa get()
    //         ->withQueryString();

    //     dd(get_class($programServices)); // HARUSNYA: Illuminate\Pagination\LengthAwarePaginator

    //     // return view('test', compact('programServices', 'search'));
    //     return view('admin.program-services.index', compact('programServices', 'search'));
    // }

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
}
