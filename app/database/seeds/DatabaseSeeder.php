<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('TopicTableSeeder');

        $this->command->info('Topics table seeded!');

		// $this->call('UserTableSeeder');
	}


}

class TopicTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		 $date = date('Y-m-d H:i:s');
		 DB::table('topics')->delete();
			DB::table('topics')->insert(array(
				array('type' => 'General',
				 'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'C/C++',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Arrays',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Strings',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Algorithms',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Bit Manipulation',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Linked List', 
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Trees',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Graphs',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Greedy Algorithms',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Dynamic Programming',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Artificial Inteligence',
			     'created_at' => $date, 'updated_at' => $date),
			    array('type' => 'Not For Faint Hearted',
			     'created_at' => $date, 'updated_at' => $date),
			));
	}


}

