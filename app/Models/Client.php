<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'denomination',
        'phone',
        'image',
    ];

    public function getImagePathAttribute()
    {
        return storage_path('app/public/' . $this->image);
    }
}
