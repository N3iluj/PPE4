<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHebergementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('hebergements', function($table) {
			$table->increments('id')->unsigned();
			$table->boolean('necessite');
			$table->integer('nb_personne');
			$table->string('lieu', 64);
			$table->string('adresse', 64);
			$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('hebergements');
	}

}
