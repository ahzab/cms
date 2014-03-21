<?php namespace Pongo\Cms\Models;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Guarded mass-assignment property
	 * 
	 * @var array
	 */
	protected $guarded = array('id');

	/**
	 * Pages relationship
	 * Each user has many pages
	 * 
	 * @return mixed
	 */
	public function pages()
	{
		return $this->hasMany('Pongo\Cms\Models\Page', 'author_id');
	}

	/**
	 * Role relationship
	 * Each user has one role
	 * 
	 * @return mixed
	 */
	public function role()
	{
		return $this->belongsTo('Pongo\Cms\Models\Role');
	}

	/**
	 * Details relationship
	 * Each user has one details
	 * 
	 * @return mixed
	 */
	public function details()
	{
		return $this->hasOne('Pongo\Cms\Models\UserDetail', 'user_id');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}