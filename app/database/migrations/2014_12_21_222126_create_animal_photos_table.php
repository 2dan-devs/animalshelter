<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalPhotosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_photos', function(Blueprint $table)
        {
            // Table columns
            $table->increments('id'); // Auto incrementing Primary Key.
            $table->string('image_path')->unique();
            $table->boolean('is_front_photo')->default(0);

            // Foreign Key, 'id' column on animals table.
            $table->integer('animal_id')->unsigned();
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_photos');
    }
}