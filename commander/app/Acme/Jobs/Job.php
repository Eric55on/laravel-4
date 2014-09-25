<?php namespace Acme\Jobs;

use Laracasts\Commander\CommandHandler;


class Job extends \Eloquent {
	
    protected $fillable = ['title','description'];
       
}