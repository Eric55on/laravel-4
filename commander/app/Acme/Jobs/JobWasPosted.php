<?php namespace Acme\Jobs;

class JobwasPosted {
	
    public $job;
    
	function __construct($job) 
	{
	   $this->job = $job;	
	}
}
