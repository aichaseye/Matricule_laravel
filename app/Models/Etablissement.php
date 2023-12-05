<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    // permet l'acces des éléments à la base de données depuis une formulaire
    protected $fillable = [
            'nomEtab',
            'emailEtab',
            'typeEtab',
            'statusEtab',
            'adresseEtab',
            'dateCreation',
            'codeIA',
    ];
}
