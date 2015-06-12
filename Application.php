<?php namespace TheProblem;

use TheProblem\Router\Router;
use TheProblem\ServiceProviders\AssetManager;
use TheProblem\ServiceProviders\Request;
use TheProblem\ServiceProviders\Response;

/**
 * Application - the problem
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class Application
{
	/**
	 * Application container
	 * 
	 * @var Array;
	 */
	private $container;	

	/**
	 * Object constructor
	 *
	 * @return void
	 */
	public function __construct()
	{
		global $app;

		$this->container['app'] 			= $app; 

		$this->container['request'] 		= new Request;

		$this->container['response'] 		= new Response;
		
		$this->container['router'] 			= new Router;

		$this->container['assetManager'] 	= new AssetManager;
	}

	/**
	 * boot the application
	 *
	 * @return void
	 */
	public function boot()
	{
		$request = self::resolve('request');

		self::resolve('router')->boot($request); // boot the router, pass in the HTTP request
	} 		

	/**
	 * returns the application instance
	 *
	 * @return void
	 */
	public static function app()
	{	
		global $app;

		return $app;
	}

	/**
	 * returns a container instance
	 *
	 * @return void
	 */
	public static function resolve($instance)
	{		
		if (array_key_exists($instance, self::app()->container))
		{
			return self::app()->container[$instance];
		}

		throw new \Exception('Unable to resolve the instance: '.$instance);
	}
}