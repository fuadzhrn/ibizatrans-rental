<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourItinerary extends Model
{
    use HasFactory;

    protected $fillable = ['tour_package_id','time_label','activity','sort_order'];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
}
