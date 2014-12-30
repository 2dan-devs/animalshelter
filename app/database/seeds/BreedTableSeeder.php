<?php

class BreedTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('breeds')->delete();

		// Seed table with data below.
		Breed::create(
			array('name'=>'Maine Coon'),
      		array('name'=>'Persian'),
      		array('name'=>'Siamese'),
      		array('name'=>'Abyssinian'),
      		array('name'=>'American Shorthair'),
      		array('name'=>'american Bobtail'),
      		array('name'=>'american Wirehair'),
      		array('name'=>'Exotic Shorthair'),
      		array('name'=>'British Shorthair'),
      		array('name'=>'Bengal'),
      		array('name'=>'Burmese'),
      		array('name'=>'Sphynx'),
      		array('name'=>'Ragdoll'),
      		array('name'=>'Manx'),
      		array('name'=>'Birman'),
      		array('name'=>'Himalayan')
		);

		// Display message if seeding was successful.
		$this->command->info('Breeds table seeded!');
	}
}