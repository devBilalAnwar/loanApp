<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    /**
     * Exécutez les migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->string('home_description')->nullable();
            $table->text('interests')->nullable();
            $table->string('region')->nullable();
            $table->string('city')->nullable();
            $table->text('search_zones')->nullable();
            $table->string('languages')->nullable();
            $table->string('source')->nullable();
        });
    }

    /**
     * Inversez les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'gender',
                'first_name',
                'last_name',
                'phone',
                'about',
                'home_description',
                'interests',
                'region',
                'city',
                'search_zones',
                'languages',
                'source',
            ]);
        });
    }
}
