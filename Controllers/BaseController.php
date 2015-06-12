<?php namespace TheProblem\Controllers;

use TheProblem\Application;

/**
 * Index Controller - displays and deals with our main routes for "the problem"
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

abstract class BaseController
{
	/**
	 * response
	 * 
	 * @var TheProblem\ServiceProviders\Response
	 */
	protected $response;	

	/**
	 * request
	 * 
	 * @var TheProblem\ServiceProviders\Request
	 */
	protected $request;	

	/**
	 * Construct
	 *
	 * @return  void
	 */	
    public function __construct()
    {
    	$this->response = Application::resolve('response');
    	$this->request 	= Application::resolve('request');
    }  
}