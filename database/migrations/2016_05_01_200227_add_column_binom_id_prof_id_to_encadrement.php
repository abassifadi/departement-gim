<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBinomIdProfIdToEncadrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('encadrements' , function($table){
      $table->float('note')->unsigned() ;
      $table->integer('binom_id')->unsigned() ;
      $table->foreign('binom_id')->references('id')->on('binomages');
      $table->integer('prof_id')->unsigned() ;
      //$table->foreign('prof_id')->references('id')->on('professeurs');
      $table->integer('ppp_id')->unsigned() ;
      $table->foreign('ppp_id')->references('id')->on('ppp');


         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
