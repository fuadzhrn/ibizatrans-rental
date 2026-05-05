<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeServiceHighlight extends Model
{
    protected $table = 'home_service_highlights';

    protected $fillable = [
        'service_key',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_highlighted',
    ];

    protected $casts = [
        'is_highlighted' => 'boolean',
    ];
}
