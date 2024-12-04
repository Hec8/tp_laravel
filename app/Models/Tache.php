<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    //
    // Spécifiez la clé primaire
    protected $primaryKey = 'id_tache';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'titre',
        'description',
        'statut',
        'priorite',
        'id_projet',
        'id',
        'assigned_to',
    ];

    // Relation avec le projet
    public function projectTask() 
    {
        return $this->belongsTo(Projet::class, 'id_projet'); // 'id_projet' est la clé étrangère dans la table 'taches'
    }

    // Relation avec l'utilisateur
    public function userTask()
    {
        return $this->belongsTo(User::class, 'id'); // 'id' est la clé étrangère dans la table 'taches'
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
