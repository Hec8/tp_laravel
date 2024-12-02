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
        'id',
    ];
 
    // Relation avec les tâches
    public function taskProject()
    {
        return $this->hasMany(Tache::class, 'id_projet'); // 'projet_id' est la clé étrangère dans la table 'taches'
    }

    // Relation avec l'utilisateur
    public function userProject() 
    {
        return $this->belongsTo(User::class, 'id'); // 'user_id' est la clé étrangère dans la table 'projets'
    }

}
