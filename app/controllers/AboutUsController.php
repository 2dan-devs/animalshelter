<?php

class AboutUsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aboutus = AboutUs::find(1);

		return View::make('admin.aboutus', ['aboutus' => $aboutus])
					->with('title', 'About Us Info');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		// Get input and save into variable.
		$data = Input::all();

		// Validate input data.
		$val = AboutUs::validate($data);

		// If validator fails show errors to user.
		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val);
		}

		// If no validation errors, update About Us information on database.
		$aboutus = AboutUs::find($id);
		$aboutus->title = Input::get('title');
		$aboutus->body = Input::get('body');

		// Get original data to compare if changes were made.
		$original = AboutUs::find($id);

		// Check if changes were made, if so, save to form, if no, redirect back with message.
		if ( $original->title != $aboutus->title || $original->body != $aboutus->body )
		{
			$aboutus->save();

			// Redirect with success message.
			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Information Updated Successfully!', 'success'));
		}
		else
		{
			// No changes were made, redirect back with warning message.
			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Nothing to update. No changes made.', 'warning'));
		}
	}

}