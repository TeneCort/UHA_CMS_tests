<?php 
class Category{

	protected $categoryID, $categoryName, $subCategories;

	function __construct(String $id, TextElement $name){
		$this->categoryID = $id;
		$this->categoryName = $name;
	}

	public function setID(String $id){
		$this->categoryID = $id;
	}
	
	public function getID(): String{
		return $this->categoryID;
	}

	public function setName(TextElement $newName){
		$this->categoryName = $newName;
	}
	
	public function getName(): TextElement{
		return $this->categoryName;
	}
}
?>