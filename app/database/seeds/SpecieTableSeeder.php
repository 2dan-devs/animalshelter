<?php

class SpecieTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('species')->delete();

		// Seed table with data below.
		DB::table('species')->insert( array(
			array('name'=>'Cat'),
			array('name'=>'Dog')
		));

		// Display message if seeding was successful.
		$this->command->info('Species table seeded!');
	}
}