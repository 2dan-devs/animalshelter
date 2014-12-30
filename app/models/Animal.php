<?php

Class Animal extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'animals';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('shelter_code', 'date_in', 'date_out', 'name', 'dob', 'description', 'comments', 'specie_id', 'breed_id', 'status_id');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'shelter_code' 	=>'alpha_num|between:1,10|unique:animals',
			'date_in'	 	=>'required|date_format:m/d/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/',
			'date_out'	 	=>'date_format:m/d/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/',
			'name'			=>'required|alpha|between:3,20',
			'dob'		 	=>'required|date_format:m/d/Y|regex:/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/',
			'description'	=>'required|between:10,200',
			'comments'	 	=>'between:10,300',
			// Validation of foreign keys.
			'specie_id'	 =>'required|integer',
			'breed_id'	 =>'required|integer',
			'status_id'	 =>'required|integer'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/
	public function species()
	{
		return $this->belongsTo('Specie'); // Has to match model name
	}

	public function breeds()
	{
		return $this->belongsTo('Breed'); // Has to match model name
	}

	public function status()
	{
		return $this->belongsTo('Status'); // Has to match model name
	}

	public function animal_photos()
	{
		return $this->hasMany('AnimalPhotos'); // Has to match model name
	}
}