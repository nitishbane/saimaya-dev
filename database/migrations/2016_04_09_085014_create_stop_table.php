<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stop', function (Blueprint $table) {
            $table->increments('stop_id',11);
			$table->integer('city_id');
			$table->string('area',100);
			$table->string('full_address',500);
			$table->string('description',1000);
			$table->integer('is_delete');
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
        Schema::drop('stop');
    }
}
