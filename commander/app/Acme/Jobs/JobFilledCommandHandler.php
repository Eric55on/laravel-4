<?php namespace Acme\Jobs;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class JobFilledCommandHandler implements  CommandHandler {
	
    protected $jobRepo;
    
    private $dispatcher;
    
    function __construct(JobRepository $jobRepo, EventDispatcher $dispatcher)
    {
        $this->jobRepo = $jobRepo;
        $this->dispatcher = $dispatcher;
    }
    
    public function handle($command)
    {
        $job =  $this->jobRepo->archive($command->jobId);
        
        $this->dispatcher->dispatch($job->releaseEvents());
    }
    
}
