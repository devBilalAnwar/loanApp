<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    public function run()
    {
        // Créez un utilisateur pour l'équipe "Leazer"
        $leazerUser = User::create([
            'name' => 'Leazer Admin User',
            'email' => 'leazers@leaze.fr',
            'password' => bcrypt('password')
        ]);

        // Créez l'équipe "Leazer"
        $leazerTeam = Team::create([
            'user_id' => $leazerUser->id,
            'name' => 'Leazers',
            'personal_team' => false,
            'type' => 'leazer'
        ]);

        // Créez un utilisateur pour l'équipe "Client"
        $clientUser = User::create([
            'name' => 'Client Admin User',
            'email' => 'client@leaze.fr',
            'password' => bcrypt('password')
        ]);

        // Créez l'équipe "Client"
        $clientTeam = Team::create([
            'user_id' => $clientUser->id,
            'name' => 'Clients',
            'personal_team' => false,
            'type' => 'client'
        ]);
    }
}
