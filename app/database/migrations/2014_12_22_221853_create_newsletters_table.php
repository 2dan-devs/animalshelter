<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewslettersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('newsletters', function(Blueprint $table)
		{
			// Table columns.
			$table->increments('id'); // Auto incrementing Primary Key.
			$table->string('subject');
			$table->string('content');
			$table->tinyInteger('template')->default(1);
			$table->date('start_date');
			$table->date('end_date');
			$table->tinyInteger('send_frequency'); // One Time, Weekly, Bi-Weekly, Monthly.
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
		Schema::dropIfExists('newsletters');
	}
}