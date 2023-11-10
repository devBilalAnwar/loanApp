<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRolesTableSeeder extends Seeder
{
    public function run()
    {
        // Assurez-vous que le rôle 'leazer' existe
        if (!\Spatie\Permission\Models\Role::where('name', 'leazer')->exists()) {
            \Spatie\Permission\Models\Role::create(['name' => 'leazer']);
        }

        // Trouver l'utilisateur avec l'email 'leazers@leaze.fr'
        $user = User::where('email', 'leazers@leaze.fr')->first();

        if ($user) {
            // Assigner le rôle 'leazer' à cet utilisateur
            $user->assignRole('leazer');
        }
    }
}
