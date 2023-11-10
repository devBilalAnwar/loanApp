<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CahierCharges extends Model
{
    use HasFactory;

    // Définissez le nom de la table si ce n'est pas le pluriel du nom du modèle
    protected $table = 'cahier_charges';

    // Autorisez l'assignation en masse pour les champs suivants
    protected $fillable = [
        'type_logement',
        'lieux_recherche',
        'surface_min',
        'budget_max',
        // Ajoutez tous les autres champs que vous voulez pouvoir assigner massivement
        'nombre_chambres',
        'meuble',
        'ligne_metro',
        'deadline',
        'autre_details',
        'style_prefere',
        // ... ajoutez les autres champs selon votre formulaire et table de base de données
    ];

    // Si vous avez des dates autres que created_at et updated_at, ajoutez-les ici
    protected $dates = [
        'deadline',
        // ... autres champs de date
    ];

    // Si vous avez des champs qui doivent être convertis en un type spécifique (comme un tableau ou un objet JSON)
    protected $casts = [
        'ligne_metro' => 'array',
        // ... autres champs avec des types spécifiques
    ];

    // Définissez les relations avec d'autres modèles, si nécessaire
    // par exemple, si un CahierCharges appartient à un User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ... autres méthodes de modèle (logique métier, scopes, etc.)
}

?>
