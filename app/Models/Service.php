<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'slug'
    ];

    public function getImagePathAttribute()
    {
        return storage_path('app/public/' . $this->image);
    }




}
