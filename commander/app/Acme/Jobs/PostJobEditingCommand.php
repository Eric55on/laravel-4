<?php namespace Acme\Jobs; 

class PostJobEditingCommand {
	
    public $id;
    
    public $title;
    
    public $description;
    
    function __construct($id,$title,$description) 
    {
       $this->id = $id; 
       $this->title = $title;   
       $this->description = $description;
    }
}
