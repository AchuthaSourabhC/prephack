<?php

use Illuminate\Database\Migrations\Migration;

class AddKeyProblemTable extends Migration {

	public function up()
	{
		Schema::table('problems', function($table) {
			 $table->foreign('user_id')
			      ->references('id')->on('users')
			      ->onDelete('cascade');
        });
	}

	public function down()
	{
		//
	}

}