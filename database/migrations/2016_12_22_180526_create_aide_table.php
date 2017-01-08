<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        Schema::create('aides', function (Blueprint $table) {
        
        $table->increments('id');

        $table->integer('user_id')->default(0);
        $table->integer('domaine_id')->default(0);        
        $table->text('description');        
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
        
        });*/
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
