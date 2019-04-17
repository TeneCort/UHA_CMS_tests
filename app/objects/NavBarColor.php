<?php

class NavBarColor {

	protected $id;
	protected $color;
	protected $colors = [];

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