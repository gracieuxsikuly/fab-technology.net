<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Get the first/single site setting record.
     */
    public static function getSetting()
    {
        return self::first() ?? self::create([
            'site_name' => 'Fab-Technology',
            'site_description' => 'Entreprise de services informatiques',
        ]);
    }
}
