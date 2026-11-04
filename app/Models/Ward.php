<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illumintate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Ward extends Model
{
     /** @use HasFactory<WardFactory> */
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'slug'];
   
    protected static function booted(): void
    {
        static::creating(function (Ward $ward){
            $ward->slug ??=Str::slug($ward->name);
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(Incident::class);
    }

    public function publicIncidents(): HasMany
    {
        return $this->incidents()->where('is_public', true);
    }
}
