<?php

use Laracasts\Commander\CommanderTrait;
use Acme\Jobs\PublishJobCommand;
use Acme\Jobs\JobFilledCommand;
use Acme\Jobs\PostJobEditingCommand;
use Acme\Jobs\JobRepository;

class JobsController extends \BaseController {

	use CommanderTrait;

	protected $jobRepo;

	function __construct(JobRepository $jobRepo)
	{
		$this->jobRepo = $jobRepo;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jobs = $this->jobRepo->getAllAvailableJobs();
		echo "<pre>";
		dd($jobs);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputs = Input::only('title','description');
		$command = new PublishJobCommand($inputs['title'],$inputs['description']);
		$this->execute($command);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::only('id','title','description');
        $command = new PostJobEditingCommand($input['id'],$input['title'],$input['description']);
        
        $this->execute($command);    		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($jobId)
	{
        $command = new JobFilledCommand($jobId);

        $this->execute($command,compact('jobId'));
	}


}
