<?php

class ClientApiController extends \BaseController {

	/**
	 * Get all cats in database and return as JSON to AngularJS.
	 *
	 * @return Response
	 */
	public function getAllFromSpecies($id)
	{
		$species = $species_id;
		$data = Animal::where('species_id', '=', $species)->get();

		Response::json($data);
	}


	/**
	 * Get all info about selected cat and return as JSON to AngularJS.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function getAnimalData($id)
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
