<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'titre', 'description', 'prix', 'localisation', 'surface',
        'nombre_chambres', 'nombre_salles_de_bain', 'type', 'photos',
    ];

    protected $casts = [
        'photos' => 'array',
    ];
}
