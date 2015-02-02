<?php

// Display view (homepage) in /app/views/index.php
Route::get('/', function()
{
	return View::make('index');
});

/* ------------------------  End User Routes --------------------------------- */
// route to show the login form
Route::get('adminlogin', ['uses'=>'UserController@loginForm']);
// route to process the form
Route::post('adminlogin', ['uses'=>'UserController@loginPost']);
// Log out user
Route::get('adminlogout', function()
{
    Auth::logout();
    return Redirect::to('adminlogin')->with('message', FlashMessage::DisplayAlert('Logged out successfully', 'success'));
});
/* ------------------------  End User Routes --------------------------------- */

/* --------------------------- ADMIN PREFIXED ROUTES ---------------------------- */

Route::group(['before'=>'auth', 'prefix' => '/admin'], function()
{
	// Display dashboard view in /app/views/admin/dashboard.blade.php
	Route::get('dashboard', function()
	{
		return View::make('admin.dashboard')->with('title', 'Dashboard');
	});

	// Routes: index, create, store, show, edit, update, destroy.
	Route::resource('dashboard/animal', 'AnimalController');

	// // Route to create, view, and destroy statuses, species, and breeds.
	Route::get('dashboard/attributes', function()
	{
		// Get all species from database species table.
		$species = Species::all();
		// Get all Cat breeds from database breeds table.
		$breeds = Breed::all();
		// Get all data from status table on database.
		$statuses = Status::all();

		return View::make('admin.animal.attributes',
							['species'=>$species, 'breeds'=>$breeds, 'statuses'=>$statuses])
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

	// Update User Information section *******************************************************
	Route::get('profile', function()
	{
		$username = Auth::user()->username;
		$user = User::find(Auth::user()->id);

		return View::make('user.profile', ['username'=>$username, 'user'=>$user])->withTitle('Edit User Profile');
	});
	Route::post('profile/update/{id}', ['uses'=>'UserController@updateProfile']);
	// Update User Information section *******************************************************

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


// Catch missing routes and show 404 not found error with nice view.
App::missing(function($exception)
{
    return View::make('404');
});