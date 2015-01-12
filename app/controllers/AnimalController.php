<?php

class AnimalController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$allAnimals = Animal::paginate(12);

		return View::make('admin.animal.index', ['allAnimals'=>$allAnimals])
				->with('title', 'View / Edit Animals');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Get all data from species table populate select list on view.
		$species = Species::lists('name', 'id');
		// Get all breeds
		$breeds = Breed::where('species_id', '=', 1)->orderBy('name')->get();
		// Get all data from status table to populate select list on view.
		$statuses = Status::lists('name', 'id');

		return View::make('admin.animal.create', ['species'=>$species, 'status'=>$statuses, 'breeds'=>$breeds])
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
			if ( Input::hasFile('profile_photo'))
			{
				$profile_photo = Input::file('profile_photo');
				$filename = time()."-". $profile_photo->getClientOriginalName();
				$path = public_path('admin/img/animal_photos/'. $filename);

				try
				{
					// Resize image to 600px width while keeping aspect ratio for height and
					// avoiding upscaling.
					Image::make($profile_photo->getRealPath())->resize(null, 600, function ($constraint) {
											    					$constraint->aspectRatio();
											    					$constraint->upsize();
																})->save($path);
				}
				catch (Exception $e)
				{
					// If something goes wrong when saving image throw nice error to admin.
					return Redirect::back()->with('message', FlashMessage::DisplayAlert('Invalid Image File. Please upload a different image.', 'warning'));
				}
			} else { $filename = NULL;}

			/***** Create new animal object and store data from form into database. *****/
			$anim = new Animal;
			$anim->shelter_code = Input::get('shelter_code');
			$anim->profile_photo = ( $filename==NULL ? 'admin/img/animal_photos/000-photo-coming-soon.jpg' : 'admin/img/animal_photos/' .$filename );
			$anim->name = Input::get('name');
			$anim->dob = Input::get('dob');
			$anim->date_in = Input::get('date_in');
			$anim->date_out = Input::get('date_out');
			$anim->species_id = Input::get('species_id');
			$anim->breed_id = Input::get('breed_id');
			$anim->status_id = Input::get('status_id');
			$anim->description = Input::get('description');
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
						// Resize image to 600px width while keeping aspect ratio for height and
						// avoiding upscaling.
						Image::make($one_photo->getRealPath())->resize(null, 600, function ($constraint) {
											    					$constraint->aspectRatio();
											    					$constraint->upsize();
																})->save($loop_path);
					}
					catch (Exception $e)
					{
						// If something goes wrong when saving image throw nice error to admin.
						# TODO?: diplay which images failed and saved good ones.
						return Redirect::back()->with(
							'message', FlashMessage::DisplayAlert('Record Saved.<br>Warning: Some photos were not saved.</b>, invalid format.', 'warning'));
					}
					if (!empty($photo_name))
					{
						$set_photo = new AnimalPhoto;
						$set_photo->image_path = 'admin/img/animal_photos/' .$photo_name;
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
		// Get all data from species table populate select list on view.
		$species = Species::lists('name', 'id');
		// Get all breeds
		$breeds = Breed::lists('name', 'id');
		// Get all data from status table to populate select list on view.
		$statuses = Status::lists('name', 'id');
		// Get animal selected
		$animal = Animal::find($id);

		return View::make('admin.animal.edit', ['species'=>$species, 'statuses'=>$statuses, 'breeds'=>$breeds, 'animal'=>$animal])
				->with('title', 'Update Record');
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
		// find animal by id on database.
        $animal = Animal::find($id);

        if ($animal)
        {
        	// ******* Delete photos for $animal on animal_photos table.
        	$photos = AnimalPhoto::where('animal_id', '=', $id)->get();

        	foreach ($photos as $photo)
        	{
        		File::delete( public_path($photo->image_path) );
        	}

        	// ********* Delete profile photo only if is not dummy photo.
        	if ($animal->profile_photo != 'admin/img/animal_photos/000-photo-coming-soon.jpg')
        	{
        		File::delete( public_path($animal->profile_photo) );
        	}

        	// Delete database record which cascades on animal_photos table.
			$animal->delete();

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Record Deleted', 'success'));
		}
		else
		{
			return Redirect::to('admin/dashboard/animal')->with('message', FlashMessage::DisplayAlert('Record Not Found', 'alert'));
		}
	}
}