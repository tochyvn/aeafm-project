<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('sex');
            $table->string('name');
            $table->string('first_name');
            $table->integer('phone_number')->default(0);
            $table->string('email')->unique();
            $table->string('town');
            $table->integer('role')->default(1)->unsigned()->onDelete('cascade');
           

            $table->integer('country_origin_id')->unsigned()->onDelete('cascade');
            $table->integer('country_residence_id')->unsigned()->onDelete('cascade');

            $table->integer('level_id')->default(0)->unsigned()->onDelete('cascade');
            $table->integer('domaine_id')->default(0)->unsigned()->onDelete('cascade');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

           /* $table->foreign('country_origin_id')->references('id')->on('pays');
            $table->foreign('country_residence_id')->references('id')->on('pays');
            $table->foreign('level_id')->references('id')->on('niveau_etudes');
            $table->foreign('domaine_id')->references('id')->on('domaine');
            $table->foreign('role')->references('id')->on('statuts');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
