<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChoixColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('choix' , function($table){
     $table->integer('ppp_id')->unsigned() ;
     $table->integer('binom_id')->unsigned() ;
     $table->integer('rang_choix')->unsigned() ;


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
