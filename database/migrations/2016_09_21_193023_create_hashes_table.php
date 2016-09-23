<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hashes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('word_id');
			$table->string('hash');
			$table->string('word');
			$table->string('algorithm');
			$table->integer('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hashes');
	}

}
