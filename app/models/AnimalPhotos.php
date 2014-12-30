<?php

Class AnimalPhotos extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'animal_photos';

	// Stop laravel from creating created_at and updated_at columns on table.
	public $timestamps = false;

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('image_path');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'image_path' 	=>'required|image|mimes:jpeg,jpg,bmp,png,gif|unique:animal_photos',
			'is_front_photo'=>'boolean'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	public function animals ()
	{
		return this->belongsTo('Animal'); // Has to match model name
	}
}