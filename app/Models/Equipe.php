<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'designation',
        'fonction',
        'phone',
        'email',
        'image',
    ];
    public function getImagePathAttribute()
    {
        return storage_path('app/public/' . $this->image);
    }
}
