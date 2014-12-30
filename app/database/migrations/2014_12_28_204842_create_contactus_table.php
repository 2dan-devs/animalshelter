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
			$table->char('state', 2);
			$table->integer('zip');
			// Email addresses
			$table->string('email_1');
			$table->string('email_2')->nullable();
			// Phone numbers
			$table->integer('phone_1');
			$table->integer('phone_2')->nullable();
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