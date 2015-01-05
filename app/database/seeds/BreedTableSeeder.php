<?php

class BreedTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('breeds')->delete();

		// Seed table with data below.
		DB::table('breeds')->insert( array(
			// Cat breeds
			array('name'=>'Maine Coon', 'species_id'=>1),
			array('name'=>'Persian', 'species_id'=>1),
			array('name'=>'Siamese', 'species_id'=>1),
			array('name'=>'Abyssinian', 'species_id'=>1),
			array('name'=>'American Shorthair', 'species_id'=>1),
			array('name'=>'American Bobtail', 'species_id'=>1),
			array('name'=>'American Wirehair', 'species_id'=>1),
			array('name'=>'Exotic Shorthair', 'species_id'=>1),
			array('name'=>'British Shorthair', 'species_id'=>1),
			array('name'=>'Bengal', 'species_id'=>1),
			array('name'=>'Burmese', 'species_id'=>1),
			array('name'=>'Sphynx', 'species_id'=>1),
			array('name'=>'Ragdoll', 'species_id'=>1),
			array('name'=>'Manx', 'species_id'=>1),
			array('name'=>'Birman', 'species_id'=>1),
			array('name'=>'Himalayan', 'species_id'=>1),
			// Dog breeds
			array('name'=>'Dachshund', 'species_id'=>2),
			array('name'=>'Rottweiler', 'species_id'=>2),
			array('name'=>'Poodle', 'species_id'=>2),
			array('name'=>'Boxer', 'species_id'=>2),
			array('name'=>'Yorkshire Terrier', 'species_id'=>2),
			array('name'=>'Bulldog', 'species_id'=>2),
			array('name'=>'Beagle', 'species_id'=>2),
			array('name'=>'Golden Retriever', 'species_id'=>2),
			array('name'=>'German Shepherd', 'species_id'=>2),
			array('name'=>'Labrador Retriever', 'species_id'=>2)
		));

		// Display message if seeding was successful.
		$this->command->info('Breeds table seeded!');
	}
}