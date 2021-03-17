<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected $fillable = [
        'user_id',
        'nome_paziente',
        'testo_messaggio',
        'email',
        'cellulare',
        'disabilità',
    ];
}
