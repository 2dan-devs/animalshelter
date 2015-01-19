<?php

// Display view (homepage) in /app/views/index.php
Route::get('/', function()
{
	return View::make('index');
});


/* --------------------------- ADMIN PREFIXED ROUTES ---------------------------- */

Route::group(array('prefix' => '/admin'), function()
{
	// Display view in /app/views/admin/login.blade.php
	Route::get('login', function()
	{
		return View::make('login');
	});

	// Display dashboard view in /app/views/admin/dashboard.blade.php
	Route::get('dashboard', function()
	{
		return View::make('admin.dashboard')->with('title', 'Dashboard');
	});

	// Resource of Routes for Animal model for CRUD operations. Routes: index, create, store, show, edit, update, destroy.
	Route::resource('dashboard/animal', 'AnimalController');

	// // Route to create, view, and destroy statuses, species, and breeds.
	Route::get('dashboard/attributes', function()
	{
		// Get all species from database species table.
		$species = Species::all();
		// Get all Cat breeds from database breeds table.
		$allcats = Breed::where('species_id', '=', 1)->get();
		// Get all Cat breeds from database breeds table.
		$alldogs = Breed::where('species_id', '=', 2)->get();
		// Get all data from status table on database.
		$statuses = Status::all();

		return View::make('admin.animal.attributes', ['species'=>$species, 'allcats'=>$allcats,'alldogs'=>$alldogs, 'statuses'=>$statuses])
				->with('title', 'Status / Species / Breeds');
	});

	// Resouce to create, edit, update, and delete shelter events.
	Route::resource('dashboard/events', 'EventsController');
	// Resouce to create and destroy statuses
	Route::resource('dashboard/status', 'StatusController');
	// Resouce to create and destroy statuses
	Route::resource('dashboard/species', 'SpeciesController');
	// Resouce to create and destroy statuses
	Route::resource('dashboard/breed', 'BreedController');

	// Resouce to view and update About Us information.
	Route::resource('dashboard/aboutus', 'AboutUsController');
	// Resouce to view and update Contact Us information.
	Route::resource('dashboard/contactus', 'ContactUsController');

	// API for jQuery to display breeds based on specie selected.
	Route::get('breed-based-on-specie', function()
	{
		$species_id = Input::get('species_id');
		// Get breeds for specie selected.
		$breeds = Breed::where('species_id', '=', $species_id)->orderBy('name')->get();

		// Return data as Json.
		return Response::json($breeds);
	});
});
/* --------------------------- END ADMIN ROUTES ------------------------- */


/* ----------------------- ANGULAR.JS API ROUTES ------------------------ */

Route::group(array('prefix' => '/client_api'), function()
{
	// Get all animals based on specie requested by Angular.
	Route::get('all-from-species', 'ClientApiController@getAllFromSpecies');

	// Get specific animal based on specie and id
	Route::get('{animal}', 'ClientApiController@getAnimalData');

	Route::get('events', 'ClientApiController@getAllEvents');

	Route::post('subscribe', 'ClientApiController@subscribeToNewsletters');
});
/* ---------------------- END ANGULAR.JS API ROUTES ---------------------- */

# TODO: catch all not found routes and display nice 404 error.