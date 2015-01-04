<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('animals', function(Blueprint $table)
		{
			// Table columns
			$table->increments('id'); // Auto incrementing Primary Key.
			$table->string('shelter_code')->unique()->nullable();
			$table->date('date_in');
			$table->date('date_out')->nullable();
			$table->string('name');
			$table->date('dob'); // Date of birth
			$table->string('description');
            $table->string('comments')->nullable();
			$table->timestamps();

			// 'id' from Species table. Foreign key.
			$table->integer('specie_id')->unsigned();
			$table->foreign('specie_id')->references('id')->on('species');

			// 'id' from cat_breeds table. Foreign key.
			$table->integer('breed_id')->unsigned();
			$table->foreign('breed_id')->references('id')->on('breeds');

			// 'id' from Status table. Foreign key.
			$table->integer('status_id')->unsigned();
			$table->foreign('status_id')->references('id')->on('status');

			// 'id' from Users table. Foreign key.
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('animals');
	}
}