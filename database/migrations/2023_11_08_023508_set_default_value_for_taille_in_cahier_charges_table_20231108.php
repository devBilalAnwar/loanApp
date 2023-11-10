<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetDefaultValueForTailleInCahierChargesTable20231108 extends Migration
{
    public function up()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Assurez-vous que la colonne 'taille' existe déjà ou a été créée dans une migration antérieure
            $table->string('taille')->default('valeur_par_defaut')->change();
        });
    }

    public function down()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Pour annuler la migration, supprimez la valeur par défaut
            $table->string('taille')->default(null)->change();
        });
    }
}
