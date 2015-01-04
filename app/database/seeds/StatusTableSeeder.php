<?php

class StatusTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('status')->delete();

		// Seed table with data below.
		DB::table('status')->insert( array(
			['name'=>'Adopted'],
			['name'=>'Available'],
			['name'=>'Sick'],
			['name'=>'At Vet'],
			['name'=>'Put to Sleep'],
			['name'=>'In Transit'],
			['name'=>'Recovering'],
			['name'=>'In Quarantine'],
			['name'=>'Lost']
		));

		// Display message if seeding was successful.
		$this->command->info('Status table seeded!');
	}
}