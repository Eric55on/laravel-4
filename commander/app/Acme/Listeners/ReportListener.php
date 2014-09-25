<?php namespace Acme\Listeners;

use Laracasts\Commander\Events\EventListener;
use Acme\Jobs\JobWasPosted;
use Acme\Jobs\JobWasEdited;

class ReportListener extends EventListener {
    
    public function whenJobWasPosted(JobWasPosted $event)
    {
        var_dump('do something related to report');
    }

    public function whenJobWasEdited(JobWasEdited $event)
    {
        var_dump('do something related to report');
    }
  
}
