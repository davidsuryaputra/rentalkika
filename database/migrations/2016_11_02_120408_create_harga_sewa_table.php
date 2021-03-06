<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harga_sewa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('zone_id');
            $table->unsignedInteger('car_class_id');
            $table->integer('value');
            $table->string('description');
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
        Schema::drop('harga_sewa');
    }
}
