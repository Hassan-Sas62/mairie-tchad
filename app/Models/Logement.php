<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    protected $fillable = [
    'nom', 'prenom', 'telephone', 'adresse', 'motif',
];
}
