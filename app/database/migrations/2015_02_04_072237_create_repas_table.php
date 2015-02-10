<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repas', function($table) {
			$table->increments('id')->unsigned();
			$table->integer('prem_midi');
			$table->integer('prem_soir');
			$table->integer('deux_matin');
			$table->integer('deux_midi');
			$table->string('allergie', 100);
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
		Schema::drop('repas');
	}

}
