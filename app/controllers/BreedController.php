<?php

class BreedController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$breed = Input::all();

		$val = Breed::validate($breed);

		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val);
		}

		try
		{
			$b = new Breed;
			$b->name = Input::get('name');
			$b->species_id = Input::get('species_id');
			$b->save();

		} catch (Exception $e) {
			return Redirect::back()->with('message',
				FlashMessage::DisplayAlert('Cannot Save Cat Breed. Already Exists.', 'alert'));
		}

		return Redirect::back()->with('message',
			FlashMessage::DisplayAlert('Breed created succesfully!.', 'success'));
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
				return Redirect::back()->with('message',
					FlashMessage::DisplayAlert('Breed can NOT be deleted because it\'s in use.', 'alert'));
			}

			return Redirect::back()->with('message',
				FlashMessage::DisplayAlert('Breed Deleted Successfully!', 'success'));
		}

		return Redirect::back()->with('message',
			FlashMessage::DisplayAlert('Record Not Found.', 'alert'));
	}
}