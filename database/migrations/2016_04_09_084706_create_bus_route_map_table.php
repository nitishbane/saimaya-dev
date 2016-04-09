<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRouteMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_route_map', function (Blueprint $table) {
            $table->increments('bus_route_map_id',11);
			$table->integer('bus_id');
			$table->integer('route_id');
			$table->integer('driver_id');
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
        Schema::drop('bus_route_map');
    }
}
