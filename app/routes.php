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

Route::get('/', function()
{
	return View::make('index');
});


/*
	Front End API Routes:
		1. client_api/all_cats
 		2. client_api/all_dogs
		3. client_api/cat/{id}
		4. client_api/dog/{id}
		5. client_api/events
		6. client_api/subscribe
*/
Route::group(array('prefix' => 'client_api'), function() {

	Route::get('all_cats', 'ClientApiController@getAllCats');
	Route::get('all_dogs', 'ClientApiController@getAllDogs');
	Route::get('cat/{id}', 'ClientApiController@showCat');
	Route::get('dog/{id}', 'ClientApiController@showDog');
	Route::get('events', 'ClientApiController@getAllEvents');
	Route::post('subscribe', 'ClientApiController@subscribeToNewsletters');
});