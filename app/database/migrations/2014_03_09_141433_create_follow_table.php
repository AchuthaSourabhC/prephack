<?php

use Illuminate\Database\Migrations\Migration;

class CreateFollowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('followers', function($table) {
			$table->increments('id');
	        $table->integer('user_id')->unsigned();
	        $table->integer('target_id')->unsigned();
	        $table->foreign('user_id')->references('id')
	    							->on('users')
	    							->onDelete('cascade');
    	});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('followers');
	}

}