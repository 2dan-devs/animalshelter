<?php

Class Breed extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'breeds';

	// Stop laravel from creating created_at and updated_at columns on table.
	public $timestamps = false;

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = ['name', 'species_id'];

	// Validation function accessible from anywhere when validating inputs for this model.
	public static function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'name' => 'required|alpha|between:3,20|unique:breeds',
			'species_id' =>'required|integer'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One breed can belong to many animals.
	public function animal()
	{
		return $this->hasMany('Animal'); // Has to match Animal model name.
	}

	// One breed can only belong to once specie.
	public function species()
	{
		return $this->belongsTo('Species'); // Has to match Specie model name.
	}
}