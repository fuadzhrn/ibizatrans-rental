<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','badge','destination_summary','short_description','description','highlight','image','starting_price','duration_label','whatsapp_text','sort_order','is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function destinations()
    {
        return $this->hasMany(TourDestination::class)->orderBy('sort_order');
    }

    public function prices()
    {
        return $this->hasMany(TourPrice::class)->orderBy('sort_order');
    }

    public function facilities()
    {
        return $this->hasMany(TourFacility::class)->orderBy('sort_order');
    }

    public function itineraries()
    {
        return $this->hasMany(TourItinerary::class)->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
