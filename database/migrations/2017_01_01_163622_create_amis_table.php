<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('amis', function (Blueprint $table) {
       
       $table->increments('id');
        $table->integer('user_id');
        $table->integer('freind_id');

        $table->integer('confirm')->index();//ne pas confimer signifie delet
        $table->timestamps();
        
        /*$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('freind_id')->references('id')->on('users')->onDelete('cascade');
    */

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
