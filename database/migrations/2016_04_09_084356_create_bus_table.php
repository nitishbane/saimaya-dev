<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('bus_id',11);
			$table->string('bus_type',20);
			$table->string('bus_name',50);
			$table->string('bus_number',20);
			$table->integer('isVideoCoach');
			$table->integer('isAC');
			$table->integer('cost_perseat');
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
        Schema::drop('bus');
    }
}
