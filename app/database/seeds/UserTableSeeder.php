<?php

class UserTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('users')->delete();

		// Seed table with data below.
		User::create(
			array('username'=>'admin1', 'email'=>'admin1@animalshelter.com', 'password'=>Hash::make('password1'))
		);
		
		// Display message if seeding was successful.
		$this->command->info('Users table seeded!');
	}
}