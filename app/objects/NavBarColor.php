<?php
class NavBarColor {

	protected $id, $color;
	protected $colors = [];

	public function __construct(String $id, TextElement $color){
		$this->id = $id;
		$this->color = $color;
	}

	public function getID(): String{
		return $this->id; 
	}

	public function setID(String $id){
		$this->id = $id;
	}

	public function getColor(): TextElement{
		return $this->color;
	}

	public function setColor(TextElement $newColor){
		$this->color = $newColor;
	}
}
?>