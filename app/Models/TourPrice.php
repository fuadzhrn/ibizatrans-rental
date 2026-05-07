<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model
{
    use HasFactory;

    protected $fillable = ['tour_package_id','pax_label','price','sort_order'];

    public function tourPackage()
    {
        return $this->belongsTo(TourPackage::class);
    }
}
