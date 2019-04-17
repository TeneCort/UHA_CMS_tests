<?php
class Page {

	protected $pageID;
	protected $pageName;
	
	public function __construct(){

	}

	public function getID(): int{
		return $this->pageID;
	}

	public function setID(String $id): void{
		$this->pageID = $id;
	}

	public function getName(): TextElement{
		return $this->pageName;
	}

	public function setName(TextElement $newName): void{
		$this->pageName = $newName;
	}
}

?>