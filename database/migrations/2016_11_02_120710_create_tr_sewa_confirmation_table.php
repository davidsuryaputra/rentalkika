<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrSewaConfirmationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_sewa_confirmation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tr_sewa_id');
            $table->unsignedInteger('bank_id');
            $table->string('payment_proof');
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
        Schema::drop('tr_sewa_confirmation');
    }
}
