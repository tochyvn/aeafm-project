<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddToUsers1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /*$table->foreign('country_origin_id')->references('id')->on('pays');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
