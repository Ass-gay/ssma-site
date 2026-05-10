<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
     protected $fillable = [
        'type',
        'file',
        'event_id',
        'user_id',
    ];

     public function event()
     {
        return $this->belongsTo(Event::class);
     }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
