<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelterEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shelter_events', function(Blueprint $table)
		{
			// Table columns.
			$table->increments('id'); // Auto incrementing Primary Key.
			$table->string('title');

			// Address fields
			$table->string('location');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip', 10);
			$table->string('phone', 13);

			$table->date('start_date');
			$table->date('end_date');
			$table->string('body');
			$table->boolean('active')->default(1);
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
		Schema::dropIfExists('shelter_events');
	}
}