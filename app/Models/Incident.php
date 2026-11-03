<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class incident extends Model
{
     /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'=>'integer',
            'ward_id' => 'integer',
            'category_id' => 'integer',
            'reference_number'=>'integer',
            'is_public' => 'datetime',
            'reported_at' => 'timestamp',
            'easting'=>'',
            'northing'=>''

        ];
    }
}
