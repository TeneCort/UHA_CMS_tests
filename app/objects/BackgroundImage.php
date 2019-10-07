<?php 
class BackgroundImage{

	protected $imageName = ROOT . 'public' . DIRECTORY_SEPARATOR . 'uploads' .DIRECTORY_SEPARATOR . 'images.jpeg';

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
		return 'style="background: url(/var/www/html/Ioannis-fil_rouge/public/uploads/images.jpeg)"';
	}
}
?>

    
