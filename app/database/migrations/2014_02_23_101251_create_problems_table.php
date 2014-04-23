<?php

use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('problems', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            $table->string('title', 128);
            $table->text('body');
            $table->text('input');
            $table->text('output');
           	$table->string('source', 128)->default('Generous Contributer');
            $table->foreign('topic_id')->references('id')->on('topics')->on_delete('restrict')->on_update('cascade');
            $table->timestamps();   
        });
	}

	public function down()
	{
        Schema::drop('problems');
	}

}