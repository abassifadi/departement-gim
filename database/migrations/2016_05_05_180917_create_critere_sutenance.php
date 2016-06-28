<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCritereSutenance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteres_soutenances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom') ;
            $table->float('note_min') ;
            $table->float('note_max') ;
            $table->integer('coefficient'); 
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
        Schema::drop('criteres_soutenances');
    }
}
