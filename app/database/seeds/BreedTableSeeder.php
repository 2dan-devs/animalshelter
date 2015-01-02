<?php

class BreedTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('breeds')->delete();

		// Seed table with data below.
		DB::table('breeds')->insert( array(
			// Cat breeds
			array('name'=>'Maine Coon', 'specie_id'=>1),
			array('name'=>'Persian', 'specie_id'=>1),
			array('name'=>'Siamese', 'specie_id'=>1),
			array('name'=>'Abyssinian', 'specie_id'=>1),
			array('name'=>'American Shorthair', 'specie_id'=>1),
			array('name'=>'American Bobtail', 'specie_id'=>1),
			array('name'=>'American Wirehair', 'specie_id'=>1),
			array('name'=>'Exotic Shorthair', 'specie_id'=>1),
			array('name'=>'British Shorthair', 'specie_id'=>1),
			array('name'=>'Bengal', 'specie_id'=>1),
			array('name'=>'Burmese', 'specie_id'=>1),
			array('name'=>'Sphynx', 'specie_id'=>1),
			array('name'=>'Ragdoll', 'specie_id'=>1),
			array('name'=>'Manx', 'specie_id'=>1),
			array('name'=>'Birman', 'specie_id'=>1),
			array('name'=>'Himalayan', 'specie_id'=>1),
			// Dog breeds
			array('name'=>'Dachshund', 'specie_id'=>2),
			array('name'=>'Rottweiler', 'specie_id'=>2),
			array('name'=>'Poodle', 'specie_id'=>2),
			array('name'=>'Boxer', 'specie_id'=>2),
			array('name'=>'Yorkshire Terrier', 'specie_id'=>2),
			array('name'=>'Bulldog', 'specie_id'=>2),
			array('name'=>'Beagle', 'specie_id'=>2),
			array('name'=>'Golden Retriever', 'specie_id'=>2),
			array('name'=>'German Shepherd', 'specie_id'=>2),
			array('name'=>'Labrador Retriever', 'specie_id'=>2)
		));

		// Display message if seeding was successful.
		$this->command->info('Breeds table seeded!');
	}
}