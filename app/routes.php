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