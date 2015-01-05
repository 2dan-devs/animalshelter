<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// Seed data onto the 'species' table.
		$this->call('SpeciesTableSeeder');

		// Seed data onto the 'breeds' table.
		$this->call('BreedTableSeeder');

		// Seed data onto the 'status' table.
		$this->call('StatusTableSeeder');

		// Seed data onto the 'users' table.
		$this->call('UserTableSeeder');

		// Show successful message if no errors.
		$this->command->info('All Seeders Completed Successfully!');
	}
}