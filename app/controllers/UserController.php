<?php

class UserController extends \BaseController
{
   public function loginForm()
	{
		return View::make('user.login')->withTitle('Login');
	} // End login form function

	public function loginPost()
	{
		//Check to see if the user is already logged in.
      if (Auth::check())
      {
         return Redirect::to('/admin/dashboard');
      }

		// Set user array to gather data from the password recover form.
      $credentials = Input::all();

      // Set validation Rule.
      $rules = [
      	'username' => 'required|alpha_num',
      	'password' => 'required|alpha_num'
      ];

		$val = Validator::make($credentials, $rules);

		// If inputs from user don't pass validator rules, inform user of errors.
		if( $val->fails() )
		{
			return Redirect::back()->withErrors($val);
		}

		// If inputs from user pass validator, log in user.
		$userdata = [
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
		];

		// Save user into session
		if ( Auth::attempt($userdata) )
		{
			// Store usename information into current Session
         Session::put('current_user', Input::get('username'));

			// Redirect to admin page
			return View::make('admin.dashboard')
				->with('title', 'Dashboard')
				->with('message', FlashMessage::DisplayAlert('Login Successful!', 'success'));;
		}
		else
		{
			return Redirect::to('login')
				->with('message', FlashMessage::DisplayAlert('Incorrect Username/Password', 'alert'));;
		}
	} // End Login function

	public function updateProfile($id)
	{
		$input = Input::all();

		$val = User::validate($input, $id);

		// If validator fails redirect back with errors for user to correct.
		if ( $val->fails() )
		{
			return Redirect::back()->withErrors($val);
		}

		$update = User::find($id);
		if ($update)
		{
			$update->username = Input::get('username');
			$update->email = Input::get('email');
			$update->password = Hash::make(Input::get('password'));
			$update->save();
		}
		else {
			return Redirect::back()->with('message', FlashMessage::DisplayAlert('User not found!', 'alert'));
		}

		return Redirect::to('admin/dashboard')
				->with('message', FlashMessage::DisplayAlert('User Profile Updated Successfully.', 'success'));
	}

}