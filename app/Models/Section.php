<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    // Les attributs qui sont autorises pour l'assignation de masse
    protected $fillable = [
        'nom',
        'type',
    ];
}
