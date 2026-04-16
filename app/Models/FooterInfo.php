<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get active footer infos ordered by order
     */
    public static function getActiveFooterInfos()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
