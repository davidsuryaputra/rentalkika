<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //$table->unsignedInteger('role_id');
            // $table->string('username');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('full_name');
            $table->string('address');
            $table->string('phone');
            $table->string('activation_code')->nullable();
            //$table->string('family_address')->nullable();
            //$table->string('family_phone')->nullable();
            //$table->string('idcard')->nullable();
            $table->string('role')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->integer('balance')->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('user_company', function (Blueprint $table){
			$table->increments('id');        	
        	$table->unsignedInteger('user_id');
        	$table->string('nama_direktur');
        	$table->string('ktp_direktur')->nullable();
        	$table->string('npwp_kantor')->nullable();
        	$table->string('surat_kantor')->nullable();
        	$table->timestamps();
        });
        
        Schema::create('user_personal', function (Blueprint $table){
			$table->increments('id');        	
        	$table->unsignedInteger('user_id');
        	$table->string('family_name');
        	$table->string('family_address');
        	$table->string('family_phone');
        	$table->string('ktp')->nullable();	
        	$table->timestamps();
        });
        
        Schema::create('user_statuses', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('name');
        	$table->timestamps();
        });
        
        Schema::table('user_company', function (Blueprint $table) {
        	$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::table('user_personal', function (Blueprint $table) {
        	$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	
    	Schema::table('user_personal', function (Blueprint $table) {
    		$table->dropForeign(['user_id']);
    	});
    	
    	Schema::table('user_company', function (Blueprint $table) {
    		$table->dropForeign(['user_id']);
    	});
    	
    	Schema::drop('user_statuses');
    	Schema::drop('user_personal');
    	Schema::drop('user_company');
        Schema::drop('users');
    }
}
