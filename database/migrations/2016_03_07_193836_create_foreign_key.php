<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('modules' , function($table){
             $table->integer('professeur_id')->unsigned() ;
             $table->integer('filiere_id')->unsigned() ;
             $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
             $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
      });

      Schema::table('options' , function($table){
             $table->integer('filiere_id')->unsigned() ;
             $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
      });

      Schema::table('users' , function($table){
             $table->integer('filiere_id')->unsigned() ;
             $table->integer('option_id')->unsigned();
             $table->integer('encadrement_id')->unsigned() ;
             $table->foreign('filiere_id')->references('id')->on('filieres')->onDelete('cascade');
             $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
             $table->foreign('encadrement_id')->references('id')->on('encadrements')->onDelete('cascade');
      });

      Schema::table('evaluations' , function($table){
             $table->integer('encadrement_id')->unsigned() ;
             $table->foreign('encadrement_id')->references('id')->on('encadrements')->onDelete('cascade');
      });

      Schema::table('ppp' , function($table){
             $table->integer('encadrement_id')->unsigned() ;
             $table->integer('professeur_id')->unsigned() ;
             $table->foreign('encadrement_id')->references('id')->on('encadrements')->onDelete('cascade');
             $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');
      });

      Schema::table('encadrements' , function($table){
              $table->integer('professeur_id')->unsigned() ;
              $table->foreign('professeur_id')->references('id')->on('professeurs')->onDelete('cascade');                    
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
