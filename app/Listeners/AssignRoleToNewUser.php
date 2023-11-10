<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;

class AssignRoleToNewUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Vous pouvez initialiser ici des dépendances si nécessaire
    }

    /**
     * Handle the event.
     *
     * @param \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    public function handle(Registered $event): void
    {
        // Assurez-vous que le rôle 'client' existe, sinon créez-le
        $role = Role::firstOrCreate(['name' => 'client']);

        // Assignez le rôle 'client' au nouvel utilisateur inscrit
        $event->user->assignRole($role);
    }
}
