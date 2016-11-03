<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrAntarJemputTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_antar_jemput', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('partner_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('vehicle_id');
            $table->unsignedInteger('coupon_id');
            $table->unsignedInteger('from_city_id');
            $table->unsignedInteger('to_city_id');
			$table->unsignedInteger('harga_antar_jemput_id');            
            $table->timestamp('order_date');
			$table->integer('distance');
			$table->string('from_address');
			$table->string('to_address');
			$table->string('from_longitude_latitude');
			$table->string('to_longitude_latitude');            
            $table->unsignedInteger('ppn');
            $table->unsignedInteger('pph');
            $table->string('status');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tr_antar_jemput');
    }
}
