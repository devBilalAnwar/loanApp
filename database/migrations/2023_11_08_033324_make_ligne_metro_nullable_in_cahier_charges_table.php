<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLigneMetroNullableInCahierChargesTable extends Migration
{
    public function up()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            $table->json('ligne_metro')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('cahier_charges', function (Blueprint $table) {
            $table->json('ligne_metro')->nullable(false)->change();
        });
    }
}
