<?php

Class Event extends Eloquent {

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
			'title'	 =>'required|alpha_num|between:5,30',
			'address'=>'required|regex:/^\d{1,5}\s[A-Za-z.]+\s[A-Za-z.]{2,7}$/|min:2',
	        'city'	 =>'required|alpha|min:2',
	        'state'	 =>'required|alpha|between:2,2',
	        'zip'	 =>'required|integer|regex:/^[0-9]{5}$/',
			'email_1'=>'required|between:3,64|email',
			'email_2'=>'between:3,64|email',
			'phone_1'=>'required|numeric|regex:/^\(?[0-9]{3}\)?-?[0-9]{3}[-. ]?[0-9]{4}$/',
			'phone_2'=>'numeric|regex:/^\(?[0-9]{3}\)?-?[0-9]{3}[-. ]?[0-9]{4}$/'
		);
		return Validator::make($input, $rules);
	}
}