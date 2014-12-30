<?php

class StatusTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('status')->delete();

		// Seed table with data below.
		DB::table('status')->insert( array(
			array('name'=>'Available'),
			array('name'=>'Sick'),
			array('name'=>'At Vet'),
			array('name'=>'Put to Sleep'),
			array('name'=>'In Transit'),
			array('name'=>'Recovering'),
			array('name'=>'In Quarantine'),
			array('name'=>'Lost')
		));
		
		// Display message if seeding was successful.
		$this->command->info('Status table seeded!');
	}
}