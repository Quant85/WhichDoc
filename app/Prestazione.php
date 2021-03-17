<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestazione extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'tipo',
        'prezzo',
        'descrizione',
        'disabilità'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
