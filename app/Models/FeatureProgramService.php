<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeatureProgramService extends Model
{
    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'program_service_id',
    ];

    protected function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value
                ? asset('storage/' . $value)
                : asset('img/default-thumbnail-feature.png')
        );
    }

    public function program_service()
    {
        return $this->belongsTo(ProgramService::class);
    }
}
