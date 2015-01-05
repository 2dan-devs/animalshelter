<?php

class AnimalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('admin.animal.index')->with('animals', Animal::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Get all data from species table populate select list on view.
		$species = Species::all();
		// Get all data from status table to populate select list on view.
		$statuses = Status::all();

		return View::make('admin.animal.create', ['species'=>$species, 'statuses'=>$statuses])
				->with('title', 'Create Record');
	}

	/**
	 * Store a newly created resource in database.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Animal::validate(Input::all());

		if ($validator->fails())
		{
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			/******************************** Image Upload Start ***********************/
			if ( !empty(Input::file('profile_photo')) )
			{
				$profile_photo = Input::file('profile_photo');
				$filename = time()."-". $profile_photo->getClientOriginalName();
				$path = public_path('admin/img/profile_photos/'. $filename);

				// If something goes wrong when saving image throw nice error to admin.
				try { Image::make($profile_photo->getRealPath())->save($path);
				} catch (Exception $e) {
					return Redirect::back()->with('message', 'Invalid Image File. Please Upload a Different Image.');
				}
			}
			else { $filename = NULL; }

			/************************** Dates Conversion Start *************************/
			$dob = Input::get('dob');
			$iso_dob = ( empty($dob) ? NULL : date("Y-m-d", strtotime($dob)) );

			$date_in = Input::get('date_in');
			$iso_date_in = ( empty($date_in) ? NULL : date("Y-m-d", strtotime($date_in)) );

			$date_out = Input::get('date_out');
			$iso_date_out = ( empty($date_out) ? NULL : date("Y-m-d", strtotime($date_out)) );

			/***** Create new animal object and store data from form into database. *****/
			$anim = new Animal;
			$anim->profile_photo = ( $filename == NULL ? NULL : 'admin/img/profile_photos/'.$filename );
			$anim->shelter_code = ( empty(Input::get('shelter_code')) ? NULL : Input::get('shelter_code') );
			$anim->name = Input::get('name');
			$anim->dob = $iso_dob;
			$anim->date_in = $iso_date_in;
			$anim->date_out = $iso_date_out;
			$anim->species_id = Input::get('species_id');
			$anim->breed_id = Input::get('breed_id');
			$anim->status_id = Input::get('status_id');
			$anim->description = Input::get('description');
			$anim->save();

			return Redirect::back()->with('message', 'Record Created Successfully!');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
