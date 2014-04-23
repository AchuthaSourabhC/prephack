<?php
class TableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('ProblemTableSeeder');

        $this->command->info('Problem table seeded!');

		
	}


}

class ProblemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('problems')->delete();
		$problem = new Problem(
			array('title' => 'Url Magic',
					'body' => 'Given a url as string , Replace all spaces with %20',
					'input' => 'prepHack.com/is wait-for-it Legendary !!!',
					'output' => 'prepHack.com/is%20wait-for-it%20Legendary%20!!!',
					'user_id' => 3
					)
			);

		$topic = Topic::find(30);

		$prob = $topic->problems()->save($problem);

		$problem = new Problem(
			array('title' => 'Rotate The Matrix',
					'body' => 'Given an image represented by NxN matrix, where each pixel occupies a single  
cell of matrix, write a program to rotate the image by 90 degrees clockwise.',
					'input' => '',
					'output' => '',
					'source' => 'Caracking the coding interview - Gayle Mcdowell',
					'user_id' => 3
					)
					
			);
		$topic = Topic::find(28);

		$prob = $topic->problems()->save($problem);

	}


}