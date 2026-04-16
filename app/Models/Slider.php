<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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
     * Get active sliders ordered by order (max 3) - cached for 24 hours
     */
    public static function getActiveSliders()
    {
        return Cache::remember('sliders.active', 60 * 60 * 24, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->limit(3)
                ->get();
        });
    }

    /**
     * Clear the sliders cache
     */
    public static function clearCache()
    {
        Cache::forget('sliders.active');
    }
}
