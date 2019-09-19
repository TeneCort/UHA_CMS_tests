<?php 
class backgroundImage{


	protected $imageName = ROOT . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' .DIRECTORY_SEPARATOR . 'RICHARD.jpg';

	function __construct(){
	}

	function getID(): String{
		return $this->imageID;
	}

	function getName(): String{
		return $this->imageName;
	}

	function setName(String $newName){
		$this->imageName = $newName;
	}

	function addComponent(object $newComponent){
		array_push($this->components, $newComponent);
	}

	function getComponents(): object{
		return $this->components;
	}

	function showImage(){

		return '<style="background-image : src("' . $imageName . '"); ">';
	}
}
?>

    
