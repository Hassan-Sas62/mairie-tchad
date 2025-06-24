<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Naissance extends Model
{
    protected $fillable = [
    'nom', 'prenom', 'date_naissance', 'lieu_naissance',
    'nom_pere', 'nom_mere', 'telephone'
];
}
