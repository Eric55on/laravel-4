<?php namespace Acme\Jobs;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class PostJobEditingCommandHandler implements  CommandHandler {
    
    protected $jobRepo;

    protected $dispatcher;
    
    function __construct(JobRepository $jobRepo,EventDispatcher $dispatcher)
    {
        $this->jobRepo = $jobRepo;
        $this->dispatcher = $dispatcher;
    }
    
    public function handle($command)
    {        
        $job = $this->jobRepo->updateJob($command->id,$command->title,$command->description);
        $this->dispatcher->dispatch($job->releaseEvents());
        
    }
}