<?php

use Illuminate\Database\Migrations\Migration;

class EditProblemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('problems', function($table) {
			 $table->integer('user_id')->unsigned();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('problems', function($table) {
			$table->dropColumn('user_id');
		});
	}

}