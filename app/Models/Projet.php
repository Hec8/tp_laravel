<?php

namespace App\Models;
use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    //
    // Spécifiez la clé primaire
    protected $primaryKey = 'id_projet';

    // Si la clé primaire est auto-incrémentée
    public $incrementing = true;

    // Définissez le type de la clé primaire
    protected $keyType = 'int';
    protected $fillable = [
        'titre',
        'description',
        'date_limite',
        'status',
    ];

    public function taches()
    {
        return $this->hasMany(Tache::class, 'id_projet'); 
    }

}
