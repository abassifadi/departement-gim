<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePppJoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('critere_id')->unsigned() ;
            $table->integer('evaluation_id')->unsigned() ;
            $table->foreign('critere_id')->references('id')->on('criteres')->onDelete('cascade');
            $table->foreign('evaluation_id')->references('id')->on('evaluations')->onDelete('cascade');
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
        Schema::drop('evaluer');
    }
}
