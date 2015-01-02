<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Display view (homepage) in /app/views/index.php
Route::get('/', function()
{
	return View::make('index');
});

/* --------------------------- ADMIN ROUTES ---------------------------- */

Route::group(array('prefix' => 'admin'), function() {

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
	Route::resource('animal', 'AnimalController');
});
/* --------------------------- END ADMIN ROUTES ------------------------- */


/* ----------------------- ANGULAR.JS API ROUTES ------------------------ */

Route::group(array('prefix' => 'client_api'), function()
{
	Route::get('all_cats', 'ClientApiController@getAllCats');
	Route::get('all_dogs', 'ClientApiController@getAllDogs');
	Route::get('cat/{id}', 'ClientApiController@showCat');
	Route::get('dog/{id}', 'ClientApiController@showDog');
	Route::get('events', 'ClientApiController@getAllEvents');
	Route::post('subscribe', 'ClientApiController@subscribeToNewsletters');
});
/* ---------------------- END ANGULAR.JS API ROUTES ---------------------- */