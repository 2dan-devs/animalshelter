<?php

class SpeciesController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ( !empty(Input::get('name')) )
		{
			$val = Species::validate(Input::all());

			if ($val->fails())
			{
				return Redirect::back()->withErrors($val);
			}

			try
			{
				$species = new Species;
				$species->name = Input::get('name');
				$species->save();
			} catch (Exception $e) {
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Species can NOT be created. Already exists.', 'alert'));
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Species Created Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Enter a valid species name.', 'alert'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$species = Species::find($id);

		if ($species)
		{
			try {
				// Delete breed, if not possible, catch error.
				$species->delete();
			} catch (Exception $e) {
				// If breed to be deleted is in use, send nice error back to admin.
				return Redirect::back()->with('message', FlashMessage::DisplayAlert('Species can NOT be deleted because it\'s in use.', 'alert'));
			}

			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Species Deleted Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Record Not Found.', 'alert'));
	}
}