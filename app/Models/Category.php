<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
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
            'name'=>'string'

        ];
    }
}
