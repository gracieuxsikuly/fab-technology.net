<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'url',
        'url_en',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the menu name based on current locale
     */
    public function getDisplayName()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && $this->name_en) {
            return $this->name_en;
        }
        
        return $this->name;
    }

    /**
     * Get the menu URL based on current locale
     */
    public function getDisplayUrl()
    {
        $locale = app()->getLocale();
        
        if ($locale === 'en' && $this->url_en) {
            return $this->url_en;
        }
        
        return $this->url;
    }

    /**
     * Get active menus ordered by order (cached for 24 hours)
     */
    public static function getActiveMenus()
    {
        return Cache::remember('menus.active', 60 * 60 * 24, function () {
            return self::where('is_active', true)
                ->orderBy('order')
                ->get();
        });
    }

    /**
     * Clear the menus cache
     */
    public static function clearCache()
    {
        Cache::forget('menus.active');
    }
}
