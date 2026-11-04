<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incident extends Model
{
     /** @use HasFactory<IncidentFactory> */
    use HasFactory, HasUuids;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $fillable = [
        'id',
        'ward_id',
        'category_id',
        'reference_number',
        'is_public',
        'reported_at',
        'easting',
        'northing',
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
            'reported_at' => 'datetime',
            'easting'=>'float',
            'northing'=>'float',

        ];
    }

    public function ward(): BelongsTo
    {
        return $this->belongsTo(Ward::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
