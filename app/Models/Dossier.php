<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'locataire', 'email', 'telephone', 'documents', 'commentaires',
    ];

    // Vous pouvez ajouter d'autres propriétés et méthodes selon les besoins de votre application
}
