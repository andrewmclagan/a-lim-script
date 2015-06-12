<?php namespace TheProblem\Controllers;

use TheProblem\Formatter\DataParser;
use TheProblem\ServiceProviders\Response;

/**
 * Index Controller - displays and deals with our main routes for "the problem"
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class IndexController extends BaseController
{
	/**
	 * Array praser
	 * 
	 * @var Array
	 */
	public $arrayPraser;

	/**
	 * Construct
	 *
	 * @return  void
	 */	
    public function __construct()
    {
    	parent::__construct();

    	$this->arrayPraser = new DataParser;
    }  	

	/**
	 * The default index route
	 *
	 * @return  View
	 */	
    public function getIndex()
    {
    	Response::view('jsonParser');  
    }

	/**
	 * The default index route
	 *
	 * @return  View
	 */	
    public function getReadMe()
    {
    	Response::view('readMe');  
    }    

	/**
	 * recives the "input_string" data from client-side
	 *
	 * @return  View
	 */	
    public function postProcessData()
    {
		$this->arrayPraser->setRawData($this->request->post['data']);

		$parsedData = $this->arrayPraser->mergeArrays()->convertTimestamps()->getParsed();

		$varDumpData = $this->arrayPraser->getParsedVarDump();

    	Response::json_encode([
    		'parsed' => $parsedData,
    		'dumped' => $varDumpData,
    	]);  
    }    
}