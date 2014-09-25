<?php namespace Acme\Jobs;

interface JobRepositoryInterface {
 
  public function publish($title,$description);
  
  public function getAllJobs();
 
  public function getJob($id);

  public function updateJob($id,$title,$description);

  public function archive($id);
 
}