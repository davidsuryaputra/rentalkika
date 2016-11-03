<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partner_id');
			$table->unsignedInteger('car_id');
			//$table->unsignedInteger('zone_id');
			//$table->unsignedInteger('route_id');
			//$table->integer('passenger_capacity');
			$table->string('license_plate');
			$table->integer('year');
			$table->string('status');
			//$table->integer('is_feeder');
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
        Schema::drop('vehicles');
    }
}
