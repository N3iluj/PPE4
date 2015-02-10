<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projets', function($table) {
			$table->increments('id')->unsigned();
			$table->string('theme', 64);
			$table->float('longueur');
			$table->float('largeur');
			$table->integer('nb_piece');
			$table->integer('valeur');
			$table->boolean('courant');
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
		Schema::drop('projets');
	}

}
