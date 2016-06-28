<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategorisation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorisations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ppp_id')->unsigned() ;
            $table->integer('categorie_id')->unsigned();
            $table->foreign('ppp_id')->references('id')->on('ppp')->onDelete('cascade');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::drop('categorisations');
    }
}
