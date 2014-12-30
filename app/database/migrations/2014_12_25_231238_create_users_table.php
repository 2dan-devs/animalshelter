<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			// Table columns
			$table->increments('id'); // Auto incrementing Primary Key.

			// NOT nullable table columns 
			$table->string('username')->unique();
			$table->string('password');
			$table->string('email')->unique();

			// Nullable table columns
			$table->string('reset_link')->nullable();

			// Required to use Laravel's Authentication System.
			$table->string('remember_token');

			// creates created_at and updated_at columns on table.
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
		Schema::dropIfExists('users');
	}
}