<?php

class BreedController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$catbreed = Input::get('newcatbreed');
		$dogbreed = Input::get('newdogbreed');

		if ( !empty($catbreed) )
		{
			try
			{
				$b = new Breed;
				$b->name = $catbreed;
				$b->species_id = 1;
				$b->save();

			} catch (Exception $e) {
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Cannot Save Cat Breed. Already Exists.', 'alert'));
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Cat Breed Created Successfully!', 'success'));
		}

		// IF entry came from Dog Breeds, store in database after validating field.
		if ( !empty($dogbreed) )
		{
			$b = new Breed;
			$b->name = $dogbreed;
			$b->species_id = 2;
			$b->save();

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Dog Breed Created Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Please enter a valid breed name.', 'alert'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$breed = Breed::find($id);

		if ($breed)
		{
			try {
				// Delete breed, if not possible, catch error.
				$breed->delete();
			} catch (Exception $e) {
				// If breed to be deleted is in use, send nice error back to admin.
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Breed can NOT be deleted because it\'s in use.', 'alert'));
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Breed Deleted Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Record Not Found.', 'alert'));
	}
}