<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpositionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('expositions', function($table) {
			$table->increments('id')->unsigned();
			$table->string('nom', 64);
			$table->string('adresse', 64);
			$table->integer('cp');
			$table->string('ville', 64);
			$table->string('organisateur', 64);
			$table->text('cg');
			$table->date('date_debut');
			$table->date('date_fin');
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
