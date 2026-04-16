<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class FooterInfo extends Model
{
    protected $table = 'footer_infos';

    protected $fillable = [
        'description',
        'address',
        'email',
        'phone',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get active footer infos ordered by order - cached for 24 hours
     */
    public static function getActiveFooterInfos()
    {
        return Cache::remember('footer_infos.active', 60 * 60 * 24, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    /**
     * Clear the footer infos cache
     */
    public static function clearCache()
    {
        Cache::forget('footer_infos.active');
    }
}
