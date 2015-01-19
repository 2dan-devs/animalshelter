<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contactus', function(Blueprint $table)
		{
			// Table columns.
			$table->increments('id'); // Auto incrementing Primary Key.
			$table->string('title');
			// Address fields
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip', 10);
			// Email addresses
			$table->string('email_1', 100);
			$table->string('email_2', 100)->nullable();
			// Phone numbers
			$table->string('phone_1', 13);
			$table->string('phone_2', 13)->nullable();
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
		Schema::drop('contactus');
	}
}