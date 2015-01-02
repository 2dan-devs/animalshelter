<?php

Class Status extends Eloquent {

		/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'status';

	// Stop laravel from creating created_at and updated_at columns on table.
	public $timestamps = false;

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('name');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'name' => 'required|alpha|between:3,20|unique:status'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One status can belong to many animals.
	public function animals ()
	{
		return $this->hasMany('Animal');
	}
}