<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehiclePrice extends Model
{
    protected $fillable = [
        'vehicle_id',
        'vehicle_name',
        'self_drive_per_day_price',
        'self_drive_24h_price',
        'driver_price',
        'driver_note',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'vehicle_id' => 'integer',
        'self_drive_per_day_price' => 'integer',
        'self_drive_24h_price' => 'integer',
        'driver_price' => 'integer',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
