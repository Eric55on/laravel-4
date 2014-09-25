<?php namespace Acme\Jobs;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\EventDispatcher;

class PublishJobCommandHandler implements CommandHandler {

	protected $repo;

	protected $dispatcher;

	public function __construct(JobRepository $jobRepo, EventDispatcher $dispatcher)
	{
		$this->jobRepo = $jobRepo;
		$this->dispatcher = $dispatcher;
	}

	public function handle($command)
	{
		$job = $this->jobRepo->publish($command->title,$command->description);

		$this->dispatcher->dispatch($job->releaseEvents());
	}

}