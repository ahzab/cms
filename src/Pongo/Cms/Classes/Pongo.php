<?php namespace Pongo\Cms\Classes;

class Pongo {

	/**
	 * Pongo constructor
	 */
	public function __construct()
	{

	}	

	/**
	 * Get actual url segments
	 * -> full, first, last, prev
	 * 
	 * @return array
	 */
	public function getUrl()
	{
		$full_url = $_SERVER['REQUEST_URI'];

		$segments = explode('/', $full_url);

		array_shift($segments);

		$n_segments = count($segments);

		$url_arr = array();

		// full
		$url_arr['full'] = $full_url;

		// first
		$url_arr['first'] = '/' . $segments[0];

		// last
		$url_arr['last'] = '/' . $segments[$n_segments - 1];

		// prev
		$url_arr['prev'] = str_replace($url_arr['last'], '', $full_url);

		return $url_arr;
	}

	/**
	 * Get config form values
	 * 
	 * @param  string $key
	 * @return array
	 */
	public function forms($key)
	{
		return \Config::get('cms::forms.' . $key);
	}

	/**
	 * Get markers from config markers
	 *
	 * @param $key string
	 * @return array
	 */
	public function markers($key = null)
	{
		return (is_null($key)) ? \Config::get('cms::markers') : \Config::get('cms::markers.' . $key);
	}

	/**
	 * Turn off PHP memory limit
	 * 
	 * @return void
	 */
	public function memoryLimitOff()
	{
		ini_set('memory_limit', '-1');
	}

	/**
	 * Get config settings values
	 * 
	 * @param  string $key
	 * @return string
	 */
	public function settings($key)
	{
		return \Config::get('cms::settings.' . $key);
	}

	/**
	 * Get config system values
	 * 
	 * @param  string $key
	 * @return string
	 */
	public function system($key)
	{
		return \Config::get('cms::system.' . $key);
	}

	/**
	 * Show alert wrapper
	 * 
	 * @return string Alert message
	 */
	public function showAlert()
	{
		$format = $this->system('alert_tpl');

		foreach (\Alert::all($format) as $alert) {
			return $alert;
		}
	}

	/**
	 * Share a var value with views
	 * 
	 * @param  string $var
	 * @param  mixed  $value
	 * @return void
	 */
	public function viewShare($var, $value)
	{
		return \View::share($var, $value);
	}

	/**
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function className()
	{
		return get_class($this);
	}
	
}