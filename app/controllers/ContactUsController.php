<?php

class ContactUsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactus = ContactUs::find(1);

		return View::make('admin.contactus', ['contactus' => $contactus])
					->with('title', 'Contact Us Info');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();

		$val = ContactUs::validate($input);

		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val);
		}

		$contactus = ContactUs::find($id);
		$contactus->title = Input::get('title');
		$contactus->address = Input::get('address');
		$contactus->city = Input::get('city');
		$contactus->state = Input::get('state');
		$contactus->zip = Input::get('zip');
		$contactus->email_1 = Input::get('email_1');
		$contactus->email_2 = Input::get('email_2');
		$contactus->phone_1	= Input::get('phone_1');
		$contactus->phone_2 = Input::get('phone_2');

		// Original record
		$original = ContactUs::find($id);
		// If nothing changed do not make call to database and return with warning message.
		if ($original->title != $contactus->title || $original->address != $contactus->address ||
			$original->city != $contactus->city || $original->state != $contactus->state ||
			$original->zip != $contactus->zip || $original->email_1 != $contactus->email_1 ||
			$original->email_2 != $contactus->email_2 || $original->phone_1 != $contactus->phone_1 ||
			$original->phone_2 != $contactus->phone_2)
		{
			$contactus->save();
			return Redirect::back()->with('message', FlashMessage::DisplayAlert('Information Updated Successfully!', 'success'));
		}

		return Redirect::back()->with('message', FlashMessage::DisplayAlert('Nothing to update. No changes made.', 'warning'));
	}

}