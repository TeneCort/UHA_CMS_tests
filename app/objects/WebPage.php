<?php 

class WebPage{

	protected $webPageID;
	protected $webPageName;
	protected $components = [];
	protected $pages = [];

	function __construct($id, $name){
		
		$this->webPageID = $id;
		$this->webPageName = $name;

	}

	function getID(){
		return $this->webPageID;
	}

	function getName(){
		return $this->webPageName;
	}

	function setName($newName){
		$this->webPageName = $newName;
	}

	function addComponent($newComponent){
		array_push($this->components, $newComponent);
		
	}

	function getComponents(){
		return $this->components;
	}
	
}


?>