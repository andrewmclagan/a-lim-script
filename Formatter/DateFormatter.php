<?php namespace TheProblem\Formatter;

/**
 * Formats dates into the  desiered format
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 */

class DateFormatter 
{
	/**
	 * Timestamp
	 * 
	 * @var Array
	 */
	private $timestamp;		

	/**
	 * Timestamp formatter
	 * 
	 * @var Array
	 */
	private $format = 'm/d/Y';		

	/**
	 * Timezone
	 * 
	 * @var Array
	 */
	private $timezone = 'Australia/Melbourne';	

	/**
	 * Sets timestamp formatter
	 *
	 * @return  TheProblem\Formatter\DateFormatter
	 */	
    public function setFormat($format)
    {
    	$this->format = $format;

    	return $this; // fluent API FTW!
    } 

	/**
	 * Sets timezone
	 *
	 * @return  TheProblem\Formatter\DateFormatter
	 */	
    public function setTimezone($timezone)
    {
    	$this->timezone = $timezone;

    	return $this; // fluent API FTW!
    }  	     			

	/**
	 * parses and sets the teimestamp to be converted
	 *
	 * @param  Int $timestamp
	 * @return  TheProblem\Formatter\DateFormatter
	 */	
    public function setTimestamp($timestamp)
    {
    	if ($this->isValidTimestamp($timestamp))
    	{
    		$this->timestamp = (integer) $timestamp;

    		if ($this->timestamp > 9999999999)
    		{
    			$this->timestamp = $this->timestamp / 1000;
    		}

    		return $this; // fluent API FTW!
    	}
    	else {
    		throw new \Exception('Invalid timestamp: '.$timestamp);
    	}
    }  	

	/**
	 * converts the timestamp
	 *
	 * @param  Int $timestamp
	 * @return  void
	 */	
    public function convert($timestamp)
    {
    	$this->setTimestamp($timestamp);

    	$dateTime = new \DateTime();

    	$dateTime->setTimezone(new \DateTimeZone($this->timezone));

    	$dateTime->setTimestamp($this->timestamp);

    	return $dateTime->format($this->format);
    }  	    

	/**
	 * Validates a unix timestamp
	 *
	 * @param  Int $timestamp
	 * @return  void
	 */	
    protected function isValidTimestamp($timestamp)
    {
		return is_numeric($timestamp);
    }  	    
}