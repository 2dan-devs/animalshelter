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
			'front_photo'	=>'alpha_num',
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

	/************************* GETTERS AND SETTERS ***************************/
	// Date of Birth
	public function getdobAttribute($dob)
	{
		return date("m/d/Y", strtotime($dob));
	}

	public function setdobAttribute($dob)
	{
		$this->attributes['dob'] = date("Y-m-d", strtotime($dob));
	}
	// DATE IN
	public function getDateInAttribute($date_in)
	{
		return date("m/d/Y", strtotime($date_in));
	}

	public function setDateInAttribute($date_in)
	{
		$this->attributes['date_in'] = date("Y-m-d", strtotime($date_in));
	}
	// DATE OUT
	public function getDateOutAttribute($date_out)
	{
		return ( empty($date_out) ? NULL : date("m/d/Y", strtotime($date_out)) );
	}

	public function setDateOutAttribute($date_out)
	{
		$this->attributes['date_out'] = (  empty($date_out) ? NULL : date("Y-m-d", strtotime($date_out)) );
	}
	// Shelter Code
	public function getShelterCodeAttribute($shelter_code)
	{
		return ucfirst($shelter_code);
	}

	public function setShelterCodeAttribute($shelter_code)
	{
		$this->attributes['shelter_code'] = ( empty($shelter_code) ? NULL : $shelter_code );
	}

	// Comments
	public function getCommentsAttribute($comments)
	{
		return ucfirst($comments);
	}

	public function setCommentsAttribute($comments)
	{
		$this->attributes['comments'] = ( empty($comments) ? NULL : $comments );
	}

	// Created_at and Updated_at
	public function getCreatedAtAttribute($created_at)
	{
	    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $created_at)->format('m/d/Y');
	}

	public function getUpdatedAtAttribute($updated_at)
	{
	    return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $updated_at)->format('m/d/Y');
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
		return $this->hasMany('AnimalPhoto', 'animal_id'); // Has to match model name
	}

	// One animal can only be entered by one user.
	public function user()
	{
		return $this->belongsTo('User'); // Has to match model name.
	}
}