<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('zone_id')->nullable();
            $table->string('layanan_sopir');
			$table->string('nama_pemilik');
			$table->string('ktp_pemilik')->nullable();
			$table->string('alamat_pool')->nullable();
			$table->unsignedInteger('kota_pool')->nullable();
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
        Schema::drop('partners');
    }
}