<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SocialLink extends Model
{
    protected $table = 'social_links';

    protected $fillable = [
        'platform',
        'url',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get active social links ordered by order - cached for 24 hours
     */
    public static function getActiveSocialLinks()
    {
        return Cache::remember('social_links.active', 60 * 60 * 24, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    /**
     * Clear the social links cache
     */
    public static function clearCache()
    {
        Cache::forget('social_links.active');
    }
}
