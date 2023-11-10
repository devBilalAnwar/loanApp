<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToEtageInCahierChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Assurez-vous que la colonne 'etage' existe déjà
            // Remplacez 'valeur_par_defaut' par la valeur par défaut appropriée pour 'etage'
            $table->string('etage')->default('peu_importe')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Retirez la valeur par défaut pour revenir à l'état original
            $table->string('etage')->default(null)->change();
        });
    }
}
