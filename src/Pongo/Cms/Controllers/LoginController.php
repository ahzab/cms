<?php namespace Pongo\Cms\Controllers;

class LoginController extends BaseController {
	
	/**
	 * Class constructor
	 * @return void
	 */
	public function __construct()
	{
		$this->beforeFilter('pongo.guest');
	}

	/**
	 * Login form
	 * @return view
	 */
	public function index()
	{
		return \Render::view('sections.login.login');
	}

}