<?php namespace Pongo\Cms\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Build extends Facade {

	/**
	 * Get the registred name of the component
	 * 
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'Build'; }

}