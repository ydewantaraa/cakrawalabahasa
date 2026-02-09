<?php

namespace App\Services;

use App\Models\ProgramService;
use Illuminate\Support\Str;

class ProgramServiceService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}
    public function store(array $data): ProgramService
    {
        $data['slug'] = Str::slug($data['name']);

        return ProgramService::create($data);
    }

    public function update(ProgramService $programService, array $data): ProgramService
    {
        if (array_key_exists('name', $data)) {
            $data['slug'] = Str::slug($data['name']);
        }

        $programService->update($data);

        return $programService;
    }
}
