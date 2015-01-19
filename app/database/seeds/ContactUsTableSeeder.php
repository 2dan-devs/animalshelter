<?php

class ContactUsTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('contactus')->delete();

		// Seed table with data below.
		ContactUs::create([
			'title'	 =>'Animal Shelter',
			'address'=>'111 Someplace Street',
	        'city'	 =>'Heaven',
	        'state'	 =>'NJ',
	        'zip'	 =>'10000',
			'email_1'=>'cats@animalshelter.com',
			'email_2'=>'dogs@animalshelter.com',
			'phone_1'=>'777-777-1111',
			'phone_2'=>'888-888-0000'
		]);

		// Display message if seeding was successful.
		$this->command->info('Contact Us table seeded!');
	}
}