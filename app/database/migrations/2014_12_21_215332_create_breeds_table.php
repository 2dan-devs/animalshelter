<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('breeds', function(Blueprint $table)
		{
			// Table columns
			$table->increments('id'); // Auto incrementing Primary Key.
			$table->string('name')->unique();

			// 'id' from species table. Foreign key.
			$table->integer('specie_id')->unsigned();
			$table->foreign('specie_id')->references('id')->on('species');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('breeds');
	}
}