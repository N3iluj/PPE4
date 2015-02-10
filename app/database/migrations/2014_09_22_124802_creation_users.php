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
			$table->string('nom', 64);
			$table->string('prenom', 64);
			$table->string('date_naissance', 10);
			$table->integer('tel');
			$table->string('adresse', 64);
			$table->integer('cp');
			$table->string('ville', 64);
			$table->string('email', 64)->unique();
			$table->enum('statut', array('admin', 'exposant','vendeur'))->default('exposant');
			$table->string('remember_token', 100)->nullable();
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
