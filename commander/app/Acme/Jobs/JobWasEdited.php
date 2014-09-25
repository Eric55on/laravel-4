<?php namespace Acme\Jobs;

class JobWasEdited {
    
    public $job;
    
    function __construct(Job $job) 
    {
        $this->job = $job;
    }
}