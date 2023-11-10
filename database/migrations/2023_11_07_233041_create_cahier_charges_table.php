<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCahierChargesTable extends Migration
{
    public function up()
    {
        Schema::create('cahier_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type_logement');
            $table->string('lieux_recherche');
            $table->integer('surface_min');
            $table->integer('budget_max');
            $table->string('taille');
            $table->integer('nombre_chambres');
            $table->string('meuble'); // oui ou non
            $table->string('etage');
            $table->json('ligne_metro'); // stocke les numéros de ligne sous forme de tableau JSON
            $table->date('deadline');
            $table->text('autres_details')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cahier_charges');
    }
}
