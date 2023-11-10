<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutreDetailsToCahierChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Ajoutez la colonne autre_details à votre table
            $table->text('autre_details')->nullable();
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
            // Assurez-vous de pouvoir supprimer la colonne si nécessaire
            $table->dropColumn('autre_details');
        });
    }
}
