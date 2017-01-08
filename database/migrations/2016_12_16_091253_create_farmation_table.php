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
        Schema::create('formations', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('type_id');
            $table->string('name')->index();
            $table->timestamp('dateStat')->index();
            $table->timestamp('dateEnd')->index()->nullable();;
            $table->string('place')->index();
            $table->text('description');
            $table->timestamps();

<<<<<<< HEAD
           /* $table->foreign('type_id')->references('id')->on('type_formations')->onDelete('cascade')->onDelete('cascade*/
=======
            $table->foreign('type_id')->references('id')->on('type_formations')->onDelete('cascade')->onDelete('cascade');

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
