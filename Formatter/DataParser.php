<?php namespace TheProblem\Formatter;

/**
 * Parses data array into combined format
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class DataParser 
{
	/**
	 * The raw recieved data
	 * 
	 * @var Array
	 */
	private $rawData;	

	/**
	 * Score data 
	 * 
	 * @var Array
	 */
	private $scoreData;		

	/**
	 * Volume data 
	 * 
	 * @var Array
	 */
	private $volumeData;

	/**
	 * The parsed array
	 * 
	 * @var Array
	 */
	private $result;		

	/**
	 * Date Formatter 
	 * 
	 * @var Array
	 */
	private $dateFormatter;	

	/**
	 * Construct
	 *
	 * @return  void
	 */	
    public function __construct()
    {
    	$this->dateFormatter = new DateFormatter; 
    }  			

	/**
	 * Construct
	 *
	 * @param  Array $rawData
	 * @return  void
	 */	
    public function setRawData($rawData)
    {
    	$this->rawData = $rawData;

    	if (array_key_exists('ssTrend', $this->rawData))
    	{
    		$this->scoreData = $this->rawData['ssTrend'];	
    	}

    	if (array_key_exists('volTrend', $this->rawData))
    	{
    		$this->volumeData = $this->rawData['volTrend'];
    	}    	

    	return $this; // fluent api FTW!
    }  

	/**
	 * Merges volume and score data
	 *
	 * @return  void
	 */	
    public function mergeArrays()
    {    
    	foreach ($this->volumeData as $volumeItem) // get first volume item (its larger)
    	{
    		foreach ($this->scoreData as $scoreItem) // look for a mathing score item
    		{
    			if ($volumeItem[0] == $scoreItem[0])
    			{
    				$this->result[$volumeItem[0]] = [ // build array
    					'score' 	=> $scoreItem[1],
    					'volume' 	=> $volumeItem[1],
    				];
    			}
    		}
    	}

    	return $this; // fluent api FTW!
    }

	/**
	 * Converts any Timestamp within the array to '2014-03-10 11:00:00' format
	 *
	 * @return  void
	 */	
    public function convertTimestamps()
    {    
    	$this->dateFormatter->setFormat('Y-m-d H:i:s')->setTimezone('Australia/Melbourne');

    	foreach ($this->result as $arrayItemKey => $arrayItem)
    	{
    		if ($formatted = $this->dateFormatter->convert($arrayItemKey))
    		{
    			$this->result[$formatted] = $arrayItem;

    			unset($this->result[$arrayItemKey]);
    		}
    	}

    	$this->result = $this->result;

    	return $this; // fluent api FTW!
    }    

	/**
	 * retuns the parsed array
	 *
	 * @return  Array
	 */	
    public function getParsed()
    {       
    	return $this->result;
    }

	/**
	 * retuns the parsed array as avar dump string
	 *
	 * @return  String
	 */	
    public function getParsedVarDump()
    {       
		ob_start();

		var_dump($this->result);

		return ob_get_clean();
    }    
}