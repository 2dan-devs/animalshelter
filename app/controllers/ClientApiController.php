<?php

class ClientApiController extends \BaseController {

	/**
	 * Get all cats in database and return as JSON to AngularJS.
	 *
	 * @return Response
	 */
	public function getAllCats()
	{
		$allCats = Animal::where('specie_id', '=', 'cat')->get();

		Response::json($allCats);
	}


	/**
	 * Get all info about selected cat and return as JSON to AngularJS.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function showCat($id)
	{
		//
	}


	/**
	 * Get all dogs in database and return as JSON to AngularJS.
	 *
	 * @return Response
	 */
	public function getAllDogs()
	{
		//
	}


	/**
	 * Get all info about selected dog and return as JSON to AngularJS.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showDog($id)
	{
		//
	}


	/**
	 * Get all events from events table and return as JSON to AngularJS.
	 *
	 * @return Response
	 */
	public function getAllEvents()
	{
		//
	}


	/**
	 * Get email from Ajax and subscribe user to Newsletters.
	 *
	 * @return Response
	 */
	public function subscribeToNewsletters()
	{
		//
	}
}
