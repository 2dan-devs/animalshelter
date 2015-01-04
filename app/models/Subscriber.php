<?php

Class Subscriber extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'subscribers';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('email');

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules
		$rules = array(
			'email'	=>'required|between:3,64|email|unique:subscribers',
			'active'=>'boolean'
		);
		return Validator::make($input, $rules);
	}
}