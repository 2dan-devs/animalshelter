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
			$table->string('username', 32)->unique();
			$table->string('password', 64);
			$table->string('email', 320);

			// Nullable table columns
			$table->string('reset_link')->nullable();

			// Required to use Laravel's Authentication System.
			$table->string('remember_token')->nullable();

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