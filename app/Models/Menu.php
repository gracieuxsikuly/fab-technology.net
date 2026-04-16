<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get active menus ordered by order
     */
    public static function getActiveMenus()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
