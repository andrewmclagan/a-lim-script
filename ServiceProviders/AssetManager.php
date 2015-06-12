<?php namespace TheProblem\ServiceProviders;

/**
 * Admin Asset Manager
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class AssetManager
{	
	/**
	 * Base public URL
	 *
	 * @var String
	 */
	private $baseURL;

	/**
	 * Assets URL
	 *
	 * @var String
	 */
	const ASSETS_URL = '/public/assets';

	/**
	 * Assets PATH
	 *
	 * @var String
	 */
	const ASSETS_PATH = __DIR__ . 'assets';	

	/**
	 * Views PATH
	 *
	 * @var String
	 */
	const VIEW_PATH = __DIR__ . '/../Views';	

	/**
	 * Javascript Assets
	 *
	 * @var Array
	 */
	const JS_ASSETS = ['app.min.js'];	

	/**
	 * CSS Assets
	 *
	 * @var Array
	 */
	const CSS_ASSETS = ['app.min.css'];	

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct()
	{			
		$this->baseURL = "http://$_SERVER[HTTP_HOST]";
	}

	/**
	 * Echo javascript assets
	 *
	 * @return void
	 */
	public function url($url = '')
	{	
		return $this->baseURL . $url;
	}	

	/**
	 * Echo javascript assets
	 *
	 * @return void
	 */
	public function javascript($classes)
	{	
		foreach (self::JS_ASSETS as $asset)
		{
			echo '<script src="' . $this->url('/assets/js/' . $asset) . '"></script>';
		}
	}	

	/**
	 * Echo css assets
	 *
	 * @return void
	 */
	public function css($classes)
	{	
		foreach (self::CSS_ASSETS as $asset)
		{
			echo '<link rel="stylesheet" href="' . $this->url('/assets/css/' . $asset) . '">';
		}
	}		
}