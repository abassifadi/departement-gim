<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesseurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professeurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('immatricule') ;
            $table->string('nom') ;
            $table->string('prenom');
            $table->string('adresse') ;
            $table->string('email')->unique() ;
            $table->integer('telephone');
            $table->string('password', 60);
            $table->string('nationalite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('professeurs');
    }
}
