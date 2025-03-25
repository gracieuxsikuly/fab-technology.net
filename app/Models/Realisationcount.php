<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisationcount extends Model
{
    protected $fillable = [
        'designation',
        'nombre',
    ];
    public static function getDesigantionOptions()
    {
        return [
            'Clients' => 'Clients',
            'Projets' => 'Projets',
            'Support' => 'Support',
            'Équipe' => 'Équipe',
        ];
    }
}
