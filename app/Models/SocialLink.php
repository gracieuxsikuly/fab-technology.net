<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get active social links ordered by order
     */
    public static function getActiveSocialLinks()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
