<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	// Specify which attributes are mass-assignable by user controlled input.
	protected $fillable = array('username','email', 'password');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 *
	 * "password" and "remember_token" columns will not be returned by the
	 * database when querying a user record for security purposes.
	 */
	protected $hidden = array('password', 'remember_token');

	// Validation function accessible from anywhere when validating inputs for this model.
	public function validate ($input)
	{
		// Validation rules.
		$rules = array(
			'username'				=>'required|between:3,80|alpha_dash|unique:users',
	        'email'					=>'required|between:3,64|email|unique:users',
	        'password'				=>'required|alpha_num|between:4,20|confirmed',
	        'password_confirmation'	=>'required|alpha_num|between:4,20|same:password'
		);
		return Validator::make($input, $rules);
	}

	/************************* RELATIONSHIPS ***************************/

	// One user can enter many animal records.
	public function animal()
	{
		return $this->hasMany('Animal');
	}
}