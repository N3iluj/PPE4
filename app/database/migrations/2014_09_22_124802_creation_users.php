<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
		Schema::create('users', function($table) {
			$table->increments('id')->unsigned();
			$table->string('username', 64)->unique();
			$table->string('password', 64);
			$table->string('email', 64)->unique();
			$table->string('nom', 64);
			$table->string('prenom', 64);
			$table->date('date_naissance', 30);
			$table->string('tel', 30);
			$table->string('adresse', 64);
			$table->string('cp', 64);
			$table->string('ville', 64);
			$table->enum('statut', array('admin', 'exposant','vendeur'))->default('exposant');
			$table->tinyInteger('cgu');
			$table->integer('repas1mid');
			$table->integer('repas1soir');
			$table->integer('repas2mid');
			$table->integer('repas2soir');
			$table->integer('internat');
			$table->integer('salle');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});


		Schema::create('allergies', function($table) {
			$table->increments('id')->unsigned();
			$table->string('nom', 64);
			$table->timestamps();
		});


		Schema::create('users_allergies', function($table) {
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
				$table->foreign('user_id')->references('id')->on('users');
			$table->integer('allergie_id')->unsigned();
				$table->foreign('allergie_id')->references('id')->on('allergies');
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
		Schema::drop('users');
	}

}
