<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('formations', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('type_id');
            $table->string('name')->index();
            $table->timestamp('dateStat')->index();
            $table->timestamp('dateEnd')->index();
            $table->string('place')->index();
            $table->text('description');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');

            $table->foreign('type_id')->references('id')->on('type_formations')->onDelete('cascade')->onDelete('cascade');

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
