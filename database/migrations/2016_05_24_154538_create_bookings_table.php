<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
			$table->increments('booking_id',11);
			$table->integer('bus_route_map_id');
			$table->string('seat_no',5);
			$table->string('passenger_name',50);
			$table->string('gender',1);
			$table->string('journey_date',10);
			$table->integer('user_id');			
            $table->timestamps();
			$table->unique(array('bus_route_map_id','seat_no','journey_date'));
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bookings');
    }
}
