<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    public function getImagePathAttribute()
    {
        return storage_path('app/public/' . $this->image);
    }
}
