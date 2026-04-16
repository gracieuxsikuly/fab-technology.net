<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get active sliders ordered by order (max 3)
     */
    public static function getActiveSliders()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->limit(3)
            ->get();
    }
}
