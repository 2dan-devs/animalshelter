<?php

class ClientApiController extends \BaseController {
	/**
	* @return Response::json
	*/
	public function AllAnimals()
	{
		$all_animals = DB::table('animals')
					->join('breeds', 'animals.breed_id', '=', 'breeds.id')
					->join('species', 'animals.species_id', '=', 'species.id')
					->where('animals.status_id', '=', 2)
					->select('animals.id', 'animals.name', 'animals.profile_photo',
								'species.name as specie', 'breeds.name as breed',
								'animals.shelter_code','animals.description', 'animals.dob')->get();
		return Response::json($all_animals);
	}

	/**
	* @return Response::json
	*/
	public function AllCats()
	{
		$all_cats = DB::table('animals')
					->join('breeds', 'animals.breed_id', '=', 'breeds.id')
					->join('species', 'animals.species_id', '=', 'species.id')
					->where(['animals.status_id'=> 2, 'animals.species_id' => 1]) // species_id = 1, cats
					->select('animals.id', 'animals.name', 'animals.profile_photo',
								'species.name as specie', 'breeds.name as breed',
								'animals.shelter_code','animals.description', 'animals.dob')->get();
		return Response::json($all_cats);
	}

	/**
	* @return Response::json
	*/
	public function AllDogs()
	{
		$all_dogs = DB::table('animals')
					->join('breeds', 'animals.breed_id', '=', 'breeds.id')
					->join('species', 'animals.species_id', '=', 'species.id')
					->where(['animals.status_id'=> 2, 'animals.species_id' => 2]) // species_id = 2, dogs
					->select('animals.id', 'animals.name', 'animals.profile_photo',
								'species.name as specie', 'breeds.name as breed',
								'animals.shelter_code','animals.description', 'animals.dob')->get();
		return Response::json($all_dogs);
	}

	/**
	* @return Response::json
	*/
	public function AnimalData($id)
	{
		//
	}

	/**
	* @return Response::json
	*/
	public function AllEvents()
	{
		$allevents = ShelterEvent::all();
		return Response::json($allevents);
	}

	/**
	* @return Response::json
	*/
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
		return Response::json($aboutus);
	}

	/**
	* @return Response::json
	*/
	public function contactUs()
	{
		$contactus = ContactUs::find(1);
		return Response::json($contactus);
	}

} // End "ClientApiController" class
