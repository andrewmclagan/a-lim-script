<?php namespace TheProblem\ServiceProviders;

use TheProblem\ServiceProviders\AssetManager;
use League\CommonMark\CommonMarkConverter;

/**
 * HTTP Respones
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class Response
{	
	/**
	 * encodes and returns a json response
	 *
	 * @return void
	 */
	public static function json_encode($data)
	{	
		echo json_encode($data, JSON_NUMERIC_CHECK);

		die();
	}	

	/**
	 * echos a view
	 *
	 * @return void
	 */
	public static function view($view, $args = null)
	{	
		if (! is_null($args))
		{
			extract($args);
		}

		require self::resolveView($view);
	}	

	/**
	 * returns a view file path
	 *
	 * @return void
	 */
	public static function resolveView($view)
	{		
		$viewPaths = explode('.', $view);

		if(count($viewPaths) > 1) // we have a path
		{
			$resolvedView = AssetManager::VIEW_PATH . '/' . $viewPaths[0] . '/' . $viewPaths[1] . '.view.php';
		}
		else 
		{
			$resolvedView = AssetManager::VIEW_PATH . '/' . $viewPaths[0] . '.view.php';
		}

		if (file_exists($resolvedView)) 
		{
			return $resolvedView;
		}

		throw new \Exception('The view "'.$view.'"" does not exist!');
	}	

	/**
	 * parse a markdown view
	 *
	 * @return void
	 */
	public static function markdownView($file)
	{	
		$view = file_get_contents($file);

		$converter = new CommonMarkConverter();

		echo $converter->convertToHtml($view);
	}	
}