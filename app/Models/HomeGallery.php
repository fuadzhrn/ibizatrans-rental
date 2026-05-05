<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeGallery extends Model
{
    protected $table = 'home_galleries';

    protected $fillable = [
        'title',
        'image',
        'category',
        'alt_text',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
