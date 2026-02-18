<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FutureProgramService extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'program_service_id',
        'show_in_dropdown'
    ];

    public function program_service()
    {
        return $this->belongsTo(ProgramService::class);
    }
}
