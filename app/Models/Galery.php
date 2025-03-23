<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public function getImagePathAttribute()
    {
        return storage_path('app/public/' . $this->image);
    }
}
