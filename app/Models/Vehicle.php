<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    protected $fillable = [
        'vehicle_type',
        'name',
        'category',
        'image',
        'description',
        'seats',
        'transmission',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'seats' => 'integer',
        'sort_order' => 'integer',
    ];

    public function prices(): HasMany
    {
        return $this->hasMany(VehiclePrice::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeCars(Builder $query): Builder
    {
        return $query->where('vehicle_type', 'car');
    }

    public function scopeMotors(Builder $query): Builder
    {
        return $query->where('vehicle_type', 'motor');
    }
}
