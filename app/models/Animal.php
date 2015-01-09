<?php

Class Animal extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'animals';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('front_photo_id','shelter_code','dob','date_in','date_out','name','description','comments','specie_id','breed_id','status_id');

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules.
		$rules = [
			'shelter_code' 	=>'alpha_num|between:1,10|unique:animals',
			'front_photo'	=>'integer',
			'dob'		 	=>'required|date_format:m/d/Y|regex:/^[0-9]{2}\/[0-9]{2}\/20[0-9]{2}$/',
			'date_in'	 	=>'required|date_format:m/d/Y|regex:/^[0-9]{2}\/[0-9]{2}\/20[0-9]{2}$/',
			'date_out'	 	=>'date_format:m/d/Y|regex:/^[0-9]{2}\/[0-9]{2}\/20[0-9]{2}$/',
			'name'			=>'required|alpha|between:3,20',
			'description'	=>'required|between:10,400',
			'comments'	 	=>'between:10,300',
			// Validation of foreign keys.
			'species_id'	 =>'required|integer',
			'breed_id'		=>'required|integer',
			'status_id'	 	=>'required|integer',
			'user_id'		=>'integer'
		];
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One animal can only belong to one specie.
	public function species()
	{
		return $this->belongsTo('Species'); // Has to match model name
	}

	// One animal can only belong to one breed.
	public function breed()
	{
		return $this->belongsTo('Breed'); // Has to match model name
	}

	// One animal can only have one status.
	public function status()
	{
		return $this->belongsTo('Status'); // Has to match model name
	}

	// One animal can have many photos.
	public function animalPhoto()
	{
		return $this->hasMany('AnimalPhoto'); // Has to match model name
	}

	// One animal can only be entered by one user.
	public function user()
	{
		return $this->belongsTo('User'); // Has to match model name.
	}
}