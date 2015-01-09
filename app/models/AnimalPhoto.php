<?php

Class AnimalPhoto extends Eloquent {

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
	public static function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'image_path' 	=>'required|image|mimes:jpeg,jpg,bmp,png,gif',
			'animal_id'		=>'required|integer'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One photo can only belong to one animal.
	public function animals ()
	{
		return $this->belongsTo('Animal'); // Has to match model name
	}
}