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
			return Redirect::back()->withErrors($validator)->withInput();
		}
		else
		{
			/******************************** Profile Photo Upload ***********************/
			if ( Input::hasFile('profile_photo') )
			{
				$profile_photo = Input::file('profile_photo');
				$filename = time()."-". $profile_photo->getClientOriginalName();
				$path = public_path('admin/img/animal_photos/'. $filename);

				// If something goes wrong when saving image throw nice error to admin.
				try
				{
					Image::make($profile_photo->getRealPath())->save($path);
				}
				catch (Exception $e)
				{
					return Redirect::back()->with('message', FlashMessage::DisplayAlert('Invalid Image File. Please upload a different image.', 'warning')->withInput());
				}
			} else { $filename = NULL;}

			/***** Create new animal object and store data from form into database. *****/
			$anim = new Animal;
			$anim->shelter_code = ( empty(Input::get('shelter_code')) ? NULL : Input::get('shelter_code') );
			$anim->name = Input::get('name');
			$anim->dob = ( empty(Input::get('dob')) ? NULL : date("Y-m-d", strtotime(Input::get('dob'))) );
			$anim->date_in = ( empty(Input::get('date_in')) ? NULL : date("Y-m-d", strtotime(Input::get('date_in'))) );
			$anim->date_out = ( empty(Input::get('date_out')) ? NULL : date("Y-m-d", strtotime(Input::get('date_out'))) );
			$anim->species_id = Input::get('species_id');
			$anim->breed_id = Input::get('breed_id');
			$anim->status_id = Input::get('status_id');
			$anim->description = Input::get('description');
			$anim->save();

			/***************** Save photo on animal_photos table. *************/
			$photo = new AnimalPhoto;
			// If image was uploaded by user save it to animal_photos table, otherwise, assign dummy photo.
			$photo->image_path = ( $filename == NULL ? 'admin/img/animal_photos/000-photo-coming-soon.jpg' : 'admin/img/animal_photos/'. $filename );
			$photo->animal_id = $anim->id;
			$photo->save();

			/************* Set photo just saved as profile photo. *************/
			$anim->front_photo = $photo->id;
			$anim->save();

			/************************* Photo Set Upload **********************/
			if ( Input::hasFile('photo_set') )
			{
				$photo_set = Input::file('photo_set');

				foreach($photo_set as $one_photo)
				{
					$photo_name = time()."-". $one_photo->getClientOriginalName();
					$loop_path = public_path('admin/img/animal_photos/'. $photo_name);

					try
					{
						Image::make($one_photo->getRealPath())->save($loop_path);
					}
					catch (Exception $e)
					{
						// If something goes wrong when saving image throw nice error to admin.
						# TODO?: diplay which images failed and saved good ones.
						return Redirect::back()->with(
							'message', FlashMessage::DisplayAlert('Record Saved.<br>Warning: image <b>"' .$one_photo->getClientOriginalName(). '"</b> was not saved, invalid format.', 'warning'));
					}
					if (!empty($photo_name))
					{
						$set_photo = new AnimalPhoto;
						$set_photo->image_path = $loop_path;
						$set_photo->animal_id = $anim->id;
						$set_photo->save();
					}
				}
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Record Created Successfully!', 'success'));
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
