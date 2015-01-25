<?php

Class ShelterEvent extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shelter_events';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = ['title', 'localtion', 'address', 'city', 'state', 'zip', 'phone', 'start_date', 'end_date', 'body', 'active'];

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules.
		$rules = [
			'title' 	=>'required|between:5,30',

			'location'	=>'required|between:5,30',
			'address'	=>'required|regex:/^\d{1,5}\s[A-Za-z.]+\s[A-Za-z.]{2,7}$/',
	        'city'	 	=>'required|alpha|min:2',
	        'state'	=>'required|regex:/^[A-Za-z0-9 ]+$/|between:2,30',
	        'zip'	 	=>'required|regex:/^[0-9]{5}$/',
	        'phone'	=>'required|regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',

			'start_date'=>'required|date_format:m/d/Y|regex:/^[0-9]{2}\/[0-9]{2}\/20[0-9]{2}$/',
			'end_date'	=>'required|date_format:m/d/Y|regex:/^[0-9]{2}\/[0-9]{2}\/20[0-9]{2}$/',
			'body'		=>'required|between:10,1000',
			'active'		=>'boolean'
		];

		return Validator::make($input, $rules);
	}

	/********************************** GETTERS AND SETTERS ***************************************/
	// Start Date
	public function getStartDateAttribute($start_date)
	{
		return date("m/d/Y", strtotime($start_date));
	}

	public function setStartDateAttribute($start_date)
	{
		$this->attributes['start_date'] = date("Y-m-d", strtotime($start_date));
	}
	// End Date
	public function getEndDateAttribute($end_date)
	{
		return date("m/d/Y", strtotime($end_date));
	}

	public function setEndDateAttribute($end_date)
	{
		$this->attributes['end_date'] = date("Y-m-d", strtotime($end_date));
	}
}