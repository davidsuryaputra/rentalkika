<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrSewaHargaSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_sewa_harga_sewa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tr_sewa_id');
            $table->unsignedInteger('harga_sewa_id');
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
        Schema::drop('tr_sewa_harga_sewa');
    }
}
