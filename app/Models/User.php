<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, HasTeams, Notifiable, TwoFactorAuthenticatable, HasRoles;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password', // Attributs existants
        // Ajoutez vos nouveaux attributs ici
        'gender', 'first_name', 'last_name', 'phone', 'about', 'home_description', 'interests', 'region', 'city', 'search_zones', 'languages', 'source',
    ];

    /**
     * Les attributs qui doivent être cachés pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Les accesseurs à ajouter au format tableau du modèle.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Méthodes personnalisées pour vérifier les rôles d'utilisateur
    // Ces méthodes facilitent la vérification des rôles dans l'application.

    /**
     * Détermine si l'utilisateur est un administrateur.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Détermine si l'utilisateur est un leazer.
     *
     * @return bool
     */
    public function isLeazer()
    {
        return $this->hasRole('leazer');
    }

    /**
     * Détermine si l'utilisateur est un client.
     *
     * @return bool
     */
    public function isClient()
    {
        return $this->hasRole('client');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->using(ConversationUser::class);
    }


}
