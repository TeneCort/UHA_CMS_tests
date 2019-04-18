<?php 
class WebPage{

	protected $webPageID, $webPageName;
	protected $components = [];

	function __construct(String $id, String $name){
		$this->webPageID = $id;
		$this->webPageName = $name;
	}

	function getID(): String{
		return $this->webPageID;
	}

	function getName(): String{
		return $this->webPageName;
	}

	function setName(String $newName){
		$this->webPageName = $newName;
	}

	function addComponent(object $newComponent){
		array_push($this->components, $newComponent);
	}

	function getComponents(): object{
		return $this->components;
	}
}
?>