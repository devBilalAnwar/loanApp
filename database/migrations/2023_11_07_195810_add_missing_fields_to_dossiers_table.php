<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingFieldsToDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            // Ajout des nouvelles colonnes
            $table->date('date_naissance')->after('locataire')->nullable();
            $table->string('adresse_actuelle')->after('date_naissance')->nullable();
            $table->string('profession')->after('adresse_actuelle')->nullable();
            $table->decimal('revenus', 8, 2)->after('profession')->nullable();
            // Assurez-vous de gérer correctement les fichiers pour les champs suivants:
            $table->string('piece_identite')->after('revenus')->nullable();
            $table->string('justificatifs_revenus')->after('piece_identite')->nullable();
            $table->string('justificatif_domicile')->after('justificatifs_revenus')->nullable();
            $table->string('quittances_loyer')->after('justificatif_domicile')->nullable();
            $table->string('garant')->after('quittances_loyer')->nullable();
            $table->string('dossier_caution')->after('garant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dossiers', function (Blueprint $table) {
            // Suppression des nouvelles colonnes
            $table->dropColumn([
                'date_naissance',
                'adresse_actuelle',
                'profession',
                'revenus',
                'piece_identite',
                'justificatifs_revenus',
                'justificatif_domicile',
                'quittances_loyer',
                'garant',
                'dossier_caution',
            ]);
        });
    }
}
