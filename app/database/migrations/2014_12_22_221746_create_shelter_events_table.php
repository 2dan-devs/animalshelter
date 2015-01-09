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
			$table->date('event_date');
			$table->string('body');

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