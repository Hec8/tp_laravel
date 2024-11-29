<?php

namespace App\Models;
use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'date_limite',
        'status',
        'id'
    ];

    public function taches()
    {
        return $this->hasMany(Tache::class, 'id_projet'); 
    }
}
