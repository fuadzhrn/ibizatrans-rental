<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $table = 'about_sections';

    protected $fillable = [
        'title',
        'content',
        'featured_image_path',
    ];

    protected $casts = [
        'content' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get paragraphs from content JSON
     */
    public function getParagraphs()
    {
        return $this->content['paragraphs'] ?? [];
    }

    /**
     * Get stats from content JSON
     */
    public function getStats()
    {
        return $this->content['stats'] ?? [];
    }

    /**
     * Get featured image or fallback to random gallery image
     */
    public function getFeaturedImagePath()
    {
        return $this->featured_image_path;
    }
}
