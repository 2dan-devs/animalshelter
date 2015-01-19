<?php

Class ContactUs extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contactus';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('title', 'address', 'city', 'state', 'zip', 'email_1', 'email_2', 'phone_1', 'phone_2');

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'title'	 =>'required|between:5,30|regex:/^[\pL\s]+$/',
			'address'=>'required|regex:/^\d{1,5}\s[A-Za-z.]+\s[A-Za-z.]{2,7}$/',
	        'city'	 =>'required|alpha|min:2',
	        'state'	 =>'required|regex:/^[A-Za-z0-9 ]+$/|between:2,30',
	        'zip'	 =>'required|regex:/^[0-9]{5}$/',
			'email_1'=>'required|between:3,64|email',
			'email_2'=>'between:3,64|email',
			'phone_1'=>'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
			'phone_2'=>'regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/'
		);
		return Validator::make($input, $rules);
	}
}