<?php

use Illuminate\Database\Migrations\Migration;

class AddTimestampFollowers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('followers', function($table) {
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
		//
	}

}