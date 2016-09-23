<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Word;

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('WordsSeeder');
	}
}

class WordsSeeder extends Seeder {

	public function run()
	{
		DB::table('Words') -> delete();
		Word::create([
			'word' => 'Polymorphism',
		]);
		Word::create([
			'word' => 'Inheritance',
		]);
		Word::create([
			'word' => 'Abstraction',
		]);
		Word::create([
			'word' => 'Mutator',
		]);
		Word::create([
			'word' => 'Encapsulation',
		]);

	}

}
