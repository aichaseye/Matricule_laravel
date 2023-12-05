<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;
// permet d’ajouter des éléments à la base de données 
    protected $fillable = [
        'nom',
        'prenom',
        'genre',
        'adresse',
        'email',
        'num_tel',
        
    ];
// champs non remplissable
    protected $guarded = [
        // 'matricule',
        // 'id',
        // 'created_at',
        // 'updated_at',
    ];
}
