<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
   use HasFactory;

    // Les attributs qui sont autorises pour l'assignation de masse
    protected $fillable = [
        'title',
        'description',
        'photo',
        'date_event',
        'type',
    ];

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    // 🔥 cover automatique
    public function getCoverAttribute()
    {
        return $this->media()->latest()->first();
    }
}
