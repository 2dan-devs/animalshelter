<?php

class AboutUsTableSeeder extends Seeder {

	public function run() {

		// Clear data on table if exists.
		DB::table('aboutus')->delete();

		// Seed table with data below.
		AboutUs::create([
			'title'=>'Animal Shelter',
			'body'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis alias rerum obcaecati itaque suscipit sequi, ipsum illum provident atque cupiditate explicabo nisi ullam veniam saepe cum cumque nam repudiandae velit? &#10 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non iusto sed in quia blanditiis vitae fuga perspiciatis quae. Libero et adipisci voluptatem mollitia nam ipsa, voluptatum voluptate repudiandae quia, nisi.'
		]);

		// Display message if seeding was successful.
		$this->command->info('About Us table seeded!');
	}
}