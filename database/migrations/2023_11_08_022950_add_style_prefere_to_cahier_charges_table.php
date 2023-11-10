<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStylePrefereToCahierChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            // Ajoutez simplement la colonne sans spécifier 'after'
            $table->string('style_prefere')->nullable();
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
            $table->dropColumn('style_prefere');
        });
    }
}
