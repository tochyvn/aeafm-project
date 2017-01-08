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
<<<<<<< HEAD
            $table->timestamps();
            
=======
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
>>>>>>> 8b8937c5a12bdb4ba6267da6e685e2a5c8856eca
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
