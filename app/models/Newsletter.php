<?php

Class Newsletter extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'newsletters';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('title', 'body', 'template');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'title'		=>'required|alpha_num|between:5,30',
			'body'		=>'required|alpha_num|between:10,300',
			'template'	=>'required|integer|between:1,9'
		);
		return Validator::make($input, $rules);
	}
}