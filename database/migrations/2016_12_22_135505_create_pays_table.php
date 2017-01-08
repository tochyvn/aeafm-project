<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('pays', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('code')->index();
            $table->string('alpha2')->index();
            $table->string('alpha3')->index();
            $table->string('nom_en_gb')->index();
            $table->string('nom_fr_fr')->index();
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
        //
    }
}
