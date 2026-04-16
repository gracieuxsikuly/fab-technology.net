<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
        'site_description',
        'logo',
        'favicon',
        'email',
        'phone',
        'metadata_description',
        'metadata_keywords',
    ];

    /**
     * Get the first/single site setting record - cached for 24 hours
     */
    public static function getSetting()
    {
        return Cache::remember('site_setting', 60 * 60 * 24, function () {
            return self::first() ?? self::create([
                'site_name' => 'Fab-Technology',
                'site_description' => 'Entreprise de services informatiques',
            ]);
        });
    }

    /**
     * Clear the site setting cache
     */
    public static function clearCache()
    {
        Cache::forget('site_setting');
    }
}
