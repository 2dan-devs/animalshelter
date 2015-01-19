<?php

Class AboutUs extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aboutus';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('title', 'body');

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'title'	=>'required|between:5,40',
			'body'	=>'required|between:10,2000'
		);
		return Validator::make($input, $rules);
	}
}