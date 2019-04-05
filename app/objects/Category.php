<?php 

class Category{

	protected $categoryID;
	protected $categoryName;
	protected $subCategories;

	function __construct(){
		
	}

	public function setID(int $id){
		$this->categoryID = $id;
	}
	
	public function getID(): int{
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