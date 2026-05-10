<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    // Les attributs qui sont autorises pour l'assignation de masse
    protected $fillable = [
        'nom',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'adresse',
        'profession',
        'telephone',
        'photo',
        'status',
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
