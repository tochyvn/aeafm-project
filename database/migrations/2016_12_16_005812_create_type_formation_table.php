<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeFormationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*
         Schema::create('type_formations', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name')->index();
            $table->text('description');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    
  
    
*/
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
