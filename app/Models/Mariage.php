<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mariage extends Model
{
    protected $fillable = [
    'nom_epoux', 'nom_epouse', 'date_mariage', 'lieu_mariage', 'telephone',
];
}
