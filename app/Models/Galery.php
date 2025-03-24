<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'title',
        'image',
        'categori'
    ];

    public function getImagePathAttribute()
    {
        return storage_path('/assets/img/galery' . $this->image);
    }
    // charger ca pour un select
    public static function getCategoriOptions()
    {
        return [
            'tous' => 'Tous',
            'terrain' => 'Terrain',
            'attelier' => 'Attelier',
            'service' => 'Service',
            'installation' => 'Installation',
            'programmation' => 'Programmation',
        ];
    }
}
