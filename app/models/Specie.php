<?php

Class Specie extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'species';

	// Stop laravel from creating created_at and updated_at columns on table.
	public $timestamps = false;

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('name');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'name' => 'required|alpha|between:3,20|unique:species'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One specie can belong to many animals.
	public function animal()
	{
		return $this->hasMany('Animal'); // Has to match Animal model name.
	}

	// One specie can have many breeds.
	public function breed()
	{
		return $this->hasMany('Breed'); // Has to match Breed model name.
	}
}