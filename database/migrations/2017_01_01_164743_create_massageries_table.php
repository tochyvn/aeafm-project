<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMassageriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
        Schema::create('messageries', function (Blueprint $table) {
       
        $table->increments('id');
        $table->integer('sender_id');
        $table->integer('recipient_id');
        $table->text('message');
        $table->timestamps();
        $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade');

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
