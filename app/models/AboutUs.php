<?php

Class Event extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'aboutus';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('title', 'body');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'title'	=>'required|alphanum|between:5,30',
			'body'	=>'required|alphanum|between:10,500'
		);
		return Validator::make($input, $rules);
	}
}