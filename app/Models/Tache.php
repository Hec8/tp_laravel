<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'statut',
        'priorite',
        'id_projet'
    ];

    public function projets()
    {
        return $this->belongsTo(Projet::class, 'id_projet'); 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id'); 
    }
}
