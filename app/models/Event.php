<?php

Class Event extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('title', 'event_date', 'body', 'completed');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'title' 	=>'required|alpha_num|between:5,30',
			'event_date'=>'required|date_format:m/d/Y|regex:/[0-9]{2}\/[0-9]{2}\/20[0-9]{2}/',
			'body'		=>'required|alpha_num|between:10,500',
			'completed' =>'boolean'
		);
		return Validator::make($input, $rules);
	}
}