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
		$species = Specie::all();
		// Get all data from status table to populate select list on view.
		$statuses = Status::all();

		return View::make('admin.animal.create', ['species'=>$species, 'statuses'=>$statuses])->with('title', 'Create Record');
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
			// iF validation fails redirect back with errors.
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			// Create new animal object and store data from form into database.
			$anim = new Animal;
			$anim->shelter_code = Input::get('shelter_code');
			$anim->name = Input::get('name');

			// convert dob to iso date
			$dob = Input::get('dob');
			$iso_dob = date("Y-m-d", strtotime($dob));

			// convert date_in to iso date
			$date_in = Input::get('date_in');
			$iso_date_in = date("Y-m-d", strtotime($date_in));

			// convert date_out to iso date
			$date_out = Input::get('date_out');
			$iso_date_out = date("Y-m-d", strtotime($date_out));

			$anim->dob = $iso_dob;
			$anim->date_in = $iso_date_in;
			$anim->date_out = $iso_date_out;
			$anim->specie_id = Input::get('specie_id');
			$anim->breed_id = Input::get('breed_id');
			$anim->status_id = Input::get('status_id');
			$anim->description = Input::get('description');

			/********************************** Save Image Start ***********************/
			$profile_photo = Input::file('profile_photo');
			$filename = time()."-". $profile_photo->getClientOriginalName();
			$path = public_path('admin/img/animal_photo_uploads/'. $filename);

			// If something goes wrong when saving image file throw nice error to admin.
			try { Image::make($profile_photo->getRealPath())->resize(800, 600)->save($path);
			} catch (Exception $e) {
				return Redirect::back()->with('message', 'Invalid Image File. Please Upload a Different Image.');
			}
			/******************************** End Image Upload *************************/

			// Save animal so we can access its id to save on photos table.
			$anim->save();

			/********************* Store profile photo on animal_photos table ******************/
			$anim_photo = new AnimalPhoto;
			$animal_id = $anim->id;
			$anim_photo->image_path = 'admin/img/animal_photo_uploads/'.$filename;
			$anim_photo->animal_id = $animal_id;
			$anim_photo->save();
			/********************* End store profile photo ******************/

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
