<?php namespace TheProblem\ServiceProviders;

use TheProblem\ServiceProviders\AssetManager;

/**
 * HTTP Request
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class Request
{	
	/**
	 * current http path
	 * 
	 * @var String;
	 */
	private $path;	

	/**
	 * current http paths
	 * 
	 * @var Array;
	 */
	private $paths;	

	/**
	 * posted data
	 * 
	 * @var Array;
	 */
	public $post;	

	/**
	 * geted data
	 * 
	 * @var Array;
	 */
	public $get;				

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{	
		$this->path 	= $_SERVER['REQUEST_URI'];    // Trim leading slash(es)

		$this->paths 	= explode('/', $this->path);  

		$this->post 	= $_POST;

		$this->get 		= $_GET;
	}	

	/**
	 * Handles incomming HTTP requests
	 *
	 * @return void
	 */
	public function getPath()
	{	
		return $this->path;
	}		

	/**
	 * Handles incomming HTTP requests
	 *
	 * @return boolean
	 */
	public function matchRequest($needle)
	{	
		if ($needle == $this->getPath())
		{
			return true;
		}

		return false;
	}	

	/**
	 * Matches a http verb to current request
	 *
	 * @return boolean
	 */
	public function is($verb)
	{		
		return (strtoupper($verb) == $_SERVER['REQUEST_METHOD']);
	}

	/**
	 * deencodes and returns a json response
	 *
	 * @return void
	 */
	public static function json_decode($data)
	{	
		return json_decode($data);
	}		
}