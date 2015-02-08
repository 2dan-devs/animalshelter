<?php

class ClientApiController extends \BaseController {

	public function AllFromSpecies()
	{
		//
	}

	public function AnimalData($id)
	{
		//
	}

	public function AllEvents()
	{
		//
	}

	public function subscribeToNewsletters()
	{
		//
	}

	/**
	* @return Response::json
	*/
	public function aboutUs()
	{
		$aboutus = AboutUs::find(1);
		// Return Json for Angular use.
		return Response::json($aboutus);
	}
}